<div>
   <?php
   require_once('../dbconnection.php');
   require_once('../queryutils.php');

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

         $query = "SELECT `username`, `display_name` FROM twitter_user WHERE `id` = ?";
         $result = parameterizedQuery($dbc, $query, 'i', $user_id)
            or trigger_error(mysqli_error($dbc), E_USER_ERROR);
         $username = mysqli_fetch_array($result)['username'];
         $display_name = mysqli_fetch_array($result)['display_name'];

         echo "<article>";
         echo "<header>";
         echo "<span>$display_name</span>";
         echo "<span>@$username</span>";
         echo "<span>$date</span>";
         echo "</header>";
         echo "<p class='tweet-content'>$content</p>";
         echo "</article>";
      }
   } else {
      echo "<p>No tweets found.</p>";
   }
   ?>
</div>