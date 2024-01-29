<html>
    <head>
      <title>Full name form</title>
    </head>
    <body>
        <?php if (!isset($_POST['submit'])) { ?>
            <h2>Enter your full name</h2>
            <form
                action="<?= $_SERVER['PHP_SELF'] ?>"
                method="POST"
            >
                First name:<br>
                <input type="text" name="first_name"><br>
                Last name:<br>
                <input type="text" name="last_name"><br>
                <p>
                <input type="submit" name="submit" value="Submit Name">
            </form>
        <?php } else { ?>
            <h2>:)</h2>

            <?php
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];

                $dbc = mysqli_connect('localhost', 'student', 'student', 'jvandorsten')
                    or trigger_error('Error connecting to MySQL server.', E_USER_ERROR);

                $query = "INSERT INTO fullname (first_name, last_name)"
                    . "VALUES ('$first_name', '$last_name')";

                $result = mysqli_query($dbc, $query)
                    or trigger_error('Error querying database.', E_USER_WARNING);

                if (!$result)
                {
                    trigger_error("Query error description: "
                        . mysqli_error($dbc), E_USER_WARNING);
                }

                mysqli_close($dbc);
            ?>

            Hello <?= $first_name . " " . $last_name ?>
            Thank you for submitting your name.
        <?php } ?>
    </body>
</html>