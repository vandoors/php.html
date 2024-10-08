<?php
$page_title = 'Twitter - Profile';
?>
<!doctype html>
<html>
<?php require_once('../head.php'); ?>

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
               <?php require_once('../home/default.php'); ?>
            <?php elseif (empty($_GET)) : ?>
               <?php require_once('./edit.php'); ?>
            <?php else : ?>
               <?php require_once('../home/signedin.php'); ?>
            <?php endif; ?>
         </aside>
         <div class="w-2/3 min-h-dvh border-x pt-4">
            <?php if (isset($_GET['u'])) : ?>
               <?php
               require_once('/var/www/html/projects/project4/dbconnection.php');
               require_once('/var/www/html/projects/project4/queryutils.php');

               $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                  or trigger_error(
                     'Error connecting to MySQL server for DB_NAME.',
                     E_USER_ERROR
                  );

               $query2 = "SELECT `id`, `username`, `display_name` FROM twitter_user WHERE `username` = ?";
               $result2 = parameterizedQuery($dbc, $query2, 's', $_GET['u'])
                  or trigger_error(mysqli_error($dbc), E_USER_ERROR);

               if (mysqli_num_rows($result2) == 0) {
                  header("Location: ../");
               } else {
                  $row2 = mysqli_fetch_array($result2);
                  $user_id = $row2['id'];
                  $username = $row2['username'];
                  $display_name = $row2['display_name'];
               }
               ?>
               <div class="text-center font-bold text-lg pb-4">@<?= $username ?>'s recent posts</div>
               <?php require_once('timeline.php'); ?>
            <?php elseif (empty($_GET) && isset($_SESSION['id'])) : ?>
               <div class="text-center font-bold text-lg pb-4">Your recent posts</div>
               <?php $user_id = $_SESSION['id']; ?>
               <?php require_once('timeline.php'); ?>
            <?php else : ?>
               <?php header("Location: ../"); ?>
            <?php endif; ?>
         </div>
      </div>
   </div>
</body>

</html>