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
            <li class="d-inline-block text-italic">Exercise today... exercise tomorrow.</li>
            <?php if (isset($_SESSION['username'])): ?>
                <li class="d-inline-block"><a href=<?= dirname($_SERVER['PHP_SELF']) . '/logout.php' ?>>Logout <i>(<?=$_SESSION['username'] ?>)</i></a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <hr>
</header>