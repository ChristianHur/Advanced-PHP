<?php
    include_once "config.php";

    isAllowed();

    $message = "";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            $result = deleteOneRecord($conn,$id,TABLE_GUEST);
            if($result){
                $message = "The record was deleted!";
            }else{
                throw new Exception("The record could not be deleted.");
            }
        }catch(Exception $e){
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

    </main>
    <footer>
        <?= getFooter() ?>
    </footer>
</div>
</body>
</html>