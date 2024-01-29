<html>
    <head>
        <title>Badlibs (part 1)</title>
    </head>
    <body>
        <?php if (!isset($_POST['submit'])) { ?>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="name">Noun</label>
                <input type="text" id="name" name="noun"><br>

                <label for="verb">Verb</label>
                <input type="text" id="verb" name="verb"><br>

                <label for="adverb">Adverb</label>
                <input type="text" id="adverb" name="adverb"><br>

                <label for="adjective">Adjective</label>
                <input type="text" id="adjective" name="adjective"><br>

                <input type="submit" name="submit" value="Generate Badlib">
            </form>
        <?php } else {
            // Badlib generated using Google Bard, using the Gemini Pro LLM
            /* Prompt:
                "Generate a very short badlib featuring a noun, verb, adverb, and an adjective.
                Use placeholders labeled as the part of speech."
            */
            echo "The " . $_POST['adjective'] . " goblin " . $_POST['verb'] . " the sparkly " . $_POST['noun'] . " very " . $_POST['adverb'] . ".";
        ?>
        <?php } ?>
    </body>
</html>