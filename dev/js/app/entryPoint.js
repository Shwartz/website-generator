define(['app/components/prism'], function (prism) {

    return function () {
        // This is called always from Barba.js after page is loaded
        /*var h1 = document.getElementsByTagName('h1');
        h1[0].style.color = 'green';*/

        prism();
    }
});