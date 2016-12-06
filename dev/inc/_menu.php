<?php
function currentPage($id, $pageID)
{
    $currentPage = '';
    if ($id == $pageID) {
        $currentPage = ' current';
    }
    return $currentPage;
}

?>
<header>
    <nav class="main">
        <ul>
            <li class="<?php echo currentPage('index', $pageID); ?>">
                <a class="logo" href="<?php echo $webPath; ?>index.php">Home</a></li>
            <li class="<?php echo currentPage('blog', $pageID); ?>">
                <a href="<?php echo $webPath; ?>blog.php">Blog</a>
            </li>
        </ul>
    </nav>
</header>