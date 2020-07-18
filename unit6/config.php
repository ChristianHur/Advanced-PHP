<?php
//DB constants
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','hur_stocks');
define('TABLE_STOCK','stock');
define('DRIVER','mysql');

include_once "includes/db.php";
include_once "includes/functions.php";

$db = new DB();
$sfn = new StockFunction();