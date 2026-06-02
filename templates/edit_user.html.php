<h2>Edit User</h2>

<?php if (!empty($message)): ?>
    <p style="color:red;"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>

<form action="edit_user.php" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">

    <label>Username:</label><br>
    <input type="text" name="username" value="<?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>"><br><br>

    <label>New Password (leave blank to keep existing):</label><br>
    <input type="password" name="password"><br><br>

    <label>Role:</label><br>
    <select name="role">
        <option value="user" <?= ($user['role'] === 'user') ? 'selected' : '' ?>>User</option>
        <option value="admin" <?= ($user['role'] === 'admin') ? 'selected' : '' ?>>Admin</option>
    </select><br><br>

    <button type="submit">Save Changes</button>
</form>
