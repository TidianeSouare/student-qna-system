<h2>Ask a New Question</h2>

<?php if (!empty($message)): ?>
    <p style="color:red;"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>

<form action="addquestion.php" method="post" enctype="multipart/form-data">
    <label for="questiontext">Your Question:</label><br>
    <textarea name="questiontext" id="questiontext" rows="6" cols="70" required><?= htmlspecialchars($_POST['questiontext'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea><br><br>

    <label for="module_id">Module (optional):</label><br>
    <select name="module_id" id="module_id">
        <option value="">-- Select module --</option>
        <?php foreach ($modules as $m): ?>
            <option value="<?= $m['id']; ?>" <?= (isset($_POST['module_id']) && $_POST['module_id'] == $m['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($m['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label for="image">Attach an image (optional, max 2MB):</label><br>
    <input type="file" name="image" id="image" accept="image/*"><br><br>

    <input type="submit" value="Submit Question">
</form>
