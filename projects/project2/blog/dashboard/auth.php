<?php
    $username = 'student';
    $password = 'student';

    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
        || $_SERVER['PHP_AUTH_USER'] !== $username
        || $_SERVER['PHP_AUTH_PW'] !== $password)
    {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Student Listing"');
        $invalid_response = "<p>You are not authorized to view this content.</p>";
        exit($invalid_response);
    }