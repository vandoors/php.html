<?php
    require_once('./requires/page-titles.php');
    $page_title = EXC_PROFILE;
?>
<!doctype html>
<html>
    <?php require_once('./requires/head.php'); ?>
    <body class="m-6">
        <?php require_once('./requires/header.php'); ?>

        <main>
            <?php if (!isset($_SESSION['username'])): ?>
                <?php require_once('./requires/home/main.php'); ?>
            <?php else: ?>
                <?php require_once('./requires/profile/main.php'); ?>
            <?php endif; ?>
        </main>
    </body>
</html>