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
            <li class="<?php echo currentPage('me', $pageID); ?>"><a class="logo" href="me.php">Andris Shvarcs</a></li>
            <li class="<?php echo currentPage('index', $pageID); ?>">
                <a href="<?php echo $webPath; ?>index.php">Blog</a>
            </li>
        </ul>
    </nav>
</header>