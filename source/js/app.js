// For any third party dependencies, like jQuery, place them in the lib folder.

// Configure loading modules from the lib directory,
// except for 'app' ones, which are in a sibling
// directory.
requirejs.config({
    urlArgs: "bust=" + (new Date()).getTime(),
    baseUrl: 'js',
    paths: {
        app: 'app',
        main: 'app/main',
        carousel: 'app/carousel',
        helpers: 'app/helpers',
        hammer: 'lib/hammer'
    }
});


// Start loading the main app file. Put all of
// your application logic in there.
requirejs(['hammer', 'main']);
