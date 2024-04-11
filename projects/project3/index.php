<?php
    $page_title = 'Exercise Logger';
?>
<!doctype html>
<html>
    <?php require_once('./requires/head.php'); ?>
    <body class="m-6">
        <?php require_once('./requires/header.php'); ?>

        <main>
            <?php if (!isset($_SESSION['id'])): ?>
                <?php require_once('./requires/home/main.php'); ?>
            <?php else: ?>
                <div class="index-grid">
                    <?php require_once('./requires/profile/main.php'); ?>
                    <?php require_once('./requires/logger/main.php'); ?>
                </div>
            <?php endif; ?>
        </main>
    </body>
</html>