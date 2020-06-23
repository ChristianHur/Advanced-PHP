<?php
session_start();
include_once "./classes/base.php";
include_once "./classes/boat.php";
include_once "./classes/car.php";
include_once "./classes/plane.php";
include_once "./includes/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Awesome Vehicles of the World!</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<div class="main-container">
    <?php showHeader() ?>
    <main>
        <?php
          if(isset($_GET['obj'])){
              if(in_array($_GET['obj'],array_keys($vehicleObjects))){
                  createObject($_GET['obj']);
              }else{
                  showInvalid();
              }
          }else{
              startOver();
          }
        ?>

    </main>
    <footer>
        <?= getFooter() ?>
    </footer>
</div>
</body>
</html>