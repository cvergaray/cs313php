<?php
echo 'including file';
include 'dbConnection.php';
echo ' included';
$db = loadDB();
echo ' db loaded';

if ($_GET['id'] === NULL) {
   echo 'error!';    
} else {
   echo ' is set';
   $id = $_GET['id'];
   echo (' id= ' . $id);
   var_dump($id);
   $newQuery = ("SELECT * FROM image WHERE image_id = " . $id);
   var_dump($newQuery);
   $newStmt = $db->prepare($newQuery);
   $newStmt->execute();

   while ($newRow = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $imageData = $newRow["image_data"];
      var_dump($imageData);
   }
   header("content-type: image/jpeg");
   echo $imageData;
}
?>


