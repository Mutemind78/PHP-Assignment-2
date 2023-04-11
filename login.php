<?php
$title = 'Login';
require 'shared/header.php';
?>

<main>
    <h1>Login</h1>
    <?php if (!empty($_GET['valid'])) : ?>
        <h5 class="error">Invalid Login</h5>
    <?php else : ?>
        <h5>Please enter your credentials.</h5>
    <?php endif; ?>
    <form method="post" action="validate.php">
        <fieldset>
            <label for="username">Username:</label>
            <input name="username" id="username" required type="text" placeholder="username" />
        </fieldset>
        <fieldset>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required />
        </fieldset>
        <button class="btnOffset">Login</button>
    </form>
</main>

<?php require 'shared/footer.php'; ?>


