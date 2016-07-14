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
    <nav class="main">
        <ul>
            <li class="<?= currentPage('index', $pageID); ?>">
                <a href="<?= $webPath; ?>index.php">Home index</a>
            </li>
            <li class="<?= currentPage('page-1', $pageID); ?>">
                <a href="<?= $webPath; ?>page-1.php">Page 1</a>
            </li>
            <li class="<?= currentPage('subindex', $pageID); ?>">
                <a href="<?= $webPath; ?>sub/index.php">Sub Category</a>
            </li>
            <li class="<?= currentPage('subpage-2', $pageID); ?>">
                <a href="<?= $webPath; ?>sub/page-2.php">Sub Category Page
                    2</a>
            </li>
        </ul>
    </nav>


<?php
/**
 * Method below might help to create auto menu builder.
 * Do I need it?
 */
/**
 * Finds path, relative to the given root folder, of all files and directories in the given directory and its sub-directories non recursively.
 * Will return an array of the form
 * array(
 *   'files' => [],
 *   'dirs'  => [],
 * )
 * @author sreekumar
 * @param string $root
 * @return array
 */
/*
function read_all_files($root = '.')
{
    $files = array('files' => array(), 'dirs' => array());
    $directories = array();
    $last_letter = $root[strlen($root) - 1];
    $root = ($last_letter == '\\' || $last_letter == '/') ? $root : $root . DIRECTORY_SEPARATOR;

    $directories[] = $root;

    while (sizeof($directories)) {
        $dir = array_pop($directories);
        if ($handle = opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file == '.' || $file == '..') {
                    continue;
                }
                $file = $dir . $file;
                if (is_dir($file)) {
                    $directory_path = $file . DIRECTORY_SEPARATOR;
                    array_push($directories, $directory_path);
                    $files['dirs'][] = $directory_path;
                } elseif (is_file($file)) {
                    $files['files'][] = $file;
                }
            }
            closedir($handle);
        }
    }

    return $files;
}

$menuArr = read_all_files($pathBuilder . 'source/website');
echo 'files: ' . $menuArr;
print_r($menuArr);
echo '<p>----</p>';
print_r($menuArr[files]);*/

?>