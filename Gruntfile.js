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

    
    var path = grunt.cli.tasks[0] || 'dev'; //getting global task, not --target
    console.log('LOG: Grunt current task: ' + path);
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
        copy: {//TODO: copy only changed file from watch
            phpToDev: {
                expand: true,
                cwd: 'source/website/',
                src: ['**/*.php'],
                dest: 'dev/',
                options: {
                    process: function(content, srcpath) {
                        //content = content.replace(/@{gruntCSSPath}/, 'dev"');
                        //content = content.replace(/@@gruntDataPath/, 'scripts/lib/require.js');
                        return content;
                    }
                }
            },
            phpToDevFile: {
                expand: true,
                src: ['*.php'],
                dest: 'dev/',
                options: {
                    process: function(content, srcpath) {
                        //content = content.replace(/@{gruntCSSPath}/, 'dev"');
                        //content = content.replace(/@@gruntDataPath/, 'scripts/lib/require.js');
                        return content;
                    }
                }
            }
        },
        watch: {
            scss: {
                files: ['source/scss/**/*.scss'],
                tasks: ['sass:' + path]
            },
            devphp: {
                files: ['source/website/**/*.php'],
                tasks: ['copy:phpToDev']
            }
        }
    });

    // On watch events configure jshint:all to only run on changed file
    grunt.event.on('watch', function(action, filepath) {
        console.log('GRUNT WATCH ON: filepath: ', filepath);
        grunt.config('copy:phpToDevFile', filepath);
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
        'copy:phpToDev',
        'watch'
    ]);

    grunt.registerTask('dist', [
        /*'clean:env',*/
        'sass:' + path,
        'generateWebsite',
        'http'
    ]);
};

