<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
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
            <label for="weight" class="form-label">Weight <span class="color-fg-muted text-normal">(lbs)</span></label>
        </div>
        <div class="form-group-body">
            <input type="number" min="1" max="999" class="form-control" id="weight" name="weight" value="<?=$weight?>" disabled>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn-link mt-3" name="to_edit_profile">Edit profile</button>
    </div>
</form>