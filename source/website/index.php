<?php
$webPath = "@@path@@";
$pageID = "@@pageID@@";
/*echo 'test $pageID: ' . $pageID . '<br>';
echo 'test $webPath: ' . $webPath;*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>index page's title</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="@styles@">
</head>
<body>
<div id="wrap">
	<?php // include 'inc/_header.php'; ?>
	<div id="barba-wrapper">
		<div class="barba-container" data-namespace="homepage">
			<?php include 'inc/_menu.php'; ?>
			<section class="barba-go">
				<div class="row">
					<div class="content">
						<h1><a href="<?php echo $webPath; ?>/articles/this-is-sample-article.php">This is sample article lorem ipsum</a></h1>
						<p>The beloved courage of hypnosis is to forget with ascension. Explosion of the cores,
							creators, and small believers will always protect them. All beloved powers understand each
							other, only alchemistic egos have an emptiness. Never realize the saint, for you cannot hear
							it. The beauty of your intuitions will shine balanced when you praise that mineral is the
							guru... </p>
						<p>
						<p>code sample</p>

						<pre><code class="language-css">p { color: red }</code></pre>
						<pre><code class="language-js">
addNew: function () {
//console.log('addNew');
var _this = this,
	$newContainer = $(this.newContainer),
	$newContent = $newContainer.find('.content'),

	$oldContainer = $(this.oldContainer),
	$oldContent = $oldContainer.find('.content'),

	removeAnimationTime = 500,
	addAnimationTime = 300,

	leftW = $oldContent[0].offsetLeft;
}
</code></pre>
						<p><a class="readMore" href="#">Read more</a></p>

						<h1><a href="#">Some different aspect to read about lorem ipsum</a></h1>
						<p>The beloved courage of hypnosis is to forget with ascension. Explosion of the cores,
							creators, and small believers will always protect them. All beloved powers understand each
							other, only alchemistic egos have an emptiness. Never realize the saint, for you cannot hear
							it. The beauty of your intuitions will shine balanced when you praise that mineral is the
							guru... </p>


						<p>The beloved courage of hypnosis is to forget with ascension. Explosion of the cores,
							creators, and small believers will always protect them. All beloved powers understand each
							other, only alchemistic egos have an emptiness. Never realize the saint, for you cannot hear
							it. The beauty of your intuitions will shine balanced when you praise that mineral is the
							guru... </p>
						<p>
						<p><a class="readMore" href="#">Read more</a></p>

						<h1><a href="#">Amazingly great idea is here</a></h1>
						<p><img src="<?= $webPath; ?>assets/flower-5.jpg" alt=""></p>
						Red alert, proud love! Teleporters walk with coordinates at the clear galaxy! Resist oddly
						like a calm creature. Warp impressively like a reliable creature. Technically, indeed,
						energy! Adventure at the moon was the paralysis of metamorphosis, destroyed to a real
						ferengi. All the transporters empower proud, small pathways. The sonic shower is more moon
						now than star. neutral and surprisingly bare.</p>
						<p>Try boiling stew blended with oyster sauce, soaked with rosemary. After pressing the
							marshmellows, cover peanuts, lobster and whiskey with it in a sauté pan. Place the caviar in
							a wok, and rinse quickly with minced walnut juice. Fluff lettuce carefully roasted, then mix
							with teriyaki and serve tenderly in fine-mesh strainer. Mash up nine and a half teaspoons of
							bagel in one quarter cup of tabasco. </p>

						<p><a class="readMore" href="#">Amazingly great idea is here</a></p>


					</div>
					<aside>
						<h3>Aside side of life</h3>
						<p><img src="<?= $webPath; ?>assets/flower-1.jpg" alt=""></p>
						<p>Try boiling stew blended with oyster sauce, soaked with rosemary. After pressing the
							marshmellows, cover peanuts, lobster and whiskey with it in a sauté pan. Place the caviar in
							a wok, and rinse quickly with minced walnut juice. Fluff lettuce carefully roasted, then mix
							with teriyaki and serve tenderly in fine-mesh strainer. Mash up nine and a half teaspoons of
							bagel in one quarter cup of tabasco. </p>
						<p>Try boiling stew blended with oyster sauce, soaked with rosemary. After pressing the
							marshmellows, cover peanuts, lobster and whiskey with it in a sauté pan. Place the caviar in
							a wok, and rinse quickly with minced walnut juice. Fluff lettuce carefully roasted, then mix
							with teriyaki and serve tenderly in fine-mesh strainer. Mash up nine and a half teaspoons of
							bagel in one quarter cup of tabasco. </p>
						<p>Try boiling stew blended with oyster sauce, soaked with rosemary. After pressing the
							marshmellows, cover peanuts, lobster and whiskey with it in a sauté pan. Place the caviar in
							a wok, and rinse quickly with minced walnut juice. Fluff lettuce carefully roasted, then mix
							with teriyaki and serve tenderly in fine-mesh strainer. Mash up nine and a half teaspoons of
							bagel in one quarter cup of tabasco. </p>
						<p><img src="<?= $webPath; ?>assets/flower-1.jpg" alt=""></p>

					</aside>
				</div>
			</section>
		</div>
	</div>
</div>

<?php include 'inc/_footer.php'; ?>
<script @script@></script>
<div class="js">
	<script>
		(function () {
			"use strict";
			function localMethod() {
				// console.log('inside script');
				/*var p = document.getElementsByTagName('p');
				 for (var i = 0; i < p.length; i++) {
				 p[i].style.color = 'red';
				 }*/
			}

			function createBarbaListener() {
				// console.log('interval');
				if (typeof window.Barba !== 'undefined') {
					// console.log('barba available: window.Barba: ', window.Barba);
					window.clearInterval(intervalID);

					localMethod();

					var Homepage = Barba.BaseView.extend({
						/* add namespace <div class="barba-container" data-namespace="homepage"> */
						namespace: 'homepage',
						onEnter: function () {
							// The new Container is ready and attached to the DOM.
						},
						onEnterCompleted: function () {
							// The Transition has just finished.
							//console.log('new container');
							localMethod();
						},
						onLeave: function () {
							// A new Transition toward a new page has just started.
						},
						onLeaveCompleted: function () {
							// The Container has just been removed from the DOM.
						}
					});

// Don't forget to init the view!
					Homepage.init();
				}
			}

			// this is only on first load and only for DEV mode!
			var intervalID = window.setInterval(createBarbaListener, 20);
		})();
	</script>
</div>
</body>
</html>