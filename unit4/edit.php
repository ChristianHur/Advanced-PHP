<?php
    include_once "config.php";

    $gfn->isAllowed();

    $message = "Make your edits below.";
    $showForm = false;

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            $result = $db->getOneRecord($id,TABLE_GUEST);
            if($result){
                $showForm=true;
            }else{
                throw new Exception("The record could not be retrieved");
            }
        }catch(Exception $e){
            $message = $e->getMessage();
        }
    }

    if(isset($_POST['submit'])){
        try{
            if($db->updateOneRecord($_POST,TABLE_GUEST)){
                $message = "Record was updated!";
                $showForm=false;
            }else{
                throw new Exception("Sorry, something went wrong.  Unable to sign guestbook.");
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
    <?php $gfn->showHeader() ?>
    <main>
        <h1><?= $message ?></h1>

        <?php
        if($showForm){
            $gfn->showEditForm($result);
        }
        ?>

    </main>
    <footer>
        <?= $gfn->getFooter() ?>
    </footer>
</div>
</body>
</html>