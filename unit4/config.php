<?php
//Error reporting
error_reporting(0);

//Turn on session
session_start();

//Include dependencies
include "includes/db.php";
include "includes/functions.php";

//Db connection
$db = new DB();
$gfn = new GuestbookFunction();
