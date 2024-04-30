<div class="pt-2">
   <p class="font-semibold text-lg">What's happening?!</p>

   <?php
   if (isset($_POST['tweet']) && isset($_POST['content'])) {
      require_once('/var/www/html/projects/project4/tweet.php');
   }
   ?>
   <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" class="pt-4">
      <textarea class="block w-full bg-gray-200 rounded-lg px-2 py-1" name="content" maxlength="140" required></textarea>

      <button type="submit" class="block mt-2 px-4 py-2 bg-sky-400 text-white hover:opacity-90 rounded-md" name="tweet">Tweet</button>
   </form>

   <div class="pt-2">
      <a href="/projects/project4/profile" class="block mt-4 px-4 py-2 bg-black text-white hover:opacity-90 rounded-md">Profile</a>
   </div>
</div>