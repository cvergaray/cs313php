<?php
// Start the session
session_start();

echo '<h1>New Scripture Entry</h1>';

	//Connect to the database
	include 'dbConnection.php';
	$db = loadDB();
	
	//Get topics
	$topics = $db->query("SELECT * FROM baked_good");

	//Make form
	echo '<form action="" method="POST" >
		Item Name: <input name="book"><br><br>
		Price: <input name="verse"><br><br>
		Item Description: <textarea name="content" rows="5" cols="40"></textarea><br><br>';
	echo 'Topic(s):<br>';
	
	//Make checkboxes
	while($row = $topics->fetch(PDO::FETCH_ASSOC)) 
		{
			echo '<input type="checkbox" name="topics[]" value=' . $row['baked_good_id'] . '>' . $row['item_name'] . '<br>';
		}
	
	//Make other checkbox
	echo '<input type="checkbox" name="topics[]" value="NULL">Other <input name="New"><br><br>';
			
	echo '<br><input type="submit" value="Submit">
	</form>'; 
	
	echo '<h1>Entered Scriptures</h1>';
	
	//Get and display current scriptures
	$scriptures = $db->query("SELECT * FROM item");
	
		while($row = $scriptures->fetch(PDO::FETCH_ASSOC)) 
		{
			echo '<strong>' . $row['item_name'] . ' </strong>' .' - "'. $row['item_description'] . '"' . "<br>";
		}
?>
