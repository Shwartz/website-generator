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
    console.log('Grunt current task: ' + path);
    var pathToLocalWeb = 'http://generator.local/';
    var fs = require('fs');

    //Method to filter out changed or non-exist files and copy only those to DESTINATION
    function onlyNew(target) {
        return function (filepath) {
            var src = fs.statSync(filepath).mtime.getTime();
            var dest = grunt.config(target.concat('dest')) +
                filepath.slice(grunt.config(target.concat('cwd')).length);
            //if there is file in source but not in dest, copy it
            if (!grunt.file.exists(dest)) {
                return true;
            }
            //if there is a file in source and it is changed, copy only that file over
            dest = fs.statSync(dest).mtime.getTime();
            return src > dest;
        }
    }

    function getFiles(src) {
        /*
        return {
            'dist/index.html': 'dist/index.html',
            'dist/test.html': 'dist/test.html'};
        */
        //array of path to pages
        var arrPages = grunt.file.expand({cwd: ''}, src);
        var obj = {};
        for (var i = 0; i < arrPages.length; i++) {
            obj[arrPages[i]] = arrPages[i];
        }
        console.log('obj: ', obj);
        return obj;
    }
    
    function createCSSPath(srcpath) {
        //srcpath: source/website/sub/subcat.php
        //srcpath: source/website/test.php
        //'css/styles.css' -> root path to CSS 
        var pathLen = srcpath.split('/').length;
        var cssPath = 'css/styles.css';
        var subCategories = '';
        if (pathLen < 4) {
            return cssPath;
        } else {
            for (var i = 0; i < pathLen - 3; i++) {
                subCategories += '../';
                console.log('222 subCategories: ', subCategories);
            }
        }
        console.log('333: ', subCategories + cssPath);
        return subCategories + cssPath;
    }

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
        /*clean: {
            options: {
                force: true
            },
            dev: {
                src: ['../app/webroot/css/web/']
            }
        },*/
        copy: {
            phpAll: {
                expand: true,
                cwd: 'source/website/',
                src: ['**/*.php'],
                dest: 'dev/',
                options: {
                    process: function (content, srcpath) {
                        console.log('111: srcpath: ', srcpath);
                        content = content.replace(/@styles@/, createCSSPath(srcpath));
                        return content;
                    }
                }
            },
            phpFile: {
                expand: true,
                cwd: 'source/website/',
                src: ['**/*.php'],
                dest: 'dev/',
                filter: onlyNew(['copy', 'phpFile']),
                options: {
                    process: function (content, srcpath) {
                        content = content.replace(/@styles@/, 'css/styles.css');
                        return content;
                    }
                }
            },
            phpDist: {
                expand: true,
                cwd: 'source/website/',
                src: ['**/*.php'],
                dest: '_temp/',
                options: {
                    process: function (content, srcpath) {
                        content = content.replace(/@styles@/, 'css/styles.min.css');
                        content = content.replace(/\.php"/g, '.html"');
                        return content;
                    }
                }
            }

        },
        minifyHtml: {
            dist: {
                files: getFiles(['dist/**/*.html'])
            }
        },
        watch: {
            scss: {
                files: ['source/scss/**/*.scss'],
                tasks: ['sass:' + path]
            },
            devphp: {
                files: ['source/website/**/*.php'],
                tasks: ['copy:phpFile']
            }
        }
    });
    
    grunt.task.registerTask('generateWebsite', 'description', function () {
        console.log('Generating website');
        var tasks = [];
        var src = ['_temp/**/*.php', '!_temp/inc/**'];
        //array of path to pages
        var arrPages = grunt.file.expand({cwd: ''}, src);

        //for each page creating http task and converting php -> html
        for (var i = 0; i < arrPages.length; i++) {
            var http = {};
            var arrSegments = arrPages[i].split('/');
            console.log('segments: ', arrSegments);
            var subCategory = '';
            if (arrSegments.length > 2) {
                subCategory = arrSegments[1] + '/';
                console.log('subCategory: ', subCategory);
            }


            var pageName = subCategory + '' + arrSegments[arrSegments.length - 1];

            //creating http tasks with unique name
            http[pageName + '-' + i] = {
                options: {
                    url: pathToLocalWeb + arrPages[i]
                },
                dest: 'dist/' + pageName.replace('.php', '.html')
            };

            grunt.config.merge({http: http});
            tasks.push('http' + ':' + http[pageName - i]);
        }
    });

    require('load-grunt-tasks')(grunt); // npm install --save-dev load-grunt-tasks

    grunt.registerTask('default', 'GRUNT Running default task.', [
        'sass:dev',
        'copy:phpAll',
        'watch'
    ]);

    grunt.registerTask('dist', [
        /*'clean:env',*/
        'sass:' + path,
        'copy:phpDist',
        'generateWebsite',
        'http',
        'minifyHtml:dist'
    ]);
};

