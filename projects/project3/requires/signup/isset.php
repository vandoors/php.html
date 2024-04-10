<?php
$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$weight = $_POST['weight'];

if (
    !empty($username)
    && !empty($password)
    && !empty($first_name)
    && !empty($last_name)
    && !empty($birthdate)
    && !empty($gender)
    && !empty($weight)
)
{
    require_once __DIR__ . '/../dbconnection.php';
    require_once __DIR__ . '/../queryutils.php';

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or trigger_error(
                    'Error connecting to MySQL server for DB_NAME.', 
                    E_USER_ERROR
            );

    // Check if user already exists
    $query = "SELECT * FROM exercise_user WHERE username = ?";

    $results = parameterizedQuery($dbc, $query, 's', $username)
            or trigger_error(mysqli_error($dbc), E_USER_ERROR);

    // IF user does not exist, create an account for them
    if (mysqli_num_rows($results) == 0)
    {
        // Hash the password
        $salted_hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert all fields into the user table
        $query = "INSERT INTO exercise_user (`username`, `sh_password`, `first_name`, `last_name`, `birthdate`, `gender`, `weight`)"
                . "VALUES (?, ?, ?, ?, ?, ?, ?)";

        $results = parameterizedQuery($dbc, $query, 'ssssssi', $username, $salted_hashed_password, $first_name, $last_name, $birthdate, $gender, $weight)
                or trigger_error(mysqli_error($dbc), E_USER_ERROR);

        // Display success message
        echo "<p class='color-fg-success'>You must enter a value for all fields.</p>";
        $show_sign_up_form = false;
    }
    else // An account already exists for this user
    {
        echo "<p class='color-fg-severe'>An account already exists for username "
                .  "<b>$username</b>; please use "
                .  "a different username.</p>";

    }
}
else
{
    // Output error message
    echo "<p class='color-fg-severe'>You must enter a value for all fields.</p>";
}