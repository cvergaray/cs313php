<?php

var_dump($_GET);

include dbConnection . php;

$db = loadDB();

if (issset($_GET['id'])) {
   $id = mysql_real_escape_string($_GET['id']);
   var_dump($id);
   $newQuery = "SELECT * FROM image WHERE image_id = " . $id;
   $newStmt = $db->prepare($newQuery);
   $newStmt->execute();

   while ($newRow = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $imageData = $newRow["image_data"];
      var_dump($imageData);
   }
   header("content-type: image/jpeg");
   echo $imageData;
} else {
   echo "error!";
}
?>


