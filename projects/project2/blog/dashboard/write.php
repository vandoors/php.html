<?php
    require_once('auth.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>New blog post</title>
</head>
<body>
    <h1>New blog post</h1>
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
                    or trigger_error(
                            'Error connecting to MySQL server for' . DB_NAME, 
                            E_USER_ERROR);
            
            $query = "INSERT INTO posts (title, date, content) " 
                    . " VALUES ('$post_title', '$post_date', "
                    . "'$post_content')";
            
            mysqli_query($dbc, $query)
                or trigger_error(
                    'Error querying database: failed to create post.',
                    E_USER_ERROR);
            
            $display_add_student_form = false;
        }
    ?>
    
    <h2>Post successfully created!</h2>
    <p>The following post has been added to the database:</p>
    <hr>
    <p><strong>Title:</strong> <?= $post_title ?></p>
    <p><strong>Date:</strong> <?= $post_date ?></p>
    <p><strong>Content:</strong></p>
    <p><?= $post_content ?></p>

    <?php
        }

        if ($display_new_post_form)
        {
    ?>
    <form class="needs-validation" novalidate method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="mb-3">
            <label for="postTitle" class="form-label">Title</label>
            <input type="text" maxlength="255" class="form-control" id="postTitle" name="post_title" placeholder="New post" required>
        </div>
        <div class="mb-3">
            <label for="postDate" class="form-label">Date</label>
            <input type="date" class="form-control" id="postDate" name="post_date" required>
        </div>
        <div class="mb-3">
            <label for="postContent" class="form-label">Content</label>
            <textarea class="form-control" id="postContent" name="post_content" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="create_new_post">Create post</button>
        </div>
    </form>
    <?php
      }
    ?>
</body>
</html>