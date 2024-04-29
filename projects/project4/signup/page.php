<?php
$show_sign_up_form = true;

if (isset($_POST['create_profile'])) {
    require_once('isset.php');
}

if ($show_sign_up_form) :
?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="mb-6">
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
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-3" name="create_profile">Create profile</button>
        </div>
    </form>
<?php
endif;
?>