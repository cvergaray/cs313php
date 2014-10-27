<?php
// Start the session
session_start();

echo '<h1>New Product Entry</h1>';

//Connect to the database
include 'dbConnection.php';
$db = loadDB();

//Get topics
$topics = $db->query("SELECT * FROM baked_good");

//Make form
?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
   Item Name: <input name="item_name"><br><br>
   Price: <input name="item_price"><br><br>
   Item Description: <textarea name="item_description" rows="5" cols="40"></textarea><br><br>
   <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
   <input name="userfile" type="file" id="userfile"> 
   <br>Category:<br>
   <?php
//Make checkboxes
   while ($row = $topics->fetch(PDO::FETCH_ASSOC)) {
      echo '<input type="radio" name="category" value=' . $row['baked_good_id'] . '>' . $row['item_name'] . '<br>';
   }

//Make other checkbox
   echo '<input type="radio" name="category" value="NULL">New <input name="New"><br><br>';

   echo '<br><input name="upload" type="submit" class="box" id="upload" value=" Upload ">
	</form>';
   ?>
