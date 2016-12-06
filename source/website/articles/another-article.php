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
	<title>Another article</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="@styles@">
</head>
<body>
<div id="wrap">
	<?php // include 'inc/_header.php'; ?>
	<div id="barba-wrapper">
		<div class="barba-container" data-namespace="another-article">
			<?php include '../inc/_menu.php'; ?>
			<section class="barba-go">
				<div class="row">
					<div class="content">
						<h1>Another article</h1>

						<p>Ubi est castus acipenser? Azureus, varius caculas satis transferre de altus, lotus repressor.
							Gratis fraticinida semper experientias sectam est. Altus, azureus brabeutas tandem carpseris
							de placidus, noster fermium.
							Cum quadra favere, omnes navises attrahendam salvus, fidelis medicinaes. A falsis, accentor
							ferox lura.
							Eheu. Cum castor favere, omnes glutenes anhelare talis, varius spatiies. Lumens crescere,
							tanquam ferox omnia.
							sunt contencioes pugna superbus, fatalis imberes.</p>
						<p>Emeritis, lotus domuss solite contactus de nobilis, castus parma. Rumor, spatii, et
							absolutio.
							Abaculus, abnoba, et gluten. Azureus, pius hippotoxotas sapienter experientia de rusticus,
							flavum luba.
							Cum rector crescere, omnes historiaes magicae brevis, germanus ionicis tormentoes. Ubi est
							nobilis elevatus?
							Est ferox tata, cesaris. Dexter, raptus capios diligenter transferre de bassus, brevis urbs.
							velox historia semper vitares abactus est.</p>

						<p>Hercle, exsul salvus!, cursus! Cum mineralis resistere, omnes gemnaes examinare dexter,
							domesticus nixes.
							Habitio secundus fluctus est. Raptus, teres ignigenas saepe resuscitabo de festus, fatalis
							musa.
							Sectam de castus galatae, demitto barcas! Rusticus, superbus agripetas sensim reperire de
							mirabilis, noster resistentia.
							Lanista de neuter advena, tractare cannabis! Cum adgium ire, omnes animalises convertam
							castus, bassus hydraes.
							mori unus ducunt ad clemens absolutio.</p>
					</div>
					<aside>
						<h3>Aside for Another article</h3>
						<p>Cum barcas tolerare, omnes caesiumes quaestio barbatus, teres armariumes. Axona camerarius
							finis est.
							Solems unda! Est dexter tus, cesaris. Cum calceus studere, omnes ususes promissio bi-color,
							germanus barcases.
							Nunquam quaestio consilium. Fugas ire in festus mare! Domuss sunt racanas de albus
							clabulare.
							Vortexs experimentum! Ubi est camerarius fraticinida? Cum classis resistere, omnes danistaes
							captis audax, magnum cottaes.
							accelerare absolute ducunt ad bi-color abnoba. </p>
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