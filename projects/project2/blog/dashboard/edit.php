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

    <style>
        .color-fg-primary svg {
            fill: var(--color-accent-fg);
        }
    </style>
</head>
<body class="m-6">
    <?php
        require_once('../dbconnection.php');
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or trigger_error('Error connecting to MySQL server for'
                        .  DB_NAME, E_USER_ERROR);
        
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

            $query = "UPDATE posts SET title = ?, date = ?, content = ? WHERE id = ?";

            $stmt = mysqli_prepare($dbc, $query);

            mysqli_stmt_bind_param($stmt, 'sssi', $post_title, $post_date, $post_content, $id);

            mysqli_stmt_execute($stmt)
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
    <a href="../dashboard/" class="color-fg-primary">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M9.78 12.78a.75.75 0 0 1-1.06 0L4.47 8.53a.75.75 0 0 1 0-1.06l4.25-4.25a.751.751 0 0 1 1.042.018.751.751 0 0 1 .018 1.042L6.06 8l3.72 3.72a.75.75 0 0 1 0 1.06Z"></path></svg>
    </a>
    <h1 class="h2">Edit post</h1>
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

        <div class="form-group">
            <button type="submit" class="btn" name="update_post">Update post</button>
            <a href="delete.php?id=<?=$id?>" class="btn btn-danger">Delete post</a>
        </div>

        <input type="hidden" name="id" value="<?= $id ?>">
    </form>
</body>
</html>