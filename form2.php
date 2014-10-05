<?php
// Start the session
session_start();
?>
<html>
<body>

<?php
// Set session variables
$_SESSION["name"] = "green";
$_SESSION["email"] = "cat";
echo "Session variables are set.";
?>

Name: <input type="text" name="name" value="<?php echo $_SESSION["name"];?>">

E-mail: <input type="text" name="email" value="<?php echo $_SESSION["email"];?>">

Website: <input type="text" name="website" value="<?php echo $_SESSION["website"];?>">

Comment: <textarea name="comment" rows="5" cols="40"><?php echo $_SESSION["comment"];?></textarea>

Gender:
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male


</body>
</html>