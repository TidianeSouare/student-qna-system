<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #3f51b5;
            color: white;
            text-align: center;
            padding: 1em;
        }
        nav {
            background-color: #eee;
            padding: 0.5em;
            text-align: center;
        }
        nav a {
            margin: 0 1em;
            text-decoration: none;
            color: #3f51b5;
            font-weight: bold;
        }
        nav span {
            color: #555;
            margin: 0 1em;
        }
        main {
            padding: 1em 2em;
            padding-bottom: 80px;
        }
        footer {
            background-color: #3f51b5;
            color: white;
            text-align: center;
            padding: 0.5em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1>Student Q&A System</h1>
</header>

<nav>

    <a href="index.php">Home</a>
    <a href="questions.php">View Questions</a>
    <a href="addquestion.php">Ask Question</a>
    <a href="contact.php">Contact Admin</a>

    <?php if (isset($_SESSION['username'])): ?>

        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a href="admin_dashboard.php">Admin Dashboard</a>
        <?php endif; ?>

        <a href="logout.php">Logout (<?= htmlspecialchars($_SESSION['username']) ?>)</a>

    <?php else: ?>

        <a href="login.php">Login</a>

    <?php endif; ?>

</nav>

<main>
    <?= $output ?>
</main>

<footer>
    &copy; <?= date('Y') ?> Student Q&A System
</footer>

</body>
</html>
