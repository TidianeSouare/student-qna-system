<style>
.form-container {
    max-width: 380px; 
    margin: 40px auto;
    padding: 25px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background: #fafafa;
    box-shadow: 0 0 10px rgba(0,0,0,0.08);
}

.form-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-container input {
    width: 100%;
    padding: 8px 10px;
    border: 1px solid #aaa;
    border-radius: 6px;
}

.form-container button {
    width: 100%;
    padding: 10px;
    background: #2a6ad6;
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 6px;
    cursor: pointer;
}

.form-container button:hover {
    background: #1d50a5;
}

.form-container a {
    display: inline-block;
    margin-top: 12px;
    text-align: center;
    width: 100%;
}
</style>

<div class="form-container">

<h2>Create an Account</h2>

<?php if (!empty($message)): ?>
    <p style="color: red; text-align:center;">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
    </p>
<?php endif; ?>

<form action="register.php" method="post" novalidate>

    <label for="username">Username</label>
    <input id="username" name="username" type="text" required
           value="<?= htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
    <br><br>

    <label for="email">Email</label>
    <input id="email" name="email" type="email" required
           value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
    <br><br>

    <label for="password">Create password</label>
    <input id="password" name="password" type="password" required>
    <br><br>

    <label for="confirm">Confirm password</label>
    <input id="confirm" name="confirm" type="password" required>
    <br><br>

    <button type="submit">Create Account</button>
</form>

<a href="login.php">Already have an account? Login</a>

</div>
