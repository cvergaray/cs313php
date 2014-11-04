<?php

session_start();
require_once 'dbConnection.php';
$db = loadDB();
$page_title="Cart";

 
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
 
if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was removed from your cart!";
    echo "</div>";
}
 
// read the session object
$session_object = $_SESSION['cart_items'];
$session_object = stripslashes($session_object);
$saved_cart_items = json_decode($session_object, true);
 
if(count($saved_cart_items)>0){
    // get the product ids
    phpAlert("getting product ids");
    $ids = "";
    phpAlert("Creating keys array");
    $keys = array_keys($saved_cart_items);
    phpAlert("showing keys: $keys");
    var_dump($keys);
    foreach($keys as $id){
        $ids = $ids . $id . ",";
    }
 
    // remove the last comma
    $ids = rtrim($ids, ',');
         
    //start table
    echo "<table class='table table-hover table-responsive table-bordered'>";
 
        // our table heading
        echo "<tr>";
            echo "<th class='textAlignLeft'>Product Name</th>";
            echo "<th>Quantity</th>";
            echo "<th>Price (USD)</th>";
            echo "<th>Action</th>";
        echo "</tr>";
         
        $query = "SELECT * FROM item WHERE item_id IN ({$ids}) ORDER BY item_name";    
        $stmt = $db->prepare( $query );               
        $stmt->execute();
 
        $total_price=0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);            
            $item_id = $row['item_id'];
            $item_name = $row['item_name'];

            echo "<tr>";
                echo "<td>$item_name</td>";
                echo "<td>{$saved_cart_items[$item_id]}</td>";
                     $cost = $row['item_price'];
                echo "<td>&#36;". buildPriceString($cost) . "</td>";
                echo "<td>";
                    echo "<a href='remove_from_cart.php?id={$item_id}&name={$item_name}' class='btn btn-danger'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Remove from cart";
                    echo "</a>";
                echo "</td>";
            echo "</tr>";
 
            $total_price+=$row['item_price'];
        }
 
        echo "<tr>";
                echo "<td><b>Total</b></td>";
                echo "<td>&#36;" . buildPriceString($total_price) . "</td>";
                echo "<td>";
                    echo "<a href='#' class='btn btn-success'>";
                        echo "<span class='glyphicon glyphicon-shopping-cart'></span> Checkout";
                    echo "</a>";
                echo "</td>";
            echo "</tr>"; 
    echo "</table>";
}
 
else{
    echo "<div class='alert alert-danger'>";
        echo "<strong>No products found</strong> in your cart!";
    echo "</div>";
}
 
?>

<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function buildPriceString($cost) {
        $dollars = (int) ($cost / 100);
        $pennies = sprintf("%02s", ($cost % 100));
        $pennies = ($pennies == 0) ? "00" : $pennies;
        return "$dollars.$pennies";
}
?>

