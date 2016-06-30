// For any third party dependencies, like jQuery, place them in the lib folder.

// Configure loading modules from the lib directory,
// except for 'app' ones, which are in a sibling
// directory.
requirejs.config({
    urlArgs: "bust=" + (new Date()).getTime(),
    baseUrl: '/dev/js',
    paths: {
        common: 'common/main',
        jquery: 'vendor/jquery',
        barba: 'vendor/barba/barba'
    },
    shim: {
        'barba': {
            deps: ['jquery'],
            exports: 'barba'
        }
    }
});

console.log('test app.js');
// Start loading the main app file. Put all of
// your application logic in there.
requirejs(['common']);

