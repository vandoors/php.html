<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://unpkg.com/@primer/css@^20.2.4/dist/primer.css" rel="stylesheet">

    <title>Blog</title>

    <style>
        .post-title {
            display: inline-block;
            width: 250px;
        }
    </style>
</head>
<body class="m-6">
    <h1 class="h2">Blog</h1>
    <p>Welcome to our blog. Here you can read all our posts. Enjoy!</p>
    <hr>

    <?php
        require_once('dbconnection.php');

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
    <?php
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<div class="my-3">';
            echo '<a href="post.php?id=' . $row['id'] . '" class="post-title mr-2">' . $row['title'] . '</a>';
            echo '<span class="color-fg-muted">' . $row['date'] . '</span>';
            echo '</div>';
        }
    ?>
    <?php
        else:
    ?>
    <p>No posts found.</p>
    <?php
        endif;
    ?>
</body>
</html>