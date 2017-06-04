<?php 
session_start();

// db connect 
$mysqli = new mysqli("10.30.84.168", "mzemel", "18Pomona87", "mzemel_db"); 
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} 

?>
