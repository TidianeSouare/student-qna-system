<h2>Manage Users</h2>

<p><a href="add_user.php">Add New User</a></p>

<?php if (empty($users)): ?>
    <p>No users found.</p>
<?php else: ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($u['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?= htmlspecialchars($u['role'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <a href="edit_user.php?id=<?= $u['id']; ?>">Edit</a> |
                    <a href="delete_user.php?id=<?= $u['id']; ?>"
                       onclick="return confirm('Delete user <?= htmlspecialchars($u['username'], ENT_QUOTES, 'UTF-8'); ?>?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
