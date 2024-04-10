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
                
                if (mysqli_num_rows($results) == 1) {
                    $row = mysqli_fetch_assoc($results);

                    $id = $row['id'];
                    $username = $row['username'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $birthdate = $row['birthdate'];
                    $gender = $row['gender'];
                    $weight = $row['weight'];
                }

                echo "id: $id<br>";
                echo "username: $username<br>";
                echo "first_name: $first_name<br>";
                echo "last_name: $last_name<br>";
                echo "birthdate: $birthdate<br>";
                echo "gender: $gender<br>";
                echo "weight: $weight<br>";
            }
        ?>
    </div>
</div>