define(
    [
        'vendor/barba/barba'
    ],
    function (Barba) {
        console.log('1 common:main.js barba: ', Barba);
        Barba.Pjax.start();
    }
);