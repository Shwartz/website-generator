module.exports = function (grunt) {
    /**
     * Usage:
     * You must have node.js on your machine: https://nodejs.org/en/download/
     * CD to /app/source/
     * Terminal: npm install
     * grunt dev --target=dev
     * grunt dist --target=dist
     *
     * */

    //var path = grunt.option('target') || 'dev';
    var path = grunt.cli.tasks[0]; //getting global task, not --target
    console.log('LOG: Grunt current task: ' + grunt.cli.tasks[0]);
    var pathToLocalWeb = 'http://generator.local/';
    var tasks = [];

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                sourceMap: true
            },
            dev: {
                options: {
                    outputStyle: 'expanded' //CSS output mode. Can be: nested, expanded, compact, compressed.
                },
                files: {'dev/css/styles.css': 'source/scss/styles.scss'}
            },
            dist: {
                options: {
                    outputStyle: 'compressed' //CSS output mode. Can be: nested, expanded, compact, compressed.
                },
                files: {'dist/css/styles.min.css': 'source/scss/styles.scss'}
            }
        },
        clean: {
            options: {
                force: true
            },
            dev: {
                src: ['../app/webroot/css/web/']
            }
        },
        watch: {
            scss: {
                files: ['source/scss/**/*.scss'],
                tasks: ['sass:' + path]
            }
        }
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-http');

    grunt.task.registerTask('createPages', 'description', function (){
        console.log('yo');

        var src = ['source/files/**/*.php', '!source/files/inc/**'];
        var pages = grunt.file.expand({cwd: ''}, src);

        console.log('Pages: ', pages);

        for (var i = 0; i < pages.length; i++) {
            var http = {};
            var arrSegments = pages[i].split('/');
            var pageName = arrSegments[arrSegments.length - 1];
            
            console.log('url: ', pages[i]);
            console.log('dest: ', 'dist/' + pageName);

            //creating http tasks with unique name
            http[pageName + '-' + i] = {
                options: {
                    url: pathToLocalWeb + pages[i]
                },
                dest: 'dist/' + pageName.replace('.php', '.html')
            };
            console.log('http: ', http);
            
            grunt.config.merge({http: http});
            tasks.push('http' + ':' + http[pageName-i]);
        }
    });



    grunt.registerTask('default', [
        'createPages',
        'http'
    ]);

    grunt.registerTask('dev', [
        /*'clean:env',*/
        'sass:' + path,
        'watch'
    ]);
};

