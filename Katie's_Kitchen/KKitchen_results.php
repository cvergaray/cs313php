<?php
session_start();
include 'KKHead.php';
include 'getCategory2.php';
//include 'dbConnection.php';
$db = loadDB();



if(isset($_GET['category']))
   $category = $_GET['category'];
else
   $category = $_POST['category'];

echo '<h1>' . $category . '</h1>';

// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
 
// show messages based on given action
if($action=='added'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was added to your cart!";
    echo "</div>";
}
 
else if($action=='exists'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> already exists in your cart!";
    echo "</div>";
}

//display the items from that type

$query = "SELECT * FROM item WHERE item_type = (SELECT baked_good_id FROM baked_good Where item_name = '" . $category . "'";

$query = "SELECT baked_good_id FROM baked_good WHERE item_name = '" . $category . "'";
$stmt = $db->prepare($query);
$stmt->execute();
$itemNum = $stmt->fetch(PDO::FETCH_ASSOC)["baked_good_id"];

$query = "SELECT * FROM item WHERE item_type = " . $itemNum; //(SELECT baked_good_id FROM baked_good WHERE item_name = 'Pies'";
$stmt = $db->prepare($query);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   //var_dump($row);   
   echo '<div class="product">';
   echo '<H3>' . $row['item_name'] . '</h3> <br>';
   echo '<img width=400 src="ShowImage.php?id=' . $row["item_picture"] . '"> <br>';
   echo '<p>' . $row['item_description'] . '</p>';
   $cost = $row['item_price'];
   $dollars = (int) ($cost / 100);
   $pennies = sprintf("%02s", ($cost % 100));
   echo 'Price: $' . $dollars . '.' . round($pennies, 2) . '<br>';
   echo '<form action="addItemToCart.php" method="GET">';
   echo "<input type='hidden' name='name' value='" . $row['item_name'] . "'>";
   echo "<input type='hidden' name='name' value='" . $row['item_id'] . "'>";
   echo 'Quantity desired: <input name="quantity" type="number"><input type="submit"> <br> <hr>';
   echo '</form>';

   echo '</div>';
}
?>
<form action="KKitchen.php" method="POST" >
   <br/>
   <input type="submit" value="back">
</form>