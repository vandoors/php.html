<?php
    $username = 'student';
    $password = 'student';

    // IF Password OR Username are empty
    //  OR Password  OR Username don't match
    // send HTTP authentication headers
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
        || $_SERVER['PHP_AUTH_USER'] !== $username
        || $_SERVER['PHP_AUTH_PW'] !== $password)
    {

        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Student Listing"');
        $invalid_response = "<h2>Students</h2><h4>You must enter a "
                            . "valid username and password to access this page.</h4>";
        exit($invalid_response);
    }