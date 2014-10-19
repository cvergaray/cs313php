
<?php

try {
   echo '<form action="KKitchen_results.php" method="POST" >';
   echo 'Product Type: <select name="category">';

   // Start the session           
   session_start();
   include 'dbConnection.php';
   $db = loadDB();
   $stmt = $db->query("SELECT * FROM baked_good");
   $stmt->execute();

   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

      echo '<option value="' . $row['item_name'] . '">' . $row['item_name'] . '</option>' . "<br>";
   }
   echo '</select>';
   echo '<input type="submit" value="Submit"></form>';


   $query = "SELECT * FROM item WHERE item_type := (SELECT baked_good_id FROM baked_good Where item_name := 'Pies'";

   $stmt = $db->prepare($query);
//$stmt->bindValue(':book', $category, PDO::PARAM_STR);
   $stmt->execute();
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      var_dump($row);
      echo '<H3>' . $row['item_name'] . '</h3> <br>';
      echo 'item_description';
      echo 'Price: $' . ($row['price'] / 100.0) . '<br> <hr>';
   }
} catch (PDOException $ex) {
   echo "Error connecting to DB. Details: $ex";
   die();
}
?>