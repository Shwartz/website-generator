<?php include '../inc/_settings.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" href="@styles@">
</head>
<body>
<div id="wrap">
    <?php include '../inc/_header.php'; ?>
    <?php include '../inc/_menu.php'; ?>
    <p>/sub/another-in-sub.html</p>
    <div>This is content. And this is test for HTML min.</div>
</div>

<?php include '../inc/_footer.php'; ?>
<script data-main="<?= $webPath; ?>js/app" src="<?= $webPath; ?>js/vendor/require.js"></script>
</body>
</html>