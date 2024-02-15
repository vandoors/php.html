<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Badlibs (project 1)</title>

    <link href="https://unpkg.com/@primer/css@^20.2.4/dist/primer.css" rel="stylesheet" />
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <div className="form-group">
            <div className="form-group-header">
                <label for="name">Noun</label>
            </div>

            <div className="form-group-body">
                <input className="form-control" type="text" id="name" name="noun">
            </div>
        </div>

        <div className="form-group">
            <div className="form-group-header">
                <label for="verb">Verb (past tense)</label>
            </div>

            <div className="form-group-body">
                <input className="form-control" type="text" id="verb" name="verb">
            </div>
        </div>

        <div className="form-group">
            <div className="form-group-header">
                <label for="adjective">Adjective</label>
            </div>

            <div className="form-group-body">
                <input className="form-control" type="text" id="adjective" name="adjective">
            </div>
        </div>

        <div className="form-group">
            <div className="form-group-header">
                <label for="adverb">Adverb</label>
            </div>

            <div className="form-group-body">
                <input className="form-control" type="text" id="adverb" name="adverb">
            </div>
        </div>

        <div className="form-actions">
            <div className="form-group">
                <button className="btn btn-primary" type="submit" name="submit">
                    Generate story
                </button>
            </div>
        </div>
    </form>

    <hr>

    <?php
        if (isset($_POST['submit']))
        {
            $noun = $_POST['noun'];
            $verb = $_POST['verb'];
            $adjective = $_POST['adjective'];
            $adverb = $_POST['adverb'];
            $constructed_story = "The $adjective $noun $verb $adverb — lol!";

            $dbc = mysqli_connect('localhost', 'student', 'student', 'Badlibs')
                    or trigger_error('Error connecting to MySQL server.', E_USER_ERROR);

            $query = "INSERT INTO `badlibs` (`noun`, `verb`, `adjective`, `adverb`, `constructed_story`)"
                    . "VALUES ('$noun', '$verb', '$adjective', '$adverb', '$constructed_story')";

            $result = mysqli_query($dbc, $query)
                    or trigger_error('Error querying database.', E_USER_WARNING);

            if (!$result)
            {
                trigger_error("Query error description: "
                        . mysqli_error($dbc), E_USER_WARNING);
            }

            mysqli_close($dbc);
        }
    ?>

    <?php
        $dbc = mysqli_connect('localhost', 'student', 'student', 'Badlibs')
                or trigger_error('Error connecting to MySQL server.', E_USER_ERROR);

        $query = "SELECT `id`, `constructed_story` FROM `badlibs` ORDER BY `id` DESC";

        $result = mysqli_query($dbc, $query)
                or trigger_error('Error querying database.', E_USER_WARNING);

        if (!$result)
        {
            trigger_error("Query error description: "
                    . mysqli_error($dbc), E_USER_WARNING);
        }

        $stories = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($stories as $story)
        {
            echo '<p>' . $story['constructed_story'] . '</p>';
        }

        mysqli_close($dbc);
    ?>
</body>
</html>