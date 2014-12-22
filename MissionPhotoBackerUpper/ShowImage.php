<?php
include 'dbConnection.php';
$db = loadDB();

if ($_GET['id'] === NULL) {
   echo 'error!';    
} else {
   $id = $_GET['id'];
   $newQuery = ("SELECT * FROM image WHERE image_id = " . $id);
   $newStmt = $db->prepare($newQuery);
   $newStmt->execute();

   while ($newRow = $newStmt->fetch(PDO::FETCH_ASSOC)) {
      $imageData = $newRow["image_data"];
   }
   header("content-type: image/jpeg");
   echo $imageData;
}
?>


