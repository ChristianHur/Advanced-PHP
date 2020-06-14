<?php
include_once "config.php";
$messages = [];

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    try {
        if (strlen($username) > 0 && strlen($password) > 0) {
            $isValidPassword = verifyPassword($conn,$username,$password,TABLE_USERS);
            if ($isValidPassword) {
                //Login successful
                $_SESSION['user']=ucfirst($username);
                header("Location: vehicle.php");
            } else {
                throw new Exception("Sorry, something went wrong.  Try again.");
            }
        }else{
            throw new Exception("Sorry, something went wrong.  Try again.");
        }
    } catch (Exception $e) {
        $messages[] = $e->getMessage();
    }
}
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
        <h1>Login</h1>
        <div class="error-messages">
            <?php
            foreach ($messages as $message) {
                echo "<p>* $message</p>";
            }
            ?>
        </div>
        <?php
         showLoginForm();
        ?>

    </main>
    <footer>
        <?= getFooter() ?>
    </footer>
</div>
</body>
</html>

