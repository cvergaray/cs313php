
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
} catch (PDOException $ex) {
   echo "Error connecting to DB. Details: $ex";
   die();
}
?>