<?php
// Get user name and password
$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
   require_once('../dbconnection.php');
   require_once('../queryutils.php');

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
      or trigger_error(
         'Error connecting to MySQL server for' . DB_NAME,
         E_USER_ERROR
      );

   // Check if user already exists
   $query = "SELECT id, username, sh_password "
      . "FROM twitter_user WHERE username = ?";

   $results = parameterizedQuery($dbc, $query, 's', $username)
      or trigger_error(mysqli_error($dbc), E_USER_ERROR);

   // IF user was found, validate password
   if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_array($results);

      if (password_verify($password, $row['sh_password'])) {
         $_SESSION['id'] = $row['id'];
         $_SESSION['username'] = $row['username'];

         // Redirect to the home page
         $home_url = dirname($_SERVER['PHP_SELF']);
         header('Location: ' . $home_url);
      } else {
         echo "<p>An incorrect username or password was entered.</p>";
      }
   } else if (mysqli_num_rows($results) == 0) // User does not exist
   {
      echo "<p>An incorrect username or password was entered.</p>";
   } else {
      echo "<p>Something went wrong.</p>";
   }
} else {
   echo "<p>You must enter a value for all fields.</p>";
}
