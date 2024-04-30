<?php
$page_title = 'Twitter';
?>
<!doctype html>
<html>
<?php require_once('head.php'); ?>

<body>
    <div class="flex w-full justify-center">
        <div class="flex w-full max-w-4xl flex-row gap-6 md:h-full">
            <aside class="sticky top-0 w-1/3 self-start pt-4">
                <a href="/projects/project4/">
                    <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 248 204">
                        <path fill="#1d9bf0" d="M221.95 51.29c.15 2.17.15 4.34.15 6.53 0 66.73-50.8 143.69-143.69 143.69v-.04c-27.44.04-54.31-7.82-77.41-22.64 3.99.48 8 .72 12.02.73 22.74.02 44.83-7.61 62.72-21.66-21.61-.41-40.56-14.5-47.18-35.07a50.338 50.338 0 0 0 22.8-.87C27.8 117.2 10.85 96.5 10.85 72.46v-.64a50.18 50.18 0 0 0 22.92 6.32C11.58 63.31 4.74 33.79 18.14 10.71a143.333 143.333 0 0 0 104.08 52.76 50.532 50.532 0 0 1 14.61-48.25c20.34-19.12 52.33-18.14 71.45 2.19 11.31-2.23 22.15-6.38 32.07-12.26a50.69 50.69 0 0 1-22.2 27.93c10.01-1.18 19.79-3.86 29-7.95a102.594 102.594 0 0 1-25.2 26.16z" />
                    </svg>
                </a>
                <?php if (!isset($_SESSION['id'])) : ?>
                    <?php require_once('./home/default.php'); ?>
                <?php else : ?>
                <?php endif; ?>
            </aside>
            <div class="w-2/3 min-h-dvh border-x pt-4">
                <div class="text-center font-bold text-lg pb-4">Recent posts</div>
                <?php require_once('./home/timeline.php'); ?>
            </div>
        </div>
    </div>
</body>

</html>