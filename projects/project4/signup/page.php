<?php
$show_sign_up_form = true;

if (isset($_POST['create_profile'])) {
    require_once('isset.php');
}

if ($show_sign_up_form) :
?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" class="px-4">
        <div>
            <label for="firstName" class="text-lg font-medium">Username</label>
            <input type="text" maxlength="24" class="block mb-4 bg-gray-200 rounded-lg px-2 py-1" id="username" name="username" required>

            <label for="firstName" class="text-lg font-medium">Password</label>
            <input type="password" maxlength="100" class="block mb-4 bg-gray-200 rounded-lg px-2 py-1" id="password" name="password" required>

            <button type="submit" class="block px-2 py-1 bg-sky-400 text-white hover:opacity-90 rounded-md" name="create_profile">Create profile</button>
    </form>
<?php
endif;
?>