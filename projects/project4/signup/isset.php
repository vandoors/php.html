<?php
$username = $_POST['username'];
$password = $_POST['password'];

if (
   !empty($username)
   && !empty($password)
) {
   require_once('../_lib/dbconnection.php');
   require_once('../_lib/queryutils.php');

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
      or trigger_error(
         'Error connecting to MySQL server for DB_NAME.',
         E_USER_ERROR
      );

   // Check if user already exists
   $query = "SELECT * FROM twitter_user WHERE username = ?";

   $results = parameterizedQuery($dbc, $query, 's', $username)
      or trigger_error(mysqli_error($dbc), E_USER_ERROR);

   // IF user does not exist, create an account for them
   if (mysqli_num_rows($results) == 0) {
      // Hash the password
      $salted_hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Insert all fields into the user table
      $query = "INSERT INTO twitter_user (`username`, `sh_password`, `display_name`)"
         . "VALUES (?, ?, ?)";

      $results = parameterizedQuery($dbc, $query, 'sss', $username, $salted_hashed_password, $username)
         or trigger_error(mysqli_error($dbc), E_USER_ERROR);

      // Display success message
      echo "<p>Account created; you may now log in.</p>";
      $show_sign_up_form = false;
   } else // An account already exists for this user
   {
      echo "<p>An account already exists for username "
         .  "<b>$username</b>; please use "
         .  "a different username.</p>";
   }
} else {
   // Output error message
   echo "<p>You must enter a value for all fields.</p>";
}
