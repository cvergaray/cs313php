<?php

if (isset($_POST['upload']) && $_FILES['userfile']['size'] > 0 && isset($_POST['item_name']) && isset($_POST['item_price']) && isset($_POST['item_description']) && isset($_POST['category'])) {
   $fileName = $_FILES['userfile']['name'];
   $tmpName = $_FILES['userfile']['tmp_name'];
   $fileSize = $_FILES['userfile']['size'];
   $fileType = $_FILES['userfile']['type'];

   $fp = fopen($tmpName, 'r');
   $content = fread($fp, filesize($tmpName));
   $content = addslashes($content);
   fclose($fp);

   if (!get_magic_quotes_gpc()) {
      $fileName = addslashes($fileName);
   }

//Connect to the database
   include 'dbConnection.php';
   $db = loadDB();


   $query = "INSERT INTO image (image_id, image_name, image_data, creation_date ) " .
           "VALUES (NULL, '$fileName', '$content', UTC_DATE())";
   $query = $db->prepare($query);
   $query->execute();

   $modifiedPrice = $_POST['item_price'] * 100;

   var_dump($_POST);
   var_dump($modifiedPrice);
   var_dump($fileName);
   $query = "INSERT INTO item (item_id, item_type, item_name, item_description," .
           " item_price, item_picture, creation_date) " .
           "VALUES(NULL, '" .
           $_POST['category'] .
           "', '" . $_POST['item_name'] .
           "', " . $_POST['item_description'] .
           "', " . $modifiedPrice .
           "', (SELECT image_id FROM image WHERE image_name = '$fileName')" .
           ", UTC_DATE());";

   $query = $db->prepare($query);
   $query->execute();
   var_dump($query->errorInfo());

   echo "<br>File $fileName uploaded<br>";
} else {
   echo "<br>Please fill out entire form and include image<br>";
}
?>