<?php
/**
 * @param $id
 * @param $pageID
 * @return string
 *
 * Highlighting subfolders for Main menu
 * for example
 * Blog is folder and Menu item and blog.html page
 * blog/some-article.html is in subfolder
 * parent folder will be highlighted
 */
function currentPage($id, $pageID)
{
    $hasMatch = preg_match("/(.*)_/", $pageID, $matches);
    // echo 'matches, id: '.$matches[1].' - '.$id;

    if ($id == $pageID) {
        return ' class="current"';

    } else if($hasMatch) {
        if ($id == $matches[1]) {
            return ' class="current"';
        }
    }

    return '';
}

?>
<header>
    <nav class="main">
        <ul>
            <li<?php echo currentPage('index', $pageID); ?>>
                <a class="logo" href="<?php echo $webPath; ?>index.php">Home</a></li>
            <li<?php echo currentPage('blog', $pageID); ?>>
                <a href="<?php echo $webPath; ?>blog.php">Blog</a>
            </li>
            <li<?php echo currentPage('styleguide', $pageID); ?>>
                <a href="<?php echo $webPath; ?>styleguide.php">Styleguide</a>
            </li>
        </ul>
    </nav>
</header>