module.exports = function (grunt) {

    var httpPfx,
        i,
        j,
        page,
        fileNoExt,
        http,
        pages,
        tasks;

    /* MAIN TASKS */
    tasks = [
        'usage',
        'jsonlint:config-files',
        'per-build-config',
        'sass:' + grunt.option("target") + '-pre-build-bootstrap',
        'sass:' + grunt.option("target") + '-bootstrap',
        'copy:' + grunt.option("target") + '-pre-build-files',
        'copy:' + grunt.option("target") + '-pdf',
        'copy:' + grunt.option("target") + '-zip',
        'copy:' + grunt.option("target") + '-js',
        'copy:fonts',
        'uglify:' + grunt.option("target") + (( 'undefined' !== typeof grunt.option("environment")) ? '-' + grunt.option("environment") : ''),
        'newer:imagemin:dynamic',
        'sass:' + grunt.option("target"), // does sprite generation
        'postcss:standard',
        'newer:imagemin:dynamic', // for the sprite
        'regex-replace:' + grunt.option("target") + '-img-url'
    ];

    pages = grunt.file.expand({cwd: grunt.config.get("_environments")["src"].pagePath.slice(1)}, "**/*.php");
    grunt.log.debug(pages);

    if ('dist' === grunt.option("target")) {
        httpPfx = ['env', 'dist-test'];
        for (j = 0; j < httpPfx.length; j++) {
            for (i = 0; i < pages.length; i++) {
                fileNoExt = pages[i].replace(/^(.*?)(\.[^\.]+)$/, '$1');
                http = {};
                http[httpPfx[j] + '-' + pages[i]] = {
                    options: {
                        url: ('http://<%= grunt.config.get("_environments")["local"].host %><%= grunt.config.get("_environments")["src"].pagePath %>/' + pages[i] + '?target=' + httpPfx[j])
                    },
                    dest: (
                        ('env' === httpPfx[j])
                            ?
                        '<%= grunt.config.get("_environments")[ grunt.option("target") ].pagePath.slice(1) %>/' + fileNoExt + '.html'
                            :
                        '<%= grunt.config.get("_environments")["dist-test"].pagePath.slice(1) %>/' + fileNoExt + '.html'
                    )
                };
                grunt.config.merge({http: http});
                tasks.push('http' + ':' + httpPfx[j] + '-' + pages[i]);
            }
        }
        tasks.push('regex-replace:dist-php-html')
    }

    grunt.log.debug(http);

    tasks.push('watch');
    grunt.log.debug(tasks);

    grunt.registerTask('default', tasks);

};