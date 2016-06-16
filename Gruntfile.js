module.exports = function (grunt) {
    /**
     * Usage:
     * You must have node.js on your machine: https://nodejs.org/en/download/
     * CD to /app/source/
     * Terminal: npm install
     * grunt 
     * grunt dist --target=dist
     *
     * */

    
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
        copy: {
            phpToDev: {
                expand: true,
                cwd: 'source/website/',
                src: ['**.php'],
                dest: 'dev/',
                options: {
                    process: function(content, srcpath) {
                        content = content.replace(/@{gruntcss}/, 'data-main="scripts/setup"');
                        content = content.replace(/@@gruntDataPath/, 'scripts/lib/require.js');
                        return content;
                    }
                }
            },
            htmldist: {
                expand: true,
                cwd: 'src/pages/',
                src: ['*.php'],
                dest: path + '/',
                options: {
                    process: function(content, srcpath) {
                        content = content.replace(/@@gruntDataMain/, '');
                        content = content.replace(/@@gruntDataPath/, 'scripts/app.min.js');
                        return content;
                    }
                }
            },
            assets: {
                expand: true,
                cwd: 'src/',
                src: ['assets/**'],
                dest: path + '/'
            }
        },
        watch: {
            scss: {
                files: ['source/scss/**/*.scss'],
                tasks: ['sass:' + path]
            }
        }
    });

    grunt.task.registerTask('generateWebsite', 'description', function (){
        console.log('yo');

        var src = ['source/website/**/*.php', '!source/website/inc/**'];
        //array of path to pages
        var arrPages = grunt.file.expand({cwd: ''}, src);

        console.log('Pages: ', arrPages);

        //for each page creating http task and converting php -> html
        for (var i = 0; i < arrPages.length; i++) {
            var http = {};
            var arrSegments = arrPages[i].split('/');
            var pageName = arrSegments[arrSegments.length - 1];
            
            console.log('url: ', arrPages[i]);
            console.log('dest: ', 'dist/' + pageName);

            //creating http tasks with unique name
            http[pageName + '-' + i] = {
                options: {
                    url: pathToLocalWeb + arrPages[i]
                },
                dest: 'dist/' + pageName.replace('.php', '.html')
            };
            console.log('http: ', http);
            
            grunt.config.merge({http: http});
            tasks.push('http' + ':' + http[pageName-i]);
        }
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-http');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');

    grunt.registerTask('default', [
        'sass:dev',
        'watch'
    ]);

    grunt.registerTask('dist', [
        /*'clean:env',*/
        'sass:' + path,
        'generateWebsite',
        'http'
    ]);
};

