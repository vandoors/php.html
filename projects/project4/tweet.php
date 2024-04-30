<?php

$content = $_POST['content'];

if (!empty($content)) {
   require_once('./dbconnection.php');
   require_once('./queryutils.php');

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
      or trigger_error(
         'Error connecting to MySQL server for DB_NAME.',
         E_USER_ERROR
      );

   $query = "INSERT INTO twitter_tweet (`user_id`, `content`)"
      . "VALUES (?, ?)";

   $results = parameterizedQuery($dbc, $query, 'is', $_SESSION['id'], $content)
      or trigger_error(mysqli_error($dbc), E_USER_ERROR);
}
