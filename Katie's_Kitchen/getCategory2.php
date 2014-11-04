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

   while ($headrow = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<a href="KKitchen_results.php?category=' . $headrow['item_name'] . '">' . $headrow['item_name'] .'</a> &nbsp;';
   }
   echo '<br><a href="cart.php">View Cart </a>&nbsp;&nbsp;';
   
   if($_SESSION['authenticated']){
      echo "Welcome {$_SESSION['currentUser']}!";      
      echo '&nbsp;&nbsp;<a href="kk_login.php?action=logout">Sign Out</a>';
   }   
   else
   {
      echo '<a href="kk_login.php"> Login </a>';
   }
  echo '</header>';
} catch (PDOException $ex) {
   echo "Error connecting to DB. Details: $ex";
   //die();
}
