<?php
    require_once('auth.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://unpkg.com/@primer/css@^20.2.4/dist/primer.css" rel="stylesheet">

    <title>Blog dashboard</title>
</head>
<body class="m-6">
    <h1 class="h2">Dashboard</h1>
    <p>Welcome to the blog dashboard. Here you can create, edit, and delete posts.</p>
    <a href="publish.php" class="btn btn-primary btn-sm my-2">New post</a>

    <h2 class="h3 mt-6">Posts</h2>
    <?php
        require_once('../dbconnection.php');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or trigger_error('Error connecting to MySQL server for'
                    .  DB_NAME, E_USER_ERROR);
        
        $query = "SELECT id, title, date "
                . "FROM posts ORDER BY date DESC";
        
        $result = mysqli_query($dbc, $query)
                or trigger_error('Error querying database: failed to fetch posts.', 
                E_USER_ERROR);
        
        if (mysqli_num_rows($result) > 0):
    ?>
    <table class="table width-full">
        <tbody>
            <?php
                while($row = mysqli_fetch_assoc($result))
                {
                    echo '<div class="my-3">';
                    echo '<a href="edit.php?id=' . $row['id'] . '" class="btn btn-sm mr-2">' . 'Edit</a>';
                    echo '<span class="mr-2">' . $row['title'] . '</span>';
                    echo '<span>' . $row['date'] . '</span>';
                    echo '</div>';
                }
            ?>
        </tbody>
    </table>
    <?php
        else:
    ?>
    <p>No posts found.</p>
    <?php
        endif;
    ?>
</body>
</html>