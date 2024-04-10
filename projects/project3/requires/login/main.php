<?php
    session_start();

    if (empty($_SESSION['user_id']) && isset($_POST['log_in']))
    {
        require_once('isset.php');
    }
?>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <div class="form-group">
        <div class="form-group-header">
            <label for="firstName" class="form-label">Username</label>
        </div>
        <div class="form-group-body">
            <input type="text" maxlength="24" class="form-control" id="username" name="username" required>
        </div>
    </div>

    <div class="form-group">
        <div class="form-group-header">
            <label for="firstName" class="form-label">Password</label>
        </div>
        <div class="form-group-body">
            <input type="password" maxlength="100" class="form-control" id="password" name="password" required>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary mt-3" name="log_in">Log in</button>
    </div>
</form>