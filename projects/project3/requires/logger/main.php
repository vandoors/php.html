<?php
    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
?>
<div class="ml-auto logger">
    <?php
        require_once __DIR__ . '/../dbconnection.php';
        require_once __DIR__ . '/../queryutils.php';

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or trigger_error('Error connecting to MySQL server for'
                    .  DB_NAME, E_USER_ERROR);
        
        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];

            $query = "SELECT id, user_id, date, exercise_type, time_in_minutes, heartrate, calories "
                    . "FROM exercise_log WHERE user_id = ?";

            $results = parameterizedQuery($dbc, $query, 'i', $user_id)
                    or trigger_error(mysqli_error($dbc), E_USER_ERROR);
            
            if (mysqli_num_rows($results) == 1)
            {
                $row = mysqli_fetch_assoc($results);

                $log_id = $row['id'];
                $date = $row['date'];
                $exercise_type = $row['exercise_type'];
                $time_in_minutes = $row['time_in_minutes'];
                $heartrate = $row['heartrate'];
                $calories = $row['calories'];
            }
        }
    ?>

    <h2 class="h3">
        Exercise log
    </h2>

    <div class="d-flex flex-column flex-wrap">
        <?php require_once('log.php') ?>
    </div>
</div>