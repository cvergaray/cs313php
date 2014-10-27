<?php
echo 'including file';
include 'dbConnection.php';
echo ' included';
$db = loadDB();
echo ' db loaded';

if (issset($_GET['id'])) {
   echo ' is set';
   $id = mysql_real_escape_string($_GET['id']);
   var_dump($id);
   $newQuery = "SELECT * FROM image WHERE image_id = " . $id;
   var_dump($newQuery);
   $newStmt = $db->prepare($newQuery);
   var_dump($newStmt);
   $newStmt->execute();
   var_dump($newStmt);

   while ($newRow = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $imageData = $newRow["image_data"];
      var_dump($imageData);
   }
   header("content-type: image/jpeg");
   echo $imageData;
} else {
   echo 'error!';
}
?>


