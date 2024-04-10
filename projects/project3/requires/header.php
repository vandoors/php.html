<header>
    <h1><?= $page_title ?></h1>
    <nav>
        <ul>
            <li><a href=<?= dirname($_SERVER['PHP_SELF']) ?>>Home</a></li>
            <li><a href=<?= dirname($_SERVER['PHP_SELF']) . '/profile' ?>>Profile</a></li>
        </ul>
    </nav>
</header>