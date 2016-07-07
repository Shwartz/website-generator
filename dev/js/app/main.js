define(
    [
        'jquery',
        'Barba'
    ], function ($,
                 Barba) {
        console.log("1 F:main.js", $, Barba);
        Barba.Pjax.start();

        var FadeTransition = Barba.BaseTransition.extend({
            start: function () {
                /**
                 * This function is automatically called as soon the Transition starts
                 * this.newContainerLoading is a Promise for the loading of the new container
                 * (Barba.js also comes with an handy Promise polyfill!)
                 */

                // As soon the loading is finished and the old page is faded out, let's fade the new page
                window.Promise
                //.all([this.newContainerLoading, this.fadeOut(200)])
                //.then(this.fadeIn.bind(this));
                    .all([this.newContainerLoading, this.removeOld()])
                    .then(this.addNew.bind(this));
            },

            removeOld: function () {
                return $(this.oldContainer).promise();
            },

            addNew: function () {
                var _this = this,
                    $newContainer = $(this.newContainer),
                    $newContent = $newContainer.find('.content'),
                    $newMenu = $newContainer.find('nav.main'),

                    $oldContainer = $(this.oldContainer),
                    $oldContent = $oldContainer.find('.content'),
                    $oldMenu = $oldContainer.find('nav.main');

                //Removing old container
                $oldContainer.addClass('remove3D');
                $oldContent.css({
                    opacity: '0',
                    transform: 'translateX(-80%)'
                });
                //This will show new menu
                $newContainer.css({
                    visibility: 'visible'
                }).addClass('add3D');

                //hiding new content, this removes flickering of contents on mob view
                $newContent.css({
                    position: 'absolute',
                    display: 'none',
                    transform: 'translateX(100%)',
                    opacity: 0
                });
                //Removing old and adding new content
                setTimeout(function () {
                    console.log('animation finished');
                    finishAnim();
                }, 300);

                function finishAnim() {
                    $newContent.css({
                        position: 'relative',
                        display: 'block',
                        transform: 'translateX(100%)'

                    });
                    setTimeout(function () {
                        _this.done();
                        $newContent.css({
                            transform: 'translateX(0)',
                            opacity: 1
                        });
                    }, 100);
                }


                /*$content.animate({ opacity: 1 }, 1000, function() {
                 /!**
                 * Do not forget to call .done() as soon your transition is finished!
                 * .done() will automatically remove from the DOM the old Container
                 *!/

                 console.log('asdf');
                 _this.done();
                 });*/
            },

            fadeOut: function () {
                /**
                 * this.oldContainer is the HTMLElement of the old Container
                 */

                //return $(this.oldContainer).animate({ opacity: 0 }).promise();
            },

            fadeIn: function () {
                /**
                 * this.newContainer is the HTMLElement of the new Container
                 * At this stage newContainer is on the DOM (inside our #barba-container and with visibility: hidden)
                 * Please note, newContainer is available just after newContainerLoading is resolved!
                 */

                var _this = this;
                var $el = $(this.newContainer);

                console.log('el: ', $el.find('.content'));

                $(this.oldContainer).hide();

                $el.css({
                    visibility: 'visible',
                    opacity: 0
                });

                $el.animate({opacity: 1}, 200, function () {
                    /**
                     * Do not forget to call .done() as soon your transition is finished!
                     * .done() will automatically remove from the DOM the old Container
                     */

                    _this.done();
                });
            }
        });

        /**
         * Next step, you have to tell Barba to use the new Transition
         */

        Barba.Pjax.getTransition = function () {
            /**
             * Here you can use your own logic!
             * For example you can use different Transition based on the current page or link...
             */

            return FadeTransition;
        };
    });