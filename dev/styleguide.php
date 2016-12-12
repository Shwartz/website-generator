<?php
$webPath = "";
$pageID = "styleguide";
/*echo 'test $pageID: ' . $pageID . '<br>';
echo 'test $webPath: ' . $webPath;*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'inc/_meta.php'; ?>
	<link rel="stylesheet" href="css/styles.css">
	<meta name="description" content="Styleguide example">
	<title>Styleguide example page</title>
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
						<section>
							<h1>Styleguide</h1>
						</section>

						<section>
							<h1>This is h1 title - sample text here</h1>
							<h1><a href="#">This is h1 title - sample text here</a></h1>

							<h2>This is h2 title - sample text here</h2>
							<h2><a href="#">This is h2 title - sample text here</a></h2>

							<h3>This is h3 title - sample text here</h3>
							<h3><a href="#">This is h3 title - sample text here</a></h3>

							<p>This is text and there is a <a href="#">very nice link</a> to the article</p>

							<h1>Article title sample</h1>
							<p class="date">2016-12-24</p>

							<p>List:</p>
							<ul>
								<li>This is list item</li>
								<li>This is list item</li>
								<li>This is list item</li>
								<li>This is list item</li>
								<li>This is list item</li>
							</ul>

							<p>list with links</p>
							<ul>
								<li><a href="#">This is list item</a></li>
								<li><a href="#">This is list item</a></li>
								<li><a href="#">This is list item</a></li>
								<li><a href="#">This is list item</a></li>
								<li><a href="#">This is list item</a></li>
							</ul>
						</section>

						<section>
							<h2><a href="<?= $webPath; ?>blog/this-is-sample-article.php">This is sample article</a>
							</h2>
							<p>There is no dynamic parts, all the articles on a page is added one by one. The path to an
								article is fixed by Grunt build process. An example of a path: </p>

							<pre><code class="language-js">&lt;a class="readMore"
	href="&lt;?= $webPath; ?&gt;blog/this-is-sample-article.php"&gt;
		Read more
&lt;/a&gt;</code></pre>

							<p>
								<a class="readMore" href="<?= $webPath; ?>blog/this-is-sample-article.php">Read
									more</a>
							</p>
						</section>

						<section>
							<h2><a href="<?= $webPath; ?>blog/another-article.php">Another article</a></h2>
							<p>Ubi est castus acipenser? Azureus, varius caculas satis transferre de altus, lotus repressor.
								Gratis fraticinida semper experientias sectam est. Altus, azureus brabeutas tandem carpseris de placidus, noster fermium.
								Cum quadra favere, omnes navises attrahendam salvus, fidelis medicinaes. A falsis, accentor ferox lura.
								Eheu. Cum castor favere, omnes glutenes anhelare talis, varius spatiies. Lumens crescere, tanquam ferox omnia.
								sunt contencioes pugna superbus, fatalis imberes.</p>

							<p><a href="<?= $webPath; ?>blog/another-article.php">Read more</a></p>
						</section>

						<section>
							<h2><a href="<?= $webPath; ?>blog/third-sample-article.php">Third sample article</a></h2>
							<p>The reef drinks with death, rob the captain's quarters before it waves.
								The rum raids with death, burn the fortress before it grows.
								jacks whine with hunger!
								The comrade commands with grace, mark the galley until it waves.
								planks fall with power!
								The tuna commands with riddle, trade the brig until it travels.
								fight, hunger, and horror.
								sunny urchins lead to the hunger.</p>

							<p><a class="readMore" href="<?= $webPath; ?>blog/third-sample-article.php"">Third sample article</a></p>
						</section>

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
<script data-main="/js/app" src="/js/require.js" async></script>
<div class="js">
	<script>
		(function () {
			"use strict";
			function localMethod() {
				// Example
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