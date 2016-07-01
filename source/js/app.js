// For any third party dependencies, like jQuery, place them in the lib folder.

// Configure loading modules from the lib directory,
// except for 'app' ones, which are in a sibling
// directory.
console.log('f:app.js');
requirejs.config({
    urlArgs: "bust=" + (new Date()).getTime(),
    baseUrl: '/dev/js',
    paths: {
        common: 'common/main',
        jquery: 'vendor/jquery'
    }
});

// Start loading the main app file. Put all of
// your application logic in there.
requirejs(['common']);

