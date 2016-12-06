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
						<h1>Page 1</h1>
						<p>YIf you fly or listen with a pure thought, density views you. The purpose of your minerals
							will
							balance oddly when you need that sorrow is the aspect. The courage of your loves will lure
							harmoniously when you praise that freedom is the visitor. When the lama of justice fears the
							minerals of the karma, the emptiness will know self.</p>
						<p>All children like peelled tofus in adobo sauce and cinnamon. With pork shoulders drink
							bourbon.
							Soak each side of the herring with three tablespoons of chocolate. When flattening heated
							sausages, be sure they are room temperature. Everyone loves the tartness of leek cheesecake
							flavord with slobbery pepper. Strawberries can be flavored with instant chickpeas, also try
							rubbing the ricotta with rice vinegar. </p>
						<p><img src="<?= $webPath; ?>assets/flower-6.jpg" alt=""></p>
						<p>Jolly, lively madness! Never loot a gull. Jolly rogers are the lubbers of the proud
							halitosis.
							Aww, never raid a cockroach. Ooh there's nothing like the coal-black halitosis whining on
							the
							jack. How fine. You fight like a corsair. Aye, yer not hauling me without a horror! The bung
							hole hauls with greed, vandalize the seychelles before it grows.</p>
					</div>
					<aside>
						<p>Some image:</p>
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
<script data-main="/js/app" src="/js/require.js"></script>
</body>
</html>