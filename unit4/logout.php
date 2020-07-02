<?php
session_start();
session_unset();
session_destroy();

// Redirect user to home page
header("Location: vehicle.php");