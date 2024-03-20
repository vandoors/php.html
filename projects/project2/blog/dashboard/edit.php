<?php
    require_once('auth.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://unpkg.com/@primer/css@^20.2.4/dist/primer.css" rel="stylesheet">

    <title>Edit post</title>
</head>
<body class="m-6">
    <?php
        require_once('../dbconnection.php');
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or trigger_error('Error connecting to MySQL server for DB_NAME.',
                        E_USER_ERROR);
        
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
            $query = "SELECT title, date, content FROM posts WHERE id = $id";
            $result = mysqli_query($dbc, $query)
                    or trigger_error('Error querying database: failed to fetch post.',
                    E_USER_ERROR);
            
            if (mysqli_num_rows($result) == 1)
            {
                $row = mysqli_fetch_assoc($result);

                $post_title = $row['title'];
                $post_date = $row['date'];
                $post_content = $row['content'];
            }
        }
        elseif (isset($_POST['update_post'], $_POST['post_title'],
                        $_POST['post_date'], $_POST['post_content']))
        {
            $id = $_POST['id'];
            $post_title = $_POST['post_title'];
            $post_date = $_POST['post_date'];
            $post_content = $_POST['post_content'];

            $query = "UPDATE posts SET title = '$post_title', "
                    . " date = '$post_date', content = '$post_content' "
                    . "WHERE id = $id";

            mysqli_query($dbc, $query)
                or trigger_error(
                    'Error querying database: failed to update post.',
                    E_USER_ERROR);
        
            $nav_link = '../dashboard/';
            header("Location: $nav_link");
        }
        else
        {
            header("Location: index.php");
        }
    ?>
    <h1 class="h2">Edit blog post</h1>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <div class="form-group-header">
                <label for="postTitle" class="form-label">Title</label>
            </div>
            <div class="form-group-body">
                <input type="text" maxlength="255" class="form-control" id="postTitle" name="post_title" placeholder="New post" value="<?=$post_title?>">
            <div>
        </div>

        <div class="form-group">
            <div class="form-group-header">
                <label for="postDate" class="form-label">Date</label>
            </div>
            <div class="form-group-body">
                <input type="date" class="form-control" id="postDate" name="post_date" value="<?=$post_date?>">
            <div>
        </div>

        <div class="form-group">
            <div class="form-group-header">
                <label for="postContent" class="form-label">Content</label>
                <p class="color-fg-muted">Post content is to be written in markdown. See the markdown <a href="https://www.markdownguide.org/basic-syntax/" target="_blank" rel="noopener noreferrer">basic syntax</a> for more information.</p>
            </div>
            <div class="form-group-body">
                <textarea class="form-control" id="postContent" name="post_content" rows="3"><?=$post_content?></textarea>
            <div>
        </div>

        <button type="submit" class="btn mt-3" name="update_post">Update post</button>

        <input type="hidden" name="id" value="<?= $id ?>">
    </form>
</body>
</html>