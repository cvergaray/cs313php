<?php
include 'dbConnection.php';
$db = loadDB();

if ($_GET['id'] === NULL) {
   echo 'error!';    
} else {
   $id = $_GET['id'];
   $newQuery = ("SELECT * FROM image WHERE image_id = " . $id);
   var_dump($newQuery);
   $newStmt = $db->prepare($newQuery);
   $newStmt->execute();

   while ($newRow = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo 'found a row!';
      $imageData = $newRow["image_data"];
      var_dump($imageData);
   }
   header("content-type: image/jpeg");
   echo $imageData;
}
?>


