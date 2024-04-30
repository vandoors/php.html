<div>
   <?php
   require_once('/var/www/html/projects/project4/dbconnection.php');
   require_once('/var/www/html/projects/project4/queryutils.php');

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
      or trigger_error(
         'Error connecting to MySQL server for DB_NAME.',
         E_USER_ERROR
      );

   $query = "SELECT `id`, `user_id`, `date`, `content` FROM twitter_tweet WHERE user_id = ? ORDER BY `date` DESC";
   $result = parameterizedQuery($dbc, $query, 'i', $_GET['user'])
      or trigger_error(mysqli_error($dbc), E_USER_ERROR);

   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
         $tweet_id = $row['id'];
         $user_id = $row['user_id'];
         $date = $row['date'];
         $content = $row['content'];

         echo "<article class='px-3 pb-5 pt-3 border-b'>";
         echo "<header class='flex flex-row gap-1 pb-1'>";
         echo "<span class='font-medium'>$display_name</span>";
         echo "<span class='text-gray-500'>@$username</span>";
         echo "<span class='text-gray-600'>$date</span>";
         echo "</header>";
         echo "<p class='tweet-content'>$content</p>";
         echo "</article>";
      }
   } else {
      echo "<p>No tweets found.</p>";
   }
   ?>
</div>