<?php
// Start the session
session_start();
?>
<html>
<body>

<?php
// Set session variables
$_SESSION["name"] = "";
$_SESSION["major"] = "";
$_SESSION["website"] = "";
$_SESSION["comment"] = "";
$_SESSION["gender"] = "";
echo "Session variables are set.";
?>

<form method="POST" action="writeFile();">

Name: <input type="text" name="name" value="<?php echo $_SESSION["name"];?>">
<br/>

Major: <input type="text" name="email" value="<?php echo $_SESSION["major"];?>">
<br/>

Show: <input type="text" name="website" value="<?php echo $_SESSION["website"];?>">
<br/>

Comment: <textarea name="comment" rows="5" cols="40"><?php echo $_SESSION["comment"];?></textarea>
<br/>

Gender:
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male

   <input type="submit" name="submit" value="Submit"> 
</form>

<?php function writeFile() {
$myfile = fopen("surveyResults.txt", "w") or die("Unable to open file!");
fwrite($myfile, $_SESSION["name"]);
fwrite($myfile, $_SESSION["major"]);
fwrite($myfile, $_SESSION["website"]);
fwrite($myfile, $_SESSION["comment"]);
fwrite($myfile, $_SESSION["gender"]);
fclose($myfile);
header("results2.php");
exit();
}
?>

</body>
</html>