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

        if ($display_new_post_form)
        {
    ?>
    <form class="needs-validation" novalidate method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="mb-3">
            <label for="postTitle" class="form-label">Title</label>
            <input type="text" maxlength="255" class="form-control" id="postTitle" placeholder="New post" required>
        </div>
        <div class="mb-3">
            <label for="postDate" class="form-label">Date</label>
            <input type="date" class="form-control" id="postDate" required>
        </div>
        <div class="mb-3">
            <label for="postContent" class="form-label">Content</label>
            <textarea class="form-control" id="postContent" rows="3" required></textarea>
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