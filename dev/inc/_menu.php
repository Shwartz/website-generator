<?php  //echo 'Menu $webPath: '.$webPath; ?>
    <header class="group clearfix">
            <span id="logoContainer">
                                <a href="http://virtualkristine.com">
                    <img src="http://virtualkristine.com/wp-content/uploads/2015/11/executive-service-kristine-legzdina-logo1-300x71.png" alt="Virtual assistant" />
                </a>
	            <a class="business-phone btn" href="tel:+44-775-7998277">
		            <span>+44-775-7998277</span>
	            </a>
            </span>
        <nav id="headerMenu">
            <div class="menu-menu-1-container"><ul id="menu-menu-1" class="menu"><li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-4 current_page_item menu-item-25"><a href="<?= $webPath; ?>index.php">Home</a></li>
                    <li id="menu-item-24" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-24"><a href="<?= $webPath; ?>services.php">Services</a></li>
                    <li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23"><a href="<?= $webPath; ?>prices.php">Prices</a></li>
                    <li id="menu-item-22" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22"><a href="<?= $webPath; ?>testimonials.php">Testimonials</a></li>
                    <li id="menu-item-21" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-21"><a href="<?= $webPath; ?>contact.php">Contact Me</a></li>
                </ul></div>            </nav>
    </header>



<!--<nav class="main">
    <ul>
        <li><a href="<?/*= $webPath; */?>index.php">Home index</a></li>
        <li><a href="<?/*= $webPath; */?>page-1.php">Page 1</a></li>
        <li><a href="<?/*= $webPath; */?>sub/index.php">Sub Category</a></li>
        <li><a href="<?/*= $webPath; */?>sub/page-2.php">Sub Category Page 2</a></li>
    </ul>
</nav>
-->




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