<div>
   <?php
   require_once('/var/www/html/projects/project4/dbconnection.php');
   require_once('/var/www/html/projects/project4/queryutils.php');

   if (isset($_POST['delete_tweet'])) {
      $tweet_id = $_POST['tweet_id'];

      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
         or trigger_error(
            'Error connecting to MySQL server for DB_NAME.',
            E_USER_ERROR
         );

      if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
         $query = "DELETE FROM twitter_tweet WHERE id = ?";
         parameterizedQuery($dbc, $query, 'i', $tweet_id)
            or trigger_error(mysqli_error($dbc), E_USER_ERROR);
      } else {
         $query_for_user_of_tweet_to_delete = "SELECT `user_id` FROM twitter_tweet WHERE id = ?";
         $result_for_user_of_tweet_to_delete = parameterizedQuery($dbc, $query_for_user_of_tweet_to_delete, 'i', $tweet_id)
            or trigger_error(mysqli_error($dbc), E_USER_ERROR);

         $row_for_user_of_tweet_to_delete = mysqli_fetch_array($result_for_user_of_tweet_to_delete);
         $user_id = $row_for_user_of_tweet_to_delete['user_id'];

         if ($user_id != $_SESSION['id']) {
            echo "<p class='text-red-500'>You do not have permission to delete this tweet.</p>";
         } else {
            $query = "DELETE FROM twitter_tweet WHERE id = ?";
            parameterizedQuery($dbc, $query, 'i', $tweet_id)
               or trigger_error(mysqli_error($dbc), E_USER_ERROR);
         }
      }
   }

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
      or trigger_error(
         'Error connecting to MySQL server for DB_NAME.',
         E_USER_ERROR
      );

   $query = "SELECT `id`, `user_id`, `date`, `content` FROM twitter_tweet WHERE user_id = ? ORDER BY `date` DESC";
   $result = parameterizedQuery($dbc, $query, 'i', $user_id)
      or trigger_error(mysqli_error($dbc), E_USER_ERROR);

   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
         $tweet_id = $row['id'];
         $user_id = $row['user_id'];
         $date = $row['date'];
         $content = $row['content'];

         echo "<article class='px-3 pb-5 pt-3 border-b'>";
         echo "<header class='flex flex-row gap-4 pb-1'>";
         echo "<span><span class='font-medium pr-2'>$display_name</span><span class='text-gray-500'>@$username</span></span>";
         echo "<span class='text-gray-600'>$date</span>";
         echo "</header>";
         echo "<p class='tweet-content'>$content</p>";

         if ((isset($_SESSION['id']) && $user_id == $_SESSION['id']) || (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1)) {
            echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "' class='pt-2'>";
            echo "<input type='hidden' name='tweet_id' value='$tweet_id'>";
            echo "<button type='submit' class='block ml-auto text-right text-gray-400 hover:text-red-500' name='delete_tweet'>Delete</button>";
            echo "</form>";
         }

         echo "</article>";
      }
   } else {
      echo "<p>No tweets found.</p>";
   }
   ?>
</div>