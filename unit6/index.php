<?php
include_once "config.php";
$task = "";  //reset, views, stocks
$message = "Pick an Action Above.";
$showTable = false;
$showAddForm = false;
$filename = "stocks.txt";
if(isset($_GET['t'])){
    $task = $_GET['t'];

    //Let's wipe out table first
    if($task == "reset"){
        $success = $db->truncateTable(TABLE_STOCK);
        if($success){
            $message = "All data removed.";
        }else{
            $errors[] = "Could not delete.";
        }
    }else if($task == "stocks"){
        // Check if data already exists
        $result = $db->getAllRecords(TABLE_STOCK);
        if($result->rowCount() > 0){
            $message = "Stocks data already added.";
        }else {
            //Load stocks data to DB
            $success = $sfn->processData($filename, $db);

            //No error!
            if ($success) {
                $message = "All stocks data added!";
            } else {
                $errors[] = "Couldn't insert data.";
            }
        }
    }else if($task == "view"){
        //Get all records
        $rows = $db->getAllRecords(TABLE_STOCK);

        //If there is no data, then display a message
        if($rows->rowCount() == 0){
            $message = "There are no data!";
        }else{
            $showTable = true;
        }
    }else if($task == "add"){
        $showAddForm = true;
    }
}
// Add new stock data
if(isset($_POST['submit'])){
    $data=[NULL,$_POST['company'],$_POST['symbol'],$_POST['sector'],$_POST['price']];
    $success = $db->insertRecord(TABLE_STOCK, $data);

    if ($success) {
        $message = "New stock added!";
    } else {
        $errors[] = "Unable to add new company stock.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company Stocks</title>
    <link href="assets/css/stocks.css" rel="stylesheet">
</head>
<body>
<div class="main-container">
    <?php $sfn->showHeader(); ?>
    <main>
        <!-- show error messages-->
        <?php
        if(isset($errors)){
            echo "<div class='error-message'>";
            foreach($errors as $error){
                echo "<h1>* $error</h1>";
            }
            echo "</div>";
        }

        // show table
        if($showTable){
            $sfn->showStocksTable($rows);
        }else if($showAddForm){
            $sfn->showAddForm();
        }else{
            echo " <h1>$message</h1>";
        }?>

    </main>
    <?php $sfn->showFooter(); ?>
</div>
</body>
</html>