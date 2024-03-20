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
    
        if (isset($_POST['delete_post'], $_POST['id'])):
            $id = $_POST['id'];
            $query = "DELETE FROM posts WHERE id = $id";
            $result = mysqli_query($dbc, $query)
                    or trigger_error('Error querying database: failed to delete post.',
                    E_USER_ERROR);
            
            header("Location: ../dashboard/");
        elseif (isset($_POST['dont_delete_post'])):
            header("Location: ../dashboard/");
        elseif (isset($_GET['id'])):
    ?>
            <h1 class="h2">Delete post</h1>
            <p class="color-fg-danger">Are you sure you want to delete this post?</p>
    <?php
        $id = $_GET['id'];
        $query = "SELECT * FROM posts WHERE id = $id";
        $result = mysqli_query($dbc, $query)
                or trigger_error('Error querying database: failed to fetch post.',
                E_USER_ERROR);
        
        if (mysqli_num_rows($result) == 1):
            $row = mysqli_fetch_assoc($result);
    ?>
        <form>
            <div class="form-group">
                <div class="form-group-header">
                    <label for="postTitle" class="form-label">Title</label>
                </div>
                <div class="form-group-body">
                    <input type="text" maxlength="255" class="form-control" id="postTitle" name="post_title" placeholder="New post" value="<?=$row['title']?>" disabled>
                <div>
            </div>

            <div class="form-group">
                <div class="form-group-header">
                    <label for="postDate" class="form-label">Date</label>
                </div>
                <div class="form-group-body">
                    <input type="date" class="form-control" id="postDate" name="post_date" value="<?=$row['date']?>" disabled>
                <div>
            </div>

            <div class="form-group">
                <div class="form-group-header">
                    <label for="postContent" class="form-label">Content</label>
                    <p class="color-fg-muted">Post content is to be written in markdown. See the markdown <a href="https://www.markdownguide.org/basic-syntax/" target="_blank" rel="noopener noreferrer">basic syntax</a> for more information.</p>
                </div>
                <div class="form-group-body">
                    <textarea class="form-control" id="postContent" name="post_content" rows="3" disabled><?=$row['content']?></textarea>
                <div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-danger" name="delete_post">Delete post</button>
                <button type="submit" class="btn" name="dont_delete_post">Do not delete</button>
            </div>

            <input type="hidden" name="id" value="<?= $id ?>">
        </form>
    <?php
        else:
    ?>
        <h3>No post details availabe.</h3>
    <?php
        endif;

        else:
            header("Location: ../dashboard/");
        endif;
    ?>
</body>
</html>