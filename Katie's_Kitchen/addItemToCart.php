<?php

session_start();

if (empty($_SESSION["cart"])) {
   $_SESSION['cart'] = array();
}

//Connect to the database
include 'dbConnection.php';
$db = loadDB();

//Get topics
$topics = $db->query("SELECT * FROM baked_good");
?>