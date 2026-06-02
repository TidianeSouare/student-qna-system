<?php
?>
<style>
    .contact-container {
        max-width: 520px;
        margin: 20px auto;
        font-family: Arial, Helvetica, sans-serif;
        background: #fff;
        padding: 18px 22px;
        border-radius: 4px;
    }
    .contact-container h2 {
        font-size: 28px;
        margin: 0 0 18px 0;
        font-weight: 700;
    }
    .contact-row {
        margin-bottom: 18px;
    }
    .contact-row label {
        display: block;
        font-size: 18px;
        margin-bottom: 6px;
        font-weight: 600;
        color: #111;
    }
    .contact-row input[type="text"],
    .contact-row input[type="email"],
    .contact-row textarea {
        width: 100%;
        box-sizing: border-box;
        font-size: 16px;
        padding: 8px 10px;
        border: 1px solid #999;
        border-radius: 2px;
        background: #fafafa;
    }
    .contact-row textarea {
        min-height: 120px;
        resize: vertical;
    }
    .contact-actions button {
        background: #ffffff;
        color: #222;
        border: 1px solid #999;
        padding: 8px 12px;
        font-size: 15px;
        cursor: pointer;
        border-radius: 3px;
    }
    .status {
        margin-bottom: 12px;
        font-size: 15px;
    }
    .status.success { color: green; }
    .status.error { color: #cc0000; }
</style>

<div class="contact-container">
    <h2>Contact the Admin</h2>

    <?php if (!empty($message)): ?>
        <p class="status <?= $success ? 'success' : 'error' ?>">
            <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
        </p>
    <?php endif; ?>

    <form action="contact.php" method="post" novalidate>
        <div class="contact-row">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name"
                   value="<?= htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                   required>
        </div>

        <div class="contact-row">
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email"
                   value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                   required>
        </div>

        <div class="contact-row">
            <label for="message">Your Message:</label>
            <textarea id="message" name="message" required><?= htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>

        <div class="contact-actions">
            <button type="submit">Send Message</button>
        </div>
    </form>
</div>
