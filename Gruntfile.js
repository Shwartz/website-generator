module.exports = function (grunt) {
    /**
     * Usage:
     * You must have node.js on your machine: https://nodejs.org/en/download/
     * CD to /app/source/
     * Terminal: npm install
     * grunt dev
     *
     * */

    var path = grunt.option('target') || 'dev';


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
                force:true
            },
            web: {
                src: ['../app/webroot/css/web/']
            }
        },
        watch: {
            scss: {
                files: ['scss/web/**/*.scss'],
                tasks: ['sass:web']
            },
            cssAdmin: {
                files: ['css/admin/*.css'],
                tasks: ['cssmin:webCSS']
            },
            scssAdmin: {
                files: ['scss/admin/**/*.scss'],
                tasks: ['sass:admin']
            }
        }
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');

    grunt.registerTask('dev', [
        /*'clean:env',*/
        'sass:web',
        'sass:admin',
        'cssmin:adminCSS',
        'watch'
    ]);
};


