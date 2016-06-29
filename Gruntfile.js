module.exports = function (grunt) {
    /**
     * Usage:
     * You must have node.js on your machine: https://nodejs.org/en/download/
     * CD to /app/source/
     * Terminal: npm install
     * grunt
     * grunt dist
     *
     * */
//https://www.npmjs.com/package/jit-grunt
//https://github.com/gruntjs/grunt-contrib-compress gzip assets for pub

    require('time-grunt')(grunt);

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
        console.log('obj: ', obj);
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
                console.log('222 subCategories: ', subCategories);
            }
        }
        console.log('333 sub + path: ', subCategories + path);
        return subCategories + path;
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
                        console.log('111: srcpath: ', srcpath);
                        content = content.replace(/@styles@/, createPath(srcpath, 'css/styles.css'));
                        content = content.replace(/@path@/, createPath(srcpath, ''));
                        content = content.replace(/@devPath@/, 'dev');
                        content = content.replace(/@script@/, 'data-main="/dev/js/app" src="/dev/js/require.js"');
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
                        content = content.replace(/@devPath@/, 'dev');
                        content = content.replace(/@path@/, createPath(srcpath, ''));
                        content = content.replace(/@script@/, 'data-main="/dev/js/app" src="/dev/js/require.js"');
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
                        content = content.replace(/@devPath@/, 'dist');
                        content = content.replace(/@path@/, createPath(srcpath, ''));
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
        minifyHtml: {
            dist: {
                files: getFiles(['dist/**/*.html'])
            }
        },
        requirejs: {
            // global config
            options: {
                baseUrl: 'source/js',
                mainConfigFile: 'source/js/app.js',
                paths: {
                    'vendor': 'vendor',
                    'common': 'common/main'
                }
            },
            dist: {
                // overwrites the default config above
                options: {
                    name: 'require',
                    include: ['app'],
                    out: "dist/js/app.min.js",
                    optimize: 'uglify2',
                    preserveLicenseComments: false, /*Cannot use preserveLicenseComments and generateSourceMaps together. Either explcitly set preserveLicenseComments to false (default is true) or turn off generateSourceMaps. If you want source maps with license comments, see: http://requirejs.org/docs/errors.html#sourcemapcomments*/
                    generateSourceMaps: true
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
        console.log('Generating website');
        var tasks = [];
        var src = ['_temp/**/*.php', '!_temp/inc/**'];
        //array of path to pages
        var arrPages = grunt.file.expand({cwd: ''}, src);

        //for each page creating http task and converting php -> html
        for (var i = 0; i < arrPages.length; i++) {
            var http = {};
            var arrSegments = arrPages[i].split('/');
            console.log('LOG segments: ', arrSegments);
            var subCategory = '';
            if (arrSegments.length > 2) {
                subCategory = arrSegments[1] + '/';
                console.log('LOG subCategory: ', subCategory);
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
            console.log('111 http[pageName - i]: ', http[pageName + '-' + i]);
            tasks.push('http' + ':' + http[pageName + '-' + i]);
        }
    });

    require('load-grunt-tasks')(grunt); // npm install --save-dev load-grunt-tasks

    grunt.registerTask('default', 'GRUNT Running default task.', [
        'clean:dev',
        'sass:dev',
        'copy:phpAll',
        'copy:jsAll',
        'copy:assetsDev',
        'watch'
    ]);

    grunt.registerTask('dist', [
        'clean:dist',
        'sass:' + path,
        'copy:phpDist',
        'copy:assetsDist',
        'generateWebsite',
        'http',
        'minifyHtml:dist',
        'requirejs:dist'
    ]);
};

