<?php

$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbUser = 'php';
$dbPassword = 'php-pass-150864067';
var_dump($dbHost);
var_dump($dbPassword);
var_dump($dbPort);
var_dump($dbUser);

mysql_connect($dbHost, $dbUser, $dbPassword);
mysql_select_db('katie_db');

if (issset($_GET['id'])) {
   $id = mysql_real_escape_string($_GET['id']);
   var_dump($id);
   $newQuery = mysql_query("SELECT * FROM image WHERE image_id = " . $id);

   while ($newRow = mysql_fetch_assoc($newQuery)) {
      $imageData = $row["image_data"];
      var_dump($imageData);
   }
   header("content-type: image/jpeg");
   echo $imageData;
} else {
   echo "error!";
}
?>


