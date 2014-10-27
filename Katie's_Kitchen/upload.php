<?php
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

//Connect to the database
include 'dbConnection.php';
$db = loadDB();


$query = "INSERT INTO image (image_id, image_name, image_data ) ".
"VALUES (NULL, '$fileName', '$content')";
$query = $db->prepare($query);
$query->execute();

echo "<br>File $fileName uploaded<br>";
} 
?>