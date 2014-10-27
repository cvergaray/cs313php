<?php

include dbConnection.php;

loadDB();

var_dump($_GET);

if (issset($_GET['id'])) {
   $id = mysql_real_escape_string($_GET['id']);
   var_dump($id);
   $newQuery = "SELECT * FROM image WHERE image_id = " . $id;
   $stmt = $db->prepare($newQuery);
$stmt->execute();

   while ($newRow = mysql_fetch_assoc($newQuery)) {
      $imageData = $newRow["image_data"];
      var_dump($imageData);
   }
   header("content-type: image/jpeg");
   echo $imageData;
} else {
   echo "error!";
}
?>


