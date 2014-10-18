<?php
	session_start();
	include 'dbConnection.php';
	echo '<h1>Scripture Resources</h1>';
	$db = loadDB();
	$category = $_POST['book'];
	//Display all scriptures
	if ($category == 'any')
	{
		$stmt = $db->query("SELECT * FROM scriptures");
		
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
			echo '<strong>' . $row['book'].' '.$row['chapter'] . ':' . $row['verse'] . '</strong>' .' - "'. $row['content'] . '"' . "<br>";
		}
	}
	//Else display the scriptures from that book
	else
	{
		$stmt = $db->prepare("SELECT * FROM scriptures WHERE book=:book");
		$stmt->bindValue(':book', $category , PDO::PARAM_STR);
		$stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
			echo '<strong>' . $row['book'].' '.$row['chapter'] . ':' . $row['verse'] . '</strong>' .' - "'. $row['content'] . '"' . "<br>";
		}
	}
?>

<form action="scriptures.php" method="POST" >
	<br/>
    <input type="submit" value="back">
</form>
