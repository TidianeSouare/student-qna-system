<h2>Delete User</h2>

<p>Are you sure you want to delete this user?</p>

<p><strong>Username:</strong> <?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></p>

<form action="delete_user.php" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
    <button type="submit" name="confirm" value="yes" style="background-color: red; color: white; padding: 8px 12px; border: none;">Yes, Delete</button>
    <a href="manage_users.php" style="padding: 8px 12px; background-color: gray; color: white; text-decoration: none;">Cancel</a>
</form>
