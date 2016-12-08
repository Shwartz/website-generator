<?php
$webPath = "../";
$pageID = "articlesthird-sample-article";
/*echo 'test $pageID: ' . $pageID . '<br>';
echo 'test $webPath: ' . $webPath;*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../inc/_meta.php'; ?>
	<link rel="stylesheet" href="../css/styles.css">
	<meta name="description" content="">
	<title>Third sample article</title>
</head>
<body>
<div id="wrap">
	<?php // include 'inc/_header.php'; ?>
	<div id="barba-wrapper">
		<div class="barba-container" data-namespace="third-sample-article">
			<?php include '../inc/_menu.php'; ?>
			<section class="barba-go">
				<div class="row">
					<div class="content">
						<h1>Third sample article</h1>

						<p>The reef drinks with death, rob the captain's quarters before it waves.
							The rum raids with death, burn the fortress before it grows.
							jacks whine with hunger!
							The comrade commands with grace, mark the galley until it waves.
							planks fall with power!
							The tuna commands with riddle, trade the brig until it travels.
							fight, hunger, and horror.
							sunny urchins lead to the hunger.</p>
						<p>The pegleg marks with life, haul the galley before it dies.
							urchin
							The whale fights with halitosis, crush the reef before it falls.
							faith, adventure, and punishment.
							The wench loots with booty, hoist the lighthouse until it whines.
							strength, faith, and endurance.
							The comrade hoists with endurance, haul the reef until it travels.
							damn yer furner, feed the mate.</p>

						<p>The girl loots with death, haul the captain's quarters before it falls.
							never taste a lagoon.
							The mast fires with power, command the fortress until it waves.
							treasure
							The lagoon fears with madness, fight the freighter until it waves.
							never blow a skiff.
							The shipmate commands with fight, hail the quarter-deck until it travels.
							greed, horror, and desolation.
							life ho! fire to be tasted.
.</p>
					</div>
					<aside>
						<h3>Articles</h3>
						<?php include '../inc/_sideMenu.php' ?>
						<p>The fish fears with madness, drink the lighthouse until it hobbles.
							halitosis, life, and horror.
							The yardarm desires with pestilence, mark the fortress until it dies.
							never desire a cannon.
							The girl breaks with fight, fear the freighter until it rises.
							port royal
							The parrot scrapes with punishment, taste the seychelles before it grows.
							never command an anchor.
							crush me skull, ye stormy wave.</p>
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

<?php include $webPath . '/inc/_footer.php'; ?>
<script data-main="/js/app" src="/js/require.js" async></script>
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