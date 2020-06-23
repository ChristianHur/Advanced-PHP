<?php
//$types = ["car","boat","plane"];
$vehicleObjects = ["car"=> new Car(), "boat" => new Boat(), "plane"=>new Plane() ];

function showHeader(){
    ?>
    <header>
        <h1>Vehicles of the World</h1>
        <nav class="menu">
            <ul>
                <li><a href="<?= $_SERVER['PHP_SELF']?>?obj=car">Car</a></li>
                <li><a href="<?= $_SERVER['PHP_SELF']?>?obj=boat">Boat</a></li>
                <li><a href="<?= $_SERVER['PHP_SELF']?>?obj=plane">Plane</a></li>
                <li><a href="<?= $_SERVER['PHP_SELF']?>">Start Over</a></li>
            </ul>
        </nav>
    </header>
    <?php
}

function getFooter()
{
    return "<footer>&copy;2020 Christian Hur. I own this!</footer>";
}

function startOver(){
    session_unset();
    session_destroy();
    echo "<h1>Pick A Vehicle Type Above</h1>";
};

function showInvalid(){
    echo "<h3 class='error-messages'>Invalid option.</h3>";
}

function createObject($type){
    $obj = getObj($type);
    if(isset($_GET['action'])){
        processAction($obj);
    }
    $_SESSION[$type] = serialize($obj);
    $obj->showInfo();
    showActions($type);
}

function showActions($obj){
    ?>
    <div class="actions">
        <ul>
            <li><a href="<?= $_SERVER['PHP_SELF']?>?obj=<?=$obj?>&action=start">Start Engine</a></li>
            <li><a href="<?= $_SERVER['PHP_SELF']?>?obj=<?=$obj?>&action=stop">Stop Engine</a></li>
            <li><a href="<?= $_SERVER['PHP_SELF']?>?obj=<?=$obj?>&action=accelerate">Accelerate</a></li>
            <li><a href="<?= $_SERVER['PHP_SELF']?>?obj=<?=$obj?>&action=break">Break</a></li>
        </ul>
    </div>
    <?php
}

function processAction($obj){
    echo "<h3 class='status'>";
    switch ($_GET['action']){
        case 'start': $obj->startEngine(); break;
        case 'stop': $obj->stopEngine(); break;
        case 'accelerate': $obj->accelerate(); break;
        case 'break': $obj->breaking(); break;
    }
    echo "</h3>";
}

function getObj($type){
    global $vehicleObjects;
    if(isset($_SESSION[$type])){
        return unserialize($_SESSION[$type]);
    }else{
        return $vehicleObjects[$type];
    }
}