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

    <style>
        .post-title {
            display: inline-block;
            width: 250px;
        }
    </style>
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
                    echo '<a href="edit.php?id=' . $row['id'] . '" class="btn btn-sm mr-2">' . '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M11.013 1.427a1.75 1.75 0 0 1 2.474 0l1.086 1.086a1.75 1.75 0 0 1 0 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 0 1-.927-.928l.929-3.25c.081-.286.235-.547.445-.758l8.61-8.61Zm.176 4.823L9.75 4.81l-6.286 6.287a.253.253 0 0 0-.064.108l-.558 1.953 1.953-.558a.253.253 0 0 0 .108-.064Zm1.238-3.763a.25.25 0 0 0-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 0 0 0-.354Z"></path></svg></a>';
                    echo '<span class="post-title mr-2">' . $row['title'] . '</span>';
                    echo '<span class="color-fg-muted">' . $row['date'] . '</span>';
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