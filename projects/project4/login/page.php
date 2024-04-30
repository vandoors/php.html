<?php
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}

if (empty($_SESSION['user_id']) && isset($_POST['log_in'])) {
   require_once('isset.php');
}
?>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
   <label for="username" class="text-lg font-medium">Username</label>
   <input type="text" maxlength="16" class="block mb-4 bg-gray-200 rounded-lg px-2 py-1" id="username" name="username" required>

   <label for="password" class="text-lg font-medium">Password</label>
   <input type="password" maxlength="100" class="block mb-4 bg-gray-200 rounded-lg px-2 py-1" id="password" name="password" required>

   <button type="submit" class="block px-2 py-1 bg-sky-400 text-white hover:opacity-90 rounded-md" name="log_in">Log in</button>
</form>