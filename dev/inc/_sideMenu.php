<ul class="sidebarMenu">
	<li<?php echo currentPage('blog_this-is-sample-article', $pageID); ?>>
		<a href="<?= $webPath; ?>blog/this-is-sample-article.php">This is sample article</a>
	</li>
	<li <?php echo currentPage('blog_another-article', $pageID); ?>>
		<a href="<?= $webPath; ?>blog/another-article.php">Another article</a>
	</li>
	<li <?php echo currentPage('blog_third-sample-article', $pageID); ?>>
		<a href="<?= $webPath; ?>blog/third-sample-article.php">Third sample article</a>
	</li>
</ul>