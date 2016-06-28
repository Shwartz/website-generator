// For any third party dependencies, like jQuery, place them in the lib folder.

// Configure loading modules from the lib directory,
// except for 'app' ones, which are in a sibling
// directory.
requirejs.config({
    urlArgs: "bust=" + (new Date()).getTime(),
    baseUrl: '/dev/js',
    paths: {
        app: 'app',
        common: 'common/main'
    }
});

console.log('test');
// Start loading the main app file. Put all of
// your application logic in there.
requirejs(['common'], function (common) {
    console.log('common');
});

