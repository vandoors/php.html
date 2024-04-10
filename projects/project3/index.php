<?php
    require_once('./requires/page-titles.php');
    $page_title = EXC_PROFILE;
?>
<!doctype html>
<html>
    <?php require_once('./requires/head.php'); ?>
    <body>
        <?php require_once('./requires/header.php'); ?>

        <main>
            <p>Welcome to Exercise Logger! This web application allows you to simply log your exercises and track your progress. To get started, please create a profile below. Otherwise, if you already have a profile, please log in.</p>

            <h2>Create a profile</h2>
            <?php require_once('./requires/signup.php'); ?>
        </main>
    </body>
</html>