<?php
    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
?>
<div class="d-flex">
    <div>
        <?php
            require_once __DIR__ . '/../dbconnection.php';
            require_once __DIR__ . '/../queryutils.php';

            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or trigger_error('Error connecting to MySQL server for'
                        .  DB_NAME, E_USER_ERROR);
            
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];

                $query = "SELECT id, username, first_name, last_name, birthdate, gender, weight "
                        . "FROM exercise_user WHERE id = ?";

                $results = parameterizedQuery($dbc, $query, 'i', $id)
                        or trigger_error(mysqli_error($dbc), E_USER_ERROR);
                
                if (mysqli_num_rows($results) == 1)
                {
                    $row = mysqli_fetch_assoc($results);

                    $id = $row['id'];
                    $username = $row['username'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $birthdate = $row['birthdate'];
                    $gender = $row['gender'];
                    $weight = $row['weight'];

                    if ($gender == 'M')
                    {
                        $gender = 'Male';
                    }
                    else if ($gender == 'F')
                    {
                        $gender = 'Female';
                    }
                    else if ($gender == 'N')
                    {
                        $gender = 'Non-binary';
                    }
                }
            }
        ?>

        <form>
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
                    <label for="firstName" class="form-label">First Name</label>
                </div>
                <div class="form-group-body">
                    <input type="text" maxlength="32" class="form-control" id="firstName" name="first_name" value="<?=$first_name?>" disabled>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group-header">
                    <label for="lastName" class="form-label">Last Name</label>
                </div>
                <div class="form-group-body">
                    <input type="text" maxlength="32" class="form-control" id="lastName" name="last_name" value="<?=$last_name?>" disabled>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group-header">
                    <label for="birthdate" class="form-label">Birthdate</label>
                </div>
                <div class="form-group-body">
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?=$birthdate?>" disabled>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group-header">
                    <label for="gender" class="form-label">Gender</label>
                </div>
                <div class="form-group-body">
                    <select class="form-control" id="gender" name="gender" disabled>
                        <option value="M" <?php echo $gender == 'M' ? 'selected' : ''; ?>>Male</option>
                        <option value="F" <?php echo $gender == 'F' ? 'selected' : ''; ?>>Female</option>
                        <option value="N" <?php echo $gender == 'N' ? 'selected' : ''; ?>>Non-binary</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group-header">
                    <label for="weight" class="form-label">Weight <span class="color-fg-muted">(lbs)</span></label>
                </div>
                <div class="form-group-body">
                    <input type="number" min="1" max="999" class="form-control" id="weight" name="weight" value="<?=$weight?>" disabled>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3" name="create_profile">Create profile</button>
            </div>
        </form>
    </div>
</div>