<div class="pt-2">
   <p class="font-semibold text-lg">What's happening?!</p>

   <?php
   if (isset($_POST['tweet']) && isset($_POST['content'])) {
      require_once('/var/www/html/projects/project4/tweet.php');
   }
   ?>
   <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" class="pt-4">
      <textarea class="block w-full bg-gray-200 rounded-lg px-2 py-1" name="content" maxlength="140" required></textarea>

      <button type="submit" class="block mt-2 px-4 py-2 bg-sky-400 text-white hover:opacity-90 rounded-md" name="tweet">Tweet</button>
   </form>

   <?php
   if (isset($_POST['edit_profile'])) {
      require_once('/var/www/html/projects/project4/profile/edit_isset.php');
   }
   ?>

   <?php
   require_once('/var/www/html/projects/project4/dbconnection.php');
   require_once('/var/www/html/projects/project4/queryutils.php');

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
      or trigger_error(
         'Error connecting to MySQL server for DB_NAME.',
         E_USER_ERROR
      );

   $profile_query = "SELECT `username`, `display_name` FROM twitter_user WHERE id = ?";
   $profile_result = parameterizedQuery($dbc, $profile_query, 'i', $_SESSION['id'])
      or trigger_error(mysqli_error($dbc), E_USER_ERROR);

   $profile_row = mysqli_fetch_array($profile_result);
   $username = $profile_row['username'];
   $display_name = $profile_row['display_name'];
   ?>
   <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" class="pt-4">
      <label for="display_name" class="text-lg font-medium">Display name</label>
      <input type="text" maxlength="16" class="block mb-4 bg-gray-200 rounded-lg px-2 py-1" id="display_name" name="display_name" value="<?= $display_name ?>" required>

      <label for="username" class="text-lg font-medium">Username</label>
      <input type="text" maxlength="16" class="block mb-4 bg-gray-200 rounded-lg px-2 py-1" id="username" name="username" value="<?= $username ?>" required>

      <label for="password" class="text-lg font-medium">Password</label>
      <input type="password" maxlength="100" class="block mb-4 bg-gray-200 rounded-lg px-2 py-1" id="password" name="password">

      <button type="submit" class="block mt-2 px-4 py-2 bg-black text-white hover:opacity-90 rounded-md" name="edit_profile">Edit profile</button>
   </form>
</div>