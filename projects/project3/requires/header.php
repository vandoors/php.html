<?php
    $page_title = isset($page_title) ? $page_title : "";

    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
?>
<header class="mb-6">
    <h1 class="h2"><?= $page_title ?></h1>
    <nav>
        <ul>
            <li class="d-inline-block"><a href=<?= dirname($_SERVER['PHP_SELF']) ?>>Home</a></li>
            <?php if (!isset($_SESSION['user_name'])): ?>
                <a href=<?= dirname($_SERVER['PHP_SELF']) . '/profile' ?>>Profile</a>
            <?php else: ?>
                <a href=<?= dirname($_SERVER['PHP_SELF']) . 'logout.php' ?>>Logout (<?=$_SESSION['username'] ?>)</a>
            <?php endif; ?>
        </ul>
    </nav>

    <hr>
</header>