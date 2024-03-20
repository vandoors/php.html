<?php
    require_once('auth.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://unpkg.com/@primer/css@^20.2.4/dist/primer.css" rel="stylesheet">

    <title>New blog post</title>
</head>
<body class="m-6">
    <?php
        $display_new_post_form = true;

        if (isset($_POST['post_title'], $_POST['post_date'],
                $_POST['post_content']))
        {
            require_once('../dbconnection.php');

            $post_title = $_POST['post_title'];
            $post_date = $_POST['post_date'];
            $post_content = $_POST['post_content'];

            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or trigger_error('Error connecting to MySQL server for'
                        .  DB_NAME, E_USER_ERROR);
            
            $query = "INSERT INTO posts (title, date, content) " 
                    . " VALUES ('$post_title', '$post_date', "
                    . "'$post_content')";
            
            mysqli_query($dbc, $query)
                or trigger_error(
                    'Error querying database: failed to create post.',
                    E_USER_ERROR);
            
            $display_new_post_form = false;
    ?>
    
    <h1 class="h2">Post successfully created!</h1>
    <p>The below post data has been added to the database.</p>
    <hr>

    <form>
        <div class="form-group">
            <div class="form-group-header">
                <label for="postTitle" class="form-label">Title</label>
            </div>
            <div class="form-group-body">
                <input type="text" maxlength="255" class="form-control" id="postTitle" name="post_title" placeholder="New post" value="<?= isset($_POST['post_title']) ? htmlspecialchars($_POST['post_title']) : '' ?>" disabled>
            <div>
        </div>

        <div class="form-group">
            <div class="form-group-header">
                <label for="postDate" class="form-label">Date</label>
            </div>
            <div class="form-group-body">
                <input type="date" class="form-control" id="postDate" name="post_date" value="<?= isset($_POST['post_date']) ? htmlspecialchars($_POST['post_date']) : '' ?>" disabled>
            <div>
        </div>

        <div class="form-group">
            <div class="form-group-header">
                <label for="postContent" class="form-label">Content</label>
            </div>
            <div class="form-group-body">
                <textarea class="form-control" id="postContent" name="post_content" rows="3" disabled><?= isset($_POST['post_content']) ? htmlspecialchars($_POST['post_content']) : '' ?></textarea>
            <div>
        </div>
    </form>

    <?php
        }

        if ($display_new_post_form)
        {
    ?>
    <h1 class="h2">New blog post</h1>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <div class="form-group-header">
                <label for="postTitle" class="form-label">Title</label>
            </div>
            <div class="form-group-body">
                <input type="text" maxlength="255" class="form-control" id="postTitle" name="post_title" placeholder="New post" required>
            <div>
        </div>

        <div class="form-group">
            <div class="form-group-header">
                <label for="postDate" class="form-label">Date</label>
            </div>
            <div class="form-group-body">
                <input type="date" class="form-control" id="postDate" name="post_date" required>
            <div>
        </div>

        <div class="form-group">
            <div class="form-group-header">
                <label for="postContent" class="form-label">Content</label>
                <p class="color-fg-muted">Post content is to be written in markdown. See the markdown <a href="https://www.markdownguide.org/basic-syntax/" target="_blank" rel="noopener noreferrer">basic syntax</a> for more information.</p>
            </div>
            <div class="form-group-body">
                <textarea class="form-control" id="postContent" name="post_content" rows="3" required></textarea>
            <div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-3" name="create_new_post">Create post</button>
        </div>
    </form>
    <?php
      }
    ?>
</body>
</html>