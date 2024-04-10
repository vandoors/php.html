<?php
    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
?>
<p>welcome to your profile <?=$_SESSION['username'] ?></p>