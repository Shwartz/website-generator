//SETTINGS

module.exports = function (grunt) {
    /**
     * Usage:
     * You must have node.js on your machine: https://nodejs.org/en/download/
     * CD to /app
     * Terminal: npm install
     * grunt php:server //will open server on localhost:5000
     * grunt // dev tasks
     * grunt dist // production
     *
     * */
// https://www.npmjs.com/package/jit-grunt
// https://github.com/gruntjs/grunt-contrib-compress gzip assets for pub
// https://github.com/sindresorhus/grunt-php
// http://127.0.0.1:5000/index.php

    require('time-grunt')(grunt);
    grunt.log.writeln('\nFLAGS : ' + grunt.option.flags());

    var path = grunt.cli.tasks[0] || 'dev'; //getting global task, not --target
    //console.log('Grunt current task: ' + path);

    //var pathToLocalWeb = settings;
    //var pathToLocalWeb = 'http://generator.local/';
    var pathToLocalWeb = 'http://127.0.0.1:5010';
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
         return obj = {
         'dist/index.html': 'dist/index.html',
         'dist/test.html': 'dist/test.html'};
         */
        //array of path to pages
        var arrPages = grunt.file.expand({cwd: ''}, src);
        var obj = {};
        for (var i = 0; i < arrPages.length; i++) {
            obj[arrPages[i]] = arrPages[i];

        }
        //console.log('obj: ', obj);
        return obj;
    }

    function createPath(srcpath, path) {
        //srcpath: source/website/sub/subcat.php
        //srcpath: source/website/test.php
        //'css/styles.css' -> root path to CSS 
        var pathLen = srcpath.split('/').length;
        var subCategories = '';
        if (pathLen > 3) {
            for (var i = 0; i < pathLen - 3; i++) {
                subCategories += '../';
                //console.log('222 subCategories: ', subCategories);
            }
        }
        //console.log('333 sub + path: ', subCategories + path);
        return subCategories + path;
    }

    function pageID(srcpath) {
        //srcpath: source/website/sub/subcat.php
        //srcpath: source/website/test.php
        /**
         * @type {Array}
         * return string 'category/pageName'
         */
        var arr = srcpath.split('/');
        var string = '';
        //console.log('11111 arr: ', arr);
        for (var i = 2; i < arr.length; i++) {
            if (arr.length != i + 1) {
                string += arr[i] + '_';
            } else {
                string += arr[i];
            }

        }
        //console.log('22222 string: ', string);

        return string.replace(/.php/, '');
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
        clean: {
            options: {
                force: true
            },
            dev: {
                src: ['dev/*', '!dev/css/**']
            },
            dist: {
                src: ['dist/*', '_temp/*']
            }
        },
        copy: {
            phpAll: {
                expand: true,
                cwd: 'source/website/',
                src: ['**/*.php'],
                dest: 'dev/',
                options: {
                    process: function (content, srcpath) {
                        //console.log('111: srcpath: ', srcpath);
                        content = content.replace(/@styles@/, createPath(srcpath, 'css/styles.css'));
                        content = content.replace(/@@path@@/, createPath(srcpath, ''));
                        content = content.replace(/@@pageID@@/, pageID(srcpath));
                        content = content.replace(/@script@/, 'data-main="/js/app" src="/js/require.js"');
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
                        content = content.replace(/@styles@/, createPath(srcpath, 'css/styles.css'));
                        content = content.replace(/@@path@@/, createPath(srcpath, ''));
                        content = content.replace(/@@pageID@@/, pageID(srcpath));
                        content = content.replace(/@script@/, 'data-main="/js/app" src="/js/require.js"');
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
                        content = content.replace(/@styles@/, createPath(srcpath, 'css/styles.min.css'));
                        content = content.replace(/@@path@@/, createPath(srcpath, ''));
                        content = content.replace(/@@pageID@@/, pageID(srcpath));
                        content = content.replace(/@script@/, 'src="' + createPath(srcpath, 'js/app.min.js"'));
                        content = content.replace(/\.php"/g, '.html"');
                        return content;
                    }
                }
            },
            jsAll: {
                expand: true,
                cwd: 'source/js/',
                src: ['**/*.js'],
                dest: 'dev/js/'
            },
            jsFile: {
                expand: true,
                cwd: 'source/js/',
                src: ['**/*.js'],
                dest: 'dev/js/',
                filter: onlyNew(['copy', 'jsFile'])
            },
            assetsDev: {
                expand: true,
                cwd: 'source/assets/',
                src: ['**/*'],
                dest: 'dev/assets/'
            },
            assetsDist: {
                expand: true,
                cwd: 'source/assets/',
                src: ['**/*'],
                dest: 'dist/assets/'
            }
        },
        php: {
            server: {
                options: {
                    port: 5000,
                    keepalive: true,
                    open: true,
                    base: 'dev'
                }
            },
            tempServer: {
                options: {
                    port: 5010,
                    keepalive: false,
                    open: false,
                    base: ''
                }
            },
            dist: {
                options: {
                    port: 5020,
                    keepalive: true,
                    open: true,
                    base: 'dist'
                }
            }
        },
        minifyHtml: {
            options: {
                removeComments: true,
                collapseWhitespace: true
            },
            dist: {
                files: getFiles(['dist/**/*.html'])
            }
        },
        requirejs: {
            dist: {
                // overwrites the default config above
                options: {
                    baseUrl: 'source',
                    mainConfigFile: 'source/js/app.js',
                    name: 'js/require',
                    include: 'js/app',
                    out: 'dist/js/app.min.js',
                    generateSourceMaps: true,
                    preserveLicenseComments: false,
                    optimize: 'uglify2', /* uglify2|none */
                    paths: {
                        'app': 'js/app',
                        'common': 'js/common/main',
                        'jquery': 'js/vendor/jquery',
                        'Barba': 'js/vendor/barba/barba',
                        'prism': 'js/vendor/prism'
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
                tasks: ['copy:phpFile']
            },
            devjs: {
                files: ['source/js/**/*.js'],
                tasks: ['copy:jsFile']
            }
        }
    });


    grunt.task.registerTask('generateWebsite', 'description', function () {
        //console.log('Generating website');

        var tasks = [];
        var src = ['_temp/**/*.php', '!_temp/inc/**'];

        //array of path to pages
        var arrPages = grunt.file.expand({cwd: ''}, src);

        //for each page creating http task and converting php -> html
        for (var i = 0; i < arrPages.length; i++) {
            var http = {};
            var arrSegments = arrPages[i].split('/');
            var subCategory = '';
            if (arrSegments.length > 2) {
                subCategory = arrSegments[1] + '/';
                //console.log('LOG subCategory: ', subCategory);
            }

            var pageName = subCategory + '' + arrSegments[arrSegments.length - 1];
            //creating http tasks with unique name
            http[pageName + '-' + i] = {
                options: {
                    url: pathToLocalWeb + '/' + arrPages[i]
                },
                dest: 'dist/' + pageName.replace('.php', '.html')
            };

            grunt.config.merge({http: http});
            //console.log('111 http[pageName - i]: ', http[pageName + '-' + i]);
            tasks.push('http' + ':' + http[pageName + '-' + i]);
        }
    });

    require('load-grunt-tasks')(grunt); // npm install --save-dev load-grunt-tasks

    grunt.registerTask('default', 'Grunt default task is empty, use $grunt', function () {});

    grunt.registerTask('dev', 'GRUNT Running default task.', [
        'clean:dev',
        'sass:dev',
        'copy:phpAll',
        'copy:jsAll',
        'copy:assetsDev',
        'php:server',
        'watch',
    ]);

    grunt.registerTask('dist', 'GRUNT Running default task.', [
        'php:tempServer',
        'clean:dist',
        'sass:' + path,
        'copy:phpDist',
        'copy:assetsDist',
        'requirejs:dist',
        'generateWebsite',
        'http',
        'minifyHtml:dist',
        'php:dist',
    ]);
};
