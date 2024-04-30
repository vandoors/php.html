<?php
$page_title = 'Twitter';
?>
<!doctype html>
<html>
<?php require_once('head.php'); ?>

<body>
    <div class="flex w-full justify-center">
        <div class="flex w-full max-w-4xl flex-row gap-2 md:h-full">
            <aside class="sticky top-0 w-1/3 self-start overflow-y-scroll">
                <?php if (!isset($_SESSION['id'])) : ?>
                    <?php require_once('./home/page.php'); ?>
                <?php else : ?>
                <?php endif; ?>
            </aside>
            <div class="w-2/3 min-h-dvh border-x">
                <?php require_once('./home/timeline.php'); ?>
            </div>
        </div>
    </div>
</body>

</html>