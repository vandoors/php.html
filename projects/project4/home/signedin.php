<div class="pt-2">
   <p class="font-semibold text-lg">What's happening?!</p>

   <?php
   if (isset($_POST['tweet']) && isset($_POST['content'])) {
      require_once('../isset.php');
   }
   ?>
   <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
      <textarea class="block w-full bg-gray-200 rounded-lg px-2 py-1" name="content" maxlength="140" required></textarea>

      <button type="submit" class="block px-2 py-1 bg-sky-400 text-white hover:opacity-90 rounded-md" name="tweet">Tweet</button>
   </form>
</div>