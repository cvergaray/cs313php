<?php
include 'dbConnection.php';

if(issset($_GET['id']))
{
   $id = mysql_real_escape_string($_GET['id']);
   var_dump($id);
   $newQuery = $db->query("SELECT * FROM image WHERE image_id = $id");
   $newQuery->execute();

   while ($newRow = $newQuery->fetch(PDO::FETCH_ASSOC)) {
      $imageData = $row["image_data"];
      var_dump($imageData);
   }
   header("content-type: image/jpeg");
   echo $imageData;
}
else
{
   echo "error!";
}
?>


