<?php
$page_title = 'Twitter';
?>
<!doctype html>
<html>
<?php require_once('./_partials/head.php'); ?>

<body>
    <div className="flex w-full justify-center">
        <div className="flex w-full max-w-[70rem] flex-row gap-2 md:h-full">
            <aside className="sticky top-0 w-1/3 self-start overflow-y-scroll">
                <?php if (!isset($_SESSION['id'])) : ?>
                    <?php require_once('./home/page.php'); ?>
                <?php else : ?>
                <?php endif; ?>
            </aside>
            <div className="w-2/3">
                <p>test</p>
            </div>
        </div>
    </div>
</body>

</html>