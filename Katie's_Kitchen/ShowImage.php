<?php

var_dump($_GET);

include 'dbConnection.php';
echo "Included dbConnection.php";
console_log("Now entering loadDB()");
var_dump($db);
$db = loadDB();
var_dump($db);
echo "Loaded DB";

if (issset($_GET['id'])) {
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
   echo "error!";
}
?>


