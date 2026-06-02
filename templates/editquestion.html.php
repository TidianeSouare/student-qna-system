<h2>Edit Question</h2>

<?php if (!empty($message)): ?>
    <p style="color: red;"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>

<form action="editquestion.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8'); ?>">

    <div>
        <label for="questiontext">Question text</label><br>
        <textarea id="questiontext" name="questiontext" rows="6" cols="80" required><?= htmlspecialchars($question['questiontext'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>
    <br>

    <div>
        <label for="module_id">Module (optional)</label><br>
        <select name="module_id" id="module_id">
            <option value="">-- No module --</option>
            <?php foreach ($modules as $m): ?>
                <option value="<?= $m['id']; ?>"
                    <?= (isset($question['module_id']) && $question['module_id'] == $m['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($m['name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>

    <div>
        <label>Current image:</label><br>
        <?php if (!empty($question['image'])): ?>
            <img src="<?= htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8'); ?>"
                 alt="Current question image"
                 style="max-width:300px; border:1px solid #ccc; display:block; margin-bottom:8px;">
        <?php else: ?>
            <p><em>No image attached.</em></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="image">Replace image (optional, JPG/PNG/GIF, max 2MB)</label><br>
        <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/gif">
    </div>
    <br>

    <div>
        <button type="submit">Save changes</button>
        <a href="questions.php" style="margin-left:12px;">Cancel</a>
    </div>
</form>
