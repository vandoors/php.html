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
            Hello <?= $_POST['first_name'] . " " . $_POST['last_name'] ?>
            Thank you for submitting your name.
        <?php } ?>
    </body>
</html>