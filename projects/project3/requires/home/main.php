<p>
    Welcome to Exercise Logger! This web application allows you to simply log your exercises and track your progress. 
    To get started, please create a profile below. Otherwise, if you already have a profile, please log in.
</p>

<div class="d-flex flex-row flex-wrap home">
    <div>
        <h2 class="h3">Create a profile</h2>
        <?php require_once('./requires/signup/main.php'); ?>
    </div>

    <div>
        <h2 class="h3">Log in</h2>
        <?php require_once('./requires/login/main.php'); ?>
    </div>
</div>