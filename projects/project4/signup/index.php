<?php
$page_title = 'Twitter - Sign Up';
?>
<!doctype html>
<html>
<?php require_once('../partials/head.php'); ?>

<body>
   <?php if (!isset($_SESSION['id'])) : ?>
      <?php require_once('./signup/page.php'); ?>
   <?php else : ?>
      <?php
      $home_url = dirname($_SERVER['PHP_SELF']);
      header('Location: ' . $home_url);
      ?>
   <?php endif; ?>
</body>

</html>