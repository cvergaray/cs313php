<?php

session_start();

// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
 
// read the session object
$session_object = $_SESSION['cart_items'];
$session_object = stripslashes($session_object);
$saved_cart_items = json_decode($session_object, true);
 
//If we want to delete them all, all will go in the array of deleted items
$arrayDiff = ($name == "All") ? $saved_cart_items : array($id=>$name)  ;
 
// remove the item from the array
$saved_cart_items = array_diff_key($saved_cart_items, $arrayDiff);
 
 
// put item to cart
$json = json_encode($saved_cart_items, true);
$_SESSION['cart_items'] = $json;

 
// redirect to product list and tell the user it was added to cart
header('Location: cart.php?action=removed&id=' . $id . '&name=' . $name);
 
?>