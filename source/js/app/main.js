define(
	[
		'jquery',
		'Barba',
		'app/entryPoint'
	], function ($,
				 Barba,
				 entryPoint) {
		//console.log("1 F:main.js", $, Barba);

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
					.all([this.newContainerLoading, this.removeOld()])
					.then(this.addNew.bind(this));
			},

			removeOld: function () {
				return $(this.oldContainer).promise();
			},

			addNew: function () {
				//console.log('addNew');
				var _this = this,
					$newContainer = $(this.newContainer),
					$newContent = $newContainer.find('.barba-go'),

					$oldContainer = $(this.oldContainer),
					$oldContent = $oldContainer.find('.barba-go'),

					removeAnimationTime = 180,
					addAnimationTime = 180,

					leftW = $oldContent[0].offsetLeft;

				//------- Removing old container
				$oldContainer.addClass('remove3D');

				$oldContent.css({
					opacity: 0,
					position: 'relative',
					transition: 'opacity ' + removeAnimationTime + 'ms ease-in-out, '
					+ 'transform ' + removeAnimationTime + 'ms ease-in-out',
					transform: 'scale(0.99)',
					transformOrigin: '50% 0'
				});
				setTimeout(function () {
					//this.done() removes old content
					_this.done();
					// ON page load we adding whatever we need here
					//console.log('!!! entryPoint: ', entryPoint);
					entryPoint();
					showNew_step3();
				}, removeAnimationTime);


				//------ Adding new container ------------
				// This will show new menu
				$newContainer.css({
					visibility: 'visible'
				}).addClass('add3D');

				function showNew_step1() {
					//hiding new content, this removes flickering of contents on mob view
					//console.log('step 1');
					$newContent.css({
						position: 'absolute',
						top: '50px',
						left: leftW + 'px',
						opacity: 0,
						transform: 'scale(0.99)',
						transformOrigin: '50% 0'
					});
				}

				function showNew_step2() {
					//console.log('step 2');
					$newContent.css({
						opacity: 1,
						transform: 'scale(1)',
						transition: 'opacity ' + addAnimationTime + 'ms ease-in-out, transform ' + addAnimationTime + 'ms ease-in-out'
					});
					document.body.scrollTop = 0; //Long pages has to be scroll up
				}

				function showNew_step3() {
					//console.log('step 3');

					$newContent.css({
						position: 'relative',
						top: 0,
						left: ''
					});
				}

				//Animate and add new content
				showNew_step1();

				setTimeout(function () {
					showNew_step2();
				}, addAnimationTime);
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
			//console.log("transitions");
			return FadeTransition;
		};

		Barba.Dispatcher.on('linkClicked', function (e) {
			//your listener
			e.style.opacity = 0.5;
			//console.log('link clicked');
		});
		Barba.Dispatcher.on('newPageReady', function () {
			//your listener
			//console.log('new page ready');
		});

		// First load we run here
		//console.log('!!! entryPoint: ', entryPoint);
		entryPoint();

		// making global
		window.Barba = Barba;

	}
);