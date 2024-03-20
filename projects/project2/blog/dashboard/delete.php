<?php
    require_once('auth.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://unpkg.com/@primer/css@^20.2.4/dist/primer.css" rel="stylesheet">

    <title>Delete post</title>
</head>
<body class="m-6">
    <?php
        require_once('../dbconnection.php');
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or trigger_error('Error connecting to MySQL server for DB_NAME.',
                        E_USER_ERROR);
    
        
    ?>
    <h1 class="h2">Delete post</h1>
</body>
</html>