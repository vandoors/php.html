<?php
session_start();

if (isset($_SESSION['id']) || isset($_SESSION['username']))
{
    $_SESSION = array();
    session_destroy();
}

$home_url = dirname($_SERVER['PHP_SELF']);
header('Location: ' . $home_url);
exit;