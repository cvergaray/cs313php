<?php
session_start();
include 'getCategory.php';
$db = loadDB();
$category = $_POST['category'];
echo '<h1>' . $category . '</h1>';

//Else display the scriptures from that book

$query = "SELECT * FROM item WHERE item_type = (SELECT baked_good_id FROM baked_good Where item_name = '" . $category . "'";

$stmt = $db->prepare($query);
//$stmt->bindValue(':book', $category, PDO::PARAM_STR);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   echo '<H3>' . $row['item_name'] . '</h3> <br>';
   echo 'item_description';
   echo 'Price: $' . ($row['price'] / 100.0) . '<br> <hr>';
}
?>

<form action="KKitchen.php" method="POST" >
   <br/>
   <input type="submit" value="back">
</form>