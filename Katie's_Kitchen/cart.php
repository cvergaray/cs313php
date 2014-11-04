<?php
$debug = TRUE;

session_start();
require 'dbConnection.php';
$db = loadDB();
$page_title="Cart";

phpAlert("including head");
include 'KKHead.php';
//phpAlert("including getCategory");
//include 'getCategory2.php';
 
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
 
phpAlert("Action: $action");
if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was removed from your cart!";
    echo "</div>";
}

phpAlert("reading Session object");
// read the session object
$session_object = $_SESSION['cart_items'];
$session_object = stripslashes($session_object);
$saved_cart_items = json_decode($session_object, true);
 
phpAlert("Count of items: " . count($saved_cart_items));
if(count($saved_cart_items)>0){
    // get the product ids
    $ids = "";
    $keys = array_keys($saved_cart_items);
    foreach($keys as $id){
        $ids = $ids . $id . ",";
    }
 
    // remove the last comma
    $ids = rtrim($ids, ',');
         
    phpAlert("starting table");
    //start table
    echo "<table class='table table-hover table-responsive table-bordered'>";
 
        // our table heading
        echo "<tr>";
            echo "<th class='textAlignLeft'>Product Name</th>";
            echo "<th>Quantity</th>";
            echo "<th>Price per Unit (USD)</th>";
            echo "<th>Item Price (USD)</th>";
            echo "<th>Action</th>";
        echo "</tr>";
         
        phpAlert("Executing query");
        $query = "SELECT * FROM item WHERE item_id IN ({$ids}) ORDER BY item_name";    
        $stmt = $db->prepare( $query );               
        $sucess = $stmt->execute();
 
        phpAlert("Sucess: $sucess");
        
        $total_price=0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $item_id = $row['item_id'];
            $item_name = $row['item_name'];

            echo "<tr>";
                echo "<td>$item_name</td>";
                echo "<td>{$saved_cart_items[$item_id]}</td>";
                     $cost = $row['item_price'];
                     phpAlert("cost $cost");
                echo "<td>&#36;". buildPriceString($cost) . "</td>";
                     $cost = $cost * $saved_cart_items[$item_id];
                echo "<td>&#36;". buildPriceString($cost) . "</td>";
                echo "<td>";
                    echo "<a href='remove_from_cart.php?id={$item_id}&name={$item_name}' class='btn btn-danger'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Remove from cart";
                    echo "</a>";
                echo "</td>";
            echo "</tr>";
 
            $total_price+=$cost;
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
   echo '<form action="remove_from_cart.php?id=0&name=Everything" method="POST">';
   echo '<input type="submit" value="Empty Cart"></form>';
}
 
else{
    echo "<div class='alert alert-danger'>";
        echo "<strong>No products found</strong> in your cart!";
    echo "</div>";
}

echo '<form action="KKitchen.php" method="POST" >';
echo '   <br/>';
echo '   <input type="submit" value="back">';
echo '</form>';

?>

<?php
function phpAlert($msg) {
      if ($debug)
         echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function buildPriceString($cost) {
        $dollars = (int) ($cost / 100);
        $pennies = sprintf("%02s", ($cost % 100));
        $pennies = ($pennies == 0) ? "00" : $pennies;
        return "$dollars.$pennies";
}
?>

