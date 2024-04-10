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

                $page_title = "Welcome, $first_name";
            }
        ?>

        <table style="border-collapse: separate; border-spacing: 0 1em;">
            <tr>
                <td class="text-bold pr-3">Username:</td>
                <td><?= $username ?></td>
            </tr>
            <tr>
                <td class="text-bold pr-3">First Name:</td>
                <td><?= $first_name ?></td>
            </tr>
            <tr>
                <td class="text-bold pr-3">Last Name:</td>
                <td><?= $last_name ?></td>
            </tr>
            <tr>
                <td class="text-bold pr-3">Birthdate:</td>
                <td><?= $birthdate ?></td>
            </tr>
            <tr>
                <td class="text-bold pr-3">Gender:</td>
                <td><?= $gender ?></td>
            </tr>
            <tr>
                <td class="text-bold pr-3">Weight:</td>
                <td><?= $weight ?></td>
            </tr>
        </table>
    </div>
</div>