<div>
   <?php
   require_once('/var/www/html/projects/project4/dbconnection.php');
   require_once('/var/www/html/projects/project4/queryutils.php');

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
      or trigger_error(
         'Error connecting to MySQL server for DB_NAME.',
         E_USER_ERROR
      );

   $query = "SELECT `id`, `user_id`, `date`, `content` FROM twitter_tweet ORDER BY `date` DESC";
   $result = mysqli_query($dbc, $query)
      or trigger_error(
         'Error querying database: failed to fetch tweets.',
         E_USER_ERROR
      );

   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
         $tweet_id = $row['id'];
         $user_id = $row['user_id'];
         $date = $row['date'];
         $content = $row['content'];

         // Get tweet author info
         $query2 = "SELECT `username`, `display_name` FROM twitter_user WHERE `id` = ?";
         $result2 = parameterizedQuery($dbc, $query2, 'i', $user_id)
            or trigger_error(mysqli_error($dbc), E_USER_ERROR);
         $row2 = mysqli_fetch_array($result2);
         $username = $row2['username'];
         $display_name = $row2['display_name'];

         echo "<article class='px-3 pb-5 pt-3 border-b'>";
         echo "<header class='flex flex-row gap-1 pb-1'>";
         echo "<a href='/projects/project4/profile?u=$username'><span class='font-medium'>$display_name</span><span class='text-gray-500'>@$username</span></a>";
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