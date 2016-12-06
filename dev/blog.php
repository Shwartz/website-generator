<?php $webPath = ""; ?>
<?php $pageID = "blog"; ?>
<?php //echo 'test: '.$pageID; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Shvarcs web notes</title>
	<link rel="stylesheet" href="css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
<div id="wrap">
	<?php include 'inc/_header.php'; ?>
	<div id="barba-wrapper">
		<div class="barba-container" data-namespace="blog">
			<?php include 'inc/_menu.php'; ?>
			<section class="barba-go">
				<div class="row">
					<div class="content">
						<section>
							<h2><a href="<?= $webPath; ?>articles/this-is-sample-article.php">This is sample article</a>
							</h2>
							<p>There is no dynamic parts, all the articles on a page is added one by one. The path to an
								article is fixed by Grunt build process. An example of a path: </p>

							<pre><code class="language-js">&lt;a class="readMore"
	href="&lt;?= $webPath; ?&gt;articles/this-is-sample-article.php"&gt;
		Read more
&lt;/a&gt;</code></pre>

							<p>
								<a class="readMore" href="<?= $webPath; ?>articles/this-is-sample-article.php">Read
									more</a>
							</p>
						</section>

						<section>
							<h2><a href="<?= $webPath; ?>articles/another-article.php">Another article</a></h2>
							<p>Ubi est castus acipenser? Azureus, varius caculas satis transferre de altus, lotus repressor.
								Gratis fraticinida semper experientias sectam est. Altus, azureus brabeutas tandem carpseris de placidus, noster fermium.
								Cum quadra favere, omnes navises attrahendam salvus, fidelis medicinaes. A falsis, accentor ferox lura.
								Eheu. Cum castor favere, omnes glutenes anhelare talis, varius spatiies. Lumens crescere, tanquam ferox omnia.
								sunt contencioes pugna superbus, fatalis imberes.</p>

							<p><a href="<?= $webPath; ?>articles/another-article.php">Read more</a></p>
						</section>

						<section>
							<h2><a href="<?= $webPath; ?>articles/third-sample-article.php">Third sample article</a></h2>
							<p>The reef drinks with death, rob the captain's quarters before it waves.
								The rum raids with death, burn the fortress before it grows.
								jacks whine with hunger!
								The comrade commands with grace, mark the galley until it waves.
								planks fall with power!
								The tuna commands with riddle, trade the brig until it travels.
								fight, hunger, and horror.
								sunny urchins lead to the hunger.</p>

							<p><a class="readMore" href="<?= $webPath; ?>articles/third-sample-article.php"">Third sample article</a></p>
						</section>
					</div>
					<aside>
						<h3>Articles</h3>
						<?php include 'inc/_sideMenu.php' ?>
						<p><img src="<?= $webPath; ?>assets/flower-2.jpg" alt=""></p>
						<p>Jolly, lively madness! Never loot a gull. Jolly rogers are the lubbers of the proud
							halitosis.
							Aww, never raid a cockroach. Ooh there's nothing like the coal-black halitosis whining on
							the
							jack. How fine. You fight like a corsair. Aye, yer not hauling me without a horror! The bung
							hole hauls with greed, vandalize the seychelles before it grows.</p>
					</aside>
				</div>
			</section>
		</div>
	</div>
</div>

<?php include 'inc/_footer.php'; ?>
<script data-main="/js/app" src="/js/require.js" async></script>
</body>
</html>