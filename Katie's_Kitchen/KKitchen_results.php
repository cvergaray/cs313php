<?php
session_start();
include 'getCategory.php';
//include 'dbConnection.php';
$db = loadDB();
$category = $_POST['category'];
echo '<h1>' . $category . '</h1>';

//Else display the scriptures from that book

$query = "SELECT * FROM item WHERE item_type = (SELECT baked_good_id FROM baked_good Where item_name = '" . $category . "'";

   $query = "SELECT baked_good_id FROM baked_good WHERE item_name = '" . $category . "'";
   $stmt = $db->prepare($query);
   $stmt->execute();
   $itemNum = $stmt->fetch(PDO::FETCH_ASSOC)["baked_good_id"];
   
   $query = "SELECT * FROM item WHERE item_type = " . $itemNum;//(SELECT baked_good_id FROM baked_good WHERE item_name = 'Pies'";
   $stmt = $db->prepare($query);
   $stmt->execute();
   
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      //var_dump($row);
      echo '<H3>' . $row['item_name'] . '</h3> <br>';
      echo '<p>' . $row['item_description'] . '</p>';
      $cost = $row['item_price'];
      $dollars = ( $cost / 100);
      $pennies = ( $cost % 100);

      echo 'Price: $' . $dollars . '.' . $pennies . '<br> <hr>';
}
?>

<form action="KKitchen.php" method="POST" >
   <br/>
   <input type="submit" value="back">
</form>
