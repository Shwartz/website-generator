define(
    [
        'carousel/appCarousel',
        'app/helpers/showGoogleMap'
        /*'app/menu/navigation'*/
    ],
    function (appCarousel,
              showGoogleMap
              /*navigation*/) {

        //DOM ready
        $(function () {
            //replace .no-js to .js to body tag
            document.getElementsByTagName('html')[0].className = 'js';

            //Modules
            //navigation();
            showGoogleMap();
            appCarousel.init();


            //Dom ready && content loaded
            //var count = 0;
            /*var everythingLoaded = setInterval(function () {
                if (/loaded|complete/.test(document.readyState)) {
                    clearInterval(everythingLoaded);
                    // this is the function that gets called when everything is loaded
                    //appCarousel.init();
                }
                //If bad things happend like slow internet, lost connection
                if (count > 10000) {
                    clearInterval(everythingLoaded);
                    return;
                }
                count++;
            }, 100);*/
        });

    });