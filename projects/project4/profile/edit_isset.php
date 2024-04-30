<?php
// updating profile with new info

$log_out = false;

require_once('/var/www/html/projects/project4/dbconnection.php');
require_once('/var/www/html/projects/project4/queryutils.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
   or trigger_error(
      'Error connecting to MySQL server for DB_NAME.',
      E_USER_ERROR
   );

if (!empty($_POST['password'])) {
   $query = "UPDATE twitter_user SET sh_password = ? WHERE id = ?";
   $salted_hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

   parameterizedQuery($dbc, $query, 'si', $salted_hashed_password, $_SESSION['id'])
      or trigger_error(mysqli_error($dbc), E_USER_ERROR);

   $log_out = true;
}

$query = "SELECT username FROM twitter_user WHERE id = ?";
$results = parameterizedQuery($dbc, $query, 'i', $_SESSION['id'])
   or trigger_error(mysqli_error($dbc), E_USER_ERROR);
$row = mysqli_fetch_array($results);
$current_username = $row['username'];
if (!empty($_POST['username']) && $_POST['username'] != $current_username) {
   $query = "SELECT * FROM twitter_user WHERE username = ?";

   $username = $_POST['username'];

   $results = parameterizedQuery($dbc, $query, 's', $username)
      or trigger_error(mysqli_error($dbc), E_USER_ERROR);

   if (mysqli_num_rows($results) == 0) {
      $query = "UPDATE twitter_user SET username = ? WHERE id = ?";
      parameterizedQuery($dbc, $query, 'si', $_POST['username'], $_SESSION['id'])
         or trigger_error(mysqli_error($dbc), E_USER_ERROR);
   } else {
      echo "<p class='text-yellow-600'>An account already exists for username "
         .  "<b>$username</b>; please use "
         .  "a different username.</p>";
   }
}

if (!empty($_POST['display_name'])) {
   $query = "UPDATE twitter_user SET display_name = ? WHERE id = ?";
   parameterizedQuery($dbc, $query, 'si', $_POST['display_name'], $_SESSION['id'])
      or trigger_error(mysqli_error($dbc), E_USER_ERROR);
}

if ($log_out) {
   header("Location: /projects/project4/logout.php");
}
