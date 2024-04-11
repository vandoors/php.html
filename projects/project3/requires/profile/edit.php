<?php
    if (isset($_POST['edit_profile']))
    {
        require_once __DIR__ . '/../dbconnection.php';
        require_once __DIR__ . '/../queryutils.php';

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or trigger_error(
                    'Error connecting to MySQL server for DB_NAME.', 
                    E_USER_ERROR
            );

        $log_out = false;

        if (!empty($_POST['password']))
        {
            $query = "UPDATE exercise_user SET sh_password = ? WHERE id = ?";

            $salted_hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            parameterizedQuery($dbc, $query, 'si', $salted_hashed_password, $id)
                or trigger_error(mysqli_error($dbc), E_USER_ERROR);
            
            $log_out = true;
        }

        if (!empty($_POST['first_name']) && $_POST['first_name'] !== $first_name)
        {
            $query = "UPDATE exercise_user SET first_name = ? WHERE id = ?";

            parameterizedQuery($dbc, $query, 'si', $_POST['first_name'], $id)
                or trigger_error(mysqli_error($dbc), E_USER_ERROR);
        }

        if (!empty($_POST['last_name']) && $_POST['last_name'] !== $last_name)
        {
            $query = "UPDATE exercise_user SET last_name = ? WHERE id = ?";

            parameterizedQuery($dbc, $query, 'si', $_POST['last_name'], $id)
                or trigger_error(mysqli_error($dbc), E_USER_ERROR);
        }

        if (!empty($_POST['birthdate']) && $_POST['birthdate'] !== $birthdate)
        {
            $query = "UPDATE exercise_user SET birthdate = ? WHERE id = ?";

            parameterizedQuery($dbc, $query, 'si', $_POST['birthdate'], $id)
                or trigger_error(mysqli_error($dbc), E_USER_ERROR);
        }

        if (!empty($_POST['gender']) && $_POST['gender'] !== $birthdate)
        {
            $query = "UPDATE exercise_user SET gender = ? WHERE id = ?";

            parameterizedQuery($dbc, $query, 'si', $_POST['gender'], $id)
                or trigger_error(mysqli_error($dbc), E_USER_ERROR);
        }

        if (!empty($_POST['weight']) && $_POST['weight'] !== $weight)
        {
            $query = "UPDATE exercise_user SET weight = ? WHERE id = ?";

            parameterizedQuery($dbc, $query, 'ii', $_POST['weight'], $id)
                or trigger_error(mysqli_error($dbc), E_USER_ERROR);
        }

        if ($log_out)
        {
            session_destroy();
            header('Location: logout.php');
        }
        else
        {
            $home_url = dirname($_SERVER['PHP_SELF']);
            header('Location: ' . $home_url);
        }
    }
?>

<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <div class="mb-6">
        <div class="form-group">
            <div class="form-group-header">
                <label for="firstName" class="form-label">Username</label>
            </div>
            <div class="form-group-body">
                <input type="text" maxlength="24" class="form-control" id="username" name="username" value="<?=$username?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group-header">
                <label for="firstName" class="form-label">Password</label>
            </div>
            <div class="form-group-body">
                <input type="password" maxlength="100" class="form-control" id="password" name="password">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-group-header">
            <label for="firstName" class="form-label">First Name</label>
        </div>
        <div class="form-group-body">
            <input type="text" maxlength="32" class="form-control" id="firstName" name="first_name" value="<?=$first_name?>">
        </div>
    </div>

    <div class="form-group">
        <div class="form-group-header">
            <label for="lastName" class="form-label">Last Name</label>
        </div>
        <div class="form-group-body">
            <input type="text" maxlength="32" class="form-control" id="lastName" name="last_name" value="<?=$last_name?>">
        </div>
    </div>

    <div class="form-group">
        <div class="form-group-header">
            <label for="birthdate" class="form-label">Birthdate</label>
        </div>
        <div class="form-group-body">
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?=$birthdate?>">
        </div>
    </div>

    <div class="form-group">
        <div class="form-group-header">
            <label for="gender" class="form-label">Gender</label>
        </div>
        <div class="form-group-body">
            <select class="form-control" id="gender" name="gender">
                <option value="M" <?php echo $gender == 'M' ? 'selected' : ''; ?>>Male</option>
                <option value="F" <?php echo $gender == 'F' ? 'selected' : ''; ?>>Female</option>
                <option value="N" <?php echo $gender == 'N' ? 'selected' : ''; ?>>Non-binary</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="form-group-header">
            <label for="weight" class="form-label">Weight <span class="color-fg-muted text-normal">(lbs)</span></label>
        </div>
        <div class="form-group-body">
            <input type="number" min="1" max="999" class="form-control" id="weight" name="weight" value="<?=$weight?>">
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-outline mt-3" name="edit_profile">Edit profile</button>
    </div>
</form>