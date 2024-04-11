<?php
if (isset($_POST['delete_log']))
{
    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or trigger_error(
                'Error connecting to MySQL server for DB_NAME.', 
                E_USER_ERROR
        );

    $query = "DELETE FROM exercise_log WHERE id = ? AND user_id = ?";

    parameterizedQuery($dbc, $query, 'ii', $_POST['log_id'], $_SESSION['id'])
        or trigger_error(mysqli_error($dbc), E_USER_ERROR);

    mysqli_close($dbc);
}