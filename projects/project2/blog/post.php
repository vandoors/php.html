<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://unpkg.com/@primer/css@^20.2.4/dist/primer.css" rel="stylesheet">

    <?php
        if (isset($_GET['id']))
        {
            require_once('dbconnection.php');

            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or trigger_error('Error connecting to MySQL server for'
                        .  DB_NAME, E_USER_ERROR);
            
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

                require_once('Parsedown.php');
	            $Parsedown = new Parsedown();
                $Parsedown->setSafeMode(true);
                $post_content = $Parsedown->text($row['content']);
            }
        }
        else
        {
            header("Location: index.php");
        }
    ?>

    <title><?=$post_title?></title>
</head>
<body class="m-6">
    <h1 class="h2"><?=$post_title?></h1>
    <time datetime="<?=$post_date?>" class="color-fg-muted"><?=$post_date?></time>
    <hr>

    <div class="markdown-body">
        <?=$post_content?>
    </div>
</body>
</html>