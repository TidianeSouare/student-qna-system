<h2>Login to Student Q&amp;A System</h2>

<?php if (!empty($message)): ?>
    <p style="color: red;"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>

<form action="login.php" method="post" autocomplete="off">
    <div>
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" required>
    </div>

    <br>

    <div>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required>
    </div>

    <br>

    <div>
        <button type="submit">Login</button>
    </div>
</form>

<br>


<p>
    Don’t have an account?
    <a href="register.php">Create one here</a>
</p>
