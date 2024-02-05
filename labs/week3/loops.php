<html>
    <head>
        <title>loops.php</title>
    </head>
    <body>
        <table>
            <?php
                for ($i = 1; $i < 10; $i++) {
                    echo "<tr><td>" . $i . "</td><td>" . $i * $i . "</td></tr>";
                }
            ?>
        </table>
    </body>
</html>
