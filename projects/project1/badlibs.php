<html>
<head>
    <title>Badlibs (project 1)</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="name">Noun</label>
        <input type="text" id="name" name="noun"><br>

        <label for="verb">Verb (past tense)</label>
        <input type="text" id="verb" name="verb"><br>

        <label for="adjective">Adjective</label>
        <input type="text" id="adjective" name="adjective"><br>

        <label for="adverb">Adverb</label>
        <input type="text" id="adverb" name="adverb"><br>

        <input type="submit" name="submit" value="Generate Badlib">
    </form>

    <hr>

    <?php
        $dbc = mysqli_connect('localhost', 'student', 'student', 'Badlibs')
                or trigger_error('Error connecting to MySQL server.', E_USER_ERROR);

        $query = "SELECT `id`, `constructed_story` FROM `badlibs` ORDER BY `id`";

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
</body>
</html>