<?php
    if (isset($_POST['log_exercise']))
    {
        require_once('calcalc.php');

        $log_date = $_POST['date'];
        $exercise_type = $_POST['exercise'];
        $time_in_minutes = $_POST['time'];
        $heartrate = $_POST['heartrate'];

        $age_at_log = date_diff(date_create($birthdate), date_create($log_date))->y;
        $calories = calculateCalories($weight, $age_at_log, $gender, $time_in_minutes, $heartrate);

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or trigger_error(
                    'Error connecting to MySQL server for DB_NAME.', 
                    E_USER_ERROR
            );

        $query = "INSERT INTO exercise_log (`user_id`, `date`, `exercise_type`, `time_in_minutes`, `heartrate`, `calories`)"
                . "VALUES (?, ?, ?, ?, ?, ?)";

        $results = parameterizedQuery($dbc, $query, 'issiii', $user_id, $log_date, $exercise_type, $time_in_minutes, $heartrate, $calories)
                or trigger_error(mysqli_error($dbc), E_USER_ERROR);
    }
?>
<div class="ml-auto">
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <div class="form-group-header">
                <label for="date" class="form-label">Date</label>
            </div>
            <div class="form-group-body">
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group-header">
                <label for="exercise" class="form-label">Exercise type</label>
            </div>
            <div class="form-group-body">
                <select class="form-control" id="exercise" name="exercise" required>
                    <option value="" disabled selected>Select an exercise</option>
                    <option value="Walking">Walking</option>
                    <option value="Running">Running</option>
                    <option value="Cycling">Cycling</option>
                    <option value="Swimming">Swimming</option>
                    <option value="Weightlifting">Weightlifting</option>
                    <option value="Yoga">Yoga</option>
                    <option value="Sport">Sport</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group-header">
                <label for="time" class="form-label">Time <span class="color-fg-muted text-normal">(minutes)</span></label>
            </div>
            <div class="form-group-body">
                <input type="number" min="1" max="10000" class="form-control" id="time" name="time" required>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group-header">
                <label for="heartrate" class="form-label">Heart rate</label>
            </div>
            <div class="form-group-body">
                <input type="number" min="1" max="299" class="form-control" id="heartrate" name="heartrate" required>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-3 ml-auto d-block" name="log_exercise">Log exercise</button>
        </div>
    </form>
</div>

<div>
    <table class="log-table">
        <thead>
            <tr>
                <th class="h4" scope="col">Date</th>
                <th class="h4" scope="col">Exercise</th>
                <th class="h4" scope="col">Time (minutes)</th>
                <th class="h4" scope="col">Heart rate</th>
                <th class="h4" scope="col">Calories</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT `date`, `exercise_type`, `time_in_minutes`, `heartrate`, `calories` FROM exercise_log WHERE user_id = ? ORDER BY `date` DESC";

                $results = parameterizedQuery($dbc, $query, 'i', $user_id)
                    or trigger_error(mysqli_error($dbc), E_USER_ERROR);

                while ($row = mysqli_fetch_array($results))
                {
                    echo '<tr>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['exercise_type'] . '</td>';
                    echo '<td>' . $row['time_in_minutes'] . '</td>';
                    echo '<td>' . $row['heartrate'] . '</td>';
                    echo '<td>' . $row['calories'] . '</td>';
                    echo '<td>' . '<form action="' . $_SERVER['PHP_SELF'] . '" method="post"><input type="hidden" name="log_id" value="' . $id . '"><button type="submit" class="btn-link text-danger" name="delete_log">Delete</button></form>' . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>