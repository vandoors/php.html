<?php
    $show_sign_up_form = true;

    if (isset($_POST['create_profile']))
    {
        require_once('isset.php');
    }

    if ($show_sign_up_form):
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
        <div class="form-group-header">
            <label for="firstName" class="form-label">First Name</label>
        </div>
        <div class="form-group-body">
            <input type="text" maxlength="32" class="form-control" id="firstName" name="first_name" required>
        </div>
    </div>

    <div class="form-group">
        <div class="form-group-header">
            <label for="lastName" class="form-label">Last Name</label>
        </div>
        <div class="form-group-body">
            <input type="text" maxlength="32" class="form-control" id="lastName" name="last_name" required>
        </div>
    </div>

    <div class="form-group">
        <div class="form-group-header">
            <label for="birthdate" class="form-label">Birthdate</label>
        </div>
        <div class="form-group-body">
            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
        </div>
    </div>

    <div class="form-group">
        <div class="form-group-header">
            <label for="gender" class="form-label">Gender</label>
        </div>
        <div class="form-group-body">
            <select class="form-control" id="gender" name="gender" required>
                <option value="" disabled selected>Choose your gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="N">Non-binary</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="form-group-header">
            <label for="weight" class="form-label">Weight <span class="color-fg-muted text-normal">(lbs)</span></label>
        </div>
        <div class="form-group-body">
            <input type="number" min="1" max="999" class="form-control" id="weight" name="weight" required>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary mt-3" name="create_profile">Create profile</button>
    </div>
</form>
<?php
    endif;
?>