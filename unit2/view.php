<?php
include_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Awesome Guestbook</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<div class="main-container">
    <?php showHeader() ?>
    <main>
        <h1>Please sign my guestbook. It's free!</h1>

        <?php showGuestBook($conn,TABLE_GUEST) ?>

    </main>
    <footer>
        <?= getFooter() ?>
    </footer>
</div>
</body>
</html>