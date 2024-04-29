<?php
$page_title = 'Twitter';
?>
<!doctype html>
<html>
<?php require_once('./partials/head.php'); ?>

<body>
    <?php if (!isset($_SESSION['id'])) : ?>
        <?php require_once('./home/main.php'); ?>
    <?php else : ?>
    <?php endif; ?>
</body>

</html>