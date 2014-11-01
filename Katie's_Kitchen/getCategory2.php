<?php

try {
//   echo '<form action="KKitchen_results.php" method="POST" >';
   echo '<header>';

   // Start the session           
   session_start();
   include 'dbConnection.php';
   $db = loadDB();
   $stmt = $db->query("SELECT * FROM baked_good");
   $stmt->execute();

   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

      echo '<a href="KKitchen_results.php?category=' . $row['item_name'] . '">' . $row['item_name'] .'</a> &nbsp;';
   }
   echo '</header>';
} catch (PDOException $ex) {
   echo "Error connecting to DB. Details: $ex";
   die();
}
?>