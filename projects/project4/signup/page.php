<?php
$show_sign_up_form = true;

if (isset($_POST['create_profile'])) {
    require_once('isset.php');
}

if ($show_sign_up_form) :
?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div>
            <label for="firstName" class="text-lg font-medium">Username</label>
            <input type="text" maxlength="24" class="form-control" id="username" name="username" required>

            <label for="firstName" class="form-label">Password</label>
            <input type="password" maxlength="100" class="form-control" id="password" name="password" required>

            <button type="submit" class="btn btn-primary mt-3" name="create_profile">Create profile</button>
    </form>
<?php
endif;
?>