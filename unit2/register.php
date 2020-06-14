<?php
include_once "config.php";
$message = "User Registration";
$errors = [];
$showForm = true;
if(isset($_POST['submit'])){
    try{
        unset($_POST['submit']);

        foreach ($_POST as $key => $value){
            $item = trim($value);  //remove white spaces
            if(strlen($item) == 0){
              $errors[] = $key . " is invalid.";
            }else{
                $_POST[$key] = $item;
            }
        }

        if(verifyUser($conn,$_POST['username'],TABLE_USERS)){
            $errors[] = "Username is taken.";
        }else{
            //No errors - good to go
            if(!$errors){
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

                if($password == $confirm_password){
                    unset($_POST['confirm_password']);
                    $_POST['password'] = password_hash($password,PASSWORD_DEFAULT);
                    if(insertOneRecord($conn,TABLE_USERS,$_POST)){
                        $message = "Thank you registering.  <a href='login.php'>Login here!</a>";
                        $showForm=false;
                    }else{
                        throw new Exception("Sorry, something went wrong.  Unable to register.");
                    }
                }else{
                    $errors[] = "Passwords do no match.";
                }
            }
        }


    }catch (Exception $e){
        $message = $e->getMessage();
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
        <h1><?= $message ?></h1>
        <div class="error-messages">
            <?php
              //show error messages
                foreach ($errors as $error){
                    echo "<span>* $error</span><br>";
                }
            ?>
        </div>
        <?php
        if($showForm){
            showRegistrationForm();
        }
        ?>

    </main>
    <footer>
        <?= getFooter() ?>
    </footer>
</div>
</body>
</html>