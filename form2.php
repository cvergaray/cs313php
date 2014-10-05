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

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

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

</body>
</html>