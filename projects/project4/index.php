<?php
$page_title = 'Twitter';
?>
<!doctype html>
<html>
<?php require_once('./partials/head.php'); ?>

<body>
    <?php if (!isset($_SESSION['id'])) : ?>
        <?php require_once('./requires/home/main.php'); ?>
    <?php else : ?>
        <div class="index-grid">
            <?php require_once('./requires/profile/main.php'); ?>
            <?php require_once('./requires/logger/main.php'); ?>
        </div>
    <?php endif; ?>
</body>

</html>