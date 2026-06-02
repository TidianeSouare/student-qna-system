<h2>Manage Modules</h2>

<?php if (!empty($message)): ?><p style="color:red;"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>

<form method="post" action="manage_modules.php">
    <input type="text" name="name" placeholder="Module name" required>
    <button type="submit" name="add_module">Add Module</button>
</form>

<?php if (empty($modules)): ?>
    <p>No modules found.</p>
<?php else: ?>
    <table border="1" cellpadding="6">
        <tr><th>Module</th><th>Actions</th></tr>
        <?php foreach ($modules as $m): ?>
        <tr>
            <td><?= htmlspecialchars($m['name'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td>
                <a href="edit_module.php?id=<?= $m['id']; ?>">Edit</a> |
                <a href="delete_module.php?id=<?= $m['id']; ?>" onclick="return confirm('Delete module?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
