<?php
include 'dbConnection.php';

if(issset($_GET['id']))
{
   $id = mysql_real_escape_string($_GET['id']);   
   $newQuery = $db->query("SELECT * FROM image WHERE 'id' = '$id'");
   $newQuery->execute();

   while ($newRow = $newQuery->fetch(PDO::FETCH_ASSOC)) {
      $imageData = $row["image_data"];
   }
   header("content-type: image/jpg");
   echo $imageData;
}
?>


