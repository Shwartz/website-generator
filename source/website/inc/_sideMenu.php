<ul class="sidebarMenu">
	<li class="<?php echo currentPage('articlesthis-is-sample-article', $pageID); ?>">
		<a href="<?= $webPath; ?>blog/this-is-sample-article.php">This is sample article</a>
	</li>
	<li class="<?php echo currentPage('articlesanother-article', $pageID); ?>">
		<a href="<?= $webPath; ?>blog/another-article.php">Another article</a>
	</li>
	<li class="<?php echo currentPage('articlesthird-sample-article', $pageID); ?>">
		<a href="<?= $webPath; ?>blog/third-sample-article.php">Third sample article</a>
	</li>
</ul>