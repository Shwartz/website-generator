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
	<title>this is sample article title</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="@styles@">
</head>
<body>
<div id="wrap">
	<?php // include 'inc/_header.php'; ?>
	<div id="barba-wrapper">
		<div class="barba-container" data-namespace="this-is-sample-article">
			<?php include '../inc/_menu.php'; ?>
			<section class="barba-go">
				<div class="row">
					<div class="content">
						<h1>This is sample article</h1>
						<p>There is no dynamic parts, all the articles on a page is added one by one. The path to an
							article is fixed by Grunt build process. An example of a path: </p>

						<pre><code class="language-js">&lt;a class="readMore"
	href="&lt;?= $webPath; ?&gt;articles/this-is-sample-article.php"&gt;
		Read more
&lt;/a&gt;</code></pre>

						<p>Web builder has built-in <a href="http://prismjs.com/">prismjs</a> for a code highlighting.
							<br>An example of CSS</p>

						<pre><code class="language-css">p { color: red }</code></pre>
						<p>An example of JavaScript</p>

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



					</div>
					<aside>
						<h3>Articles</h3>
						<?php include '../inc/_sideMenu.php' ?>
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

<?php include $webPath.'/inc/_footer.php'; ?>
<script @script@ async></script>
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