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
            <p>Welcome to Exercise Logger! This web application allows you to simply log your exercises and track your progress. To get started, please create a profile below. Otherwise, if you already have a profile, please log in.</p>

            <div>
                <h2 class="h3">Log in</h2>
                <?php require_once('./requires/login/main.php'); ?>
            </div>

            <div class="mt-3">
                <h2 class="h3">Create a profile</h2>
                <?php require_once('./requires/signup/main.php'); ?>
            </div>
        </main>
    </body>
</html>