<?php

if (isset($_POST['upload']) && $_FILES['userfile']['size'] > 0) {

   $file_count = count($file_post['name']);

   for ($i = 0; $i < $file_count; $i++) {
      $fileName = $_FILES['userfile']['name'][$i];
      $tmpName = $_FILES['userfile']['tmp_name'][$i];
      $fileSize = $_FILES['userfile']['size'][$i];
      $fileType = $_FILES['userfile']['type'][$i];

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

      echo "<br>File $fileName uploaded<br>";
   }

   echo '<a href="add_photo.php"> Upload Another</a>';
} else {
   echo "<br>There was an error uploading your file! Email Chris right away!<br>";
}
?>