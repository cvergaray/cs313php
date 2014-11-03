<?php

session_start();

//Connect to the database
include 'dbConnection.php';
$db = loadDB();

//Get topics
$topics = $db->query("SELECT * FROM baked_good");

// initialize empty cart items array
$cart_items=array();
 
// get the product id and name
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";
 
phpAlert("ID: $id NAME: $name QUANTITY: $quantity");

// add new item on array
$cart_items[$id]=$quantity;
 
// read the cookie
$session_object = $_SESSION['cart_items'];
$session_object = stripslashes($session_object);
$saved_cart_items = json_decode($session_object, true);
 
// if $saved_cart_items is null, prevent null error
if(!$saved_cart_items){
    $saved_cart_items=array();
}
 
// check if the item is in the array, if it is, do not add
if(array_key_exists($id, $saved_cart_items)){
    // redirect to product list and tell the user it was already added to the cart
    header('Location: KKitchen_results.php?action=exists&id' . $id . '&name=' . $name);
}
 
else{
    // if cart has contents
    if(count($saved_cart_items)>0){
        foreach($saved_cart_items as $key=>$value){
            // add old item to array, it will prevent duplicate keys
            $cart_items[$key]=$value;
        }
    }
 
    // put item to cookie
    $json = json_encode($cart_items, true);
    $_SESSION['cart_items'] = $json;
 
    // redirect
    header('Location: KKitchen_results.php?action=added&id=' . $id . '&name=' . $name . '&category=Breads');
}
?>

<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>