define(
    [
        'vendor/barba/barba'
    ],
    function (Barba) {
        console.log('1 common:main.js barba: ', Barba);
        Barba.Pjax.start();

        var HideShowTransition = Barba.BaseTransition.extend({
            start: function() {
                this.newContainerLoading.then(this.finish.bind(this));
            },

            finish: function() {
                document.body.scrollTop = 0;
                this.done();
                console.log('this: ', this);
                this.newContainer.style.visibility = 'visible';

            }
        });

        Barba.Pjax.getTransition = function() {
            return HideShowTransition;
        };

    }
);