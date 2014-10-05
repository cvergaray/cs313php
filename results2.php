<?php
// Start the session
session_start();
?>


<?php
// Set session variables
if (!isset($_SESSION["name"]) $_SESSION["name"] = "";
if (!isset($_SESSION["major"]) $_SESSION["major"] = "";
if (!isset($_SESSION["website"]) $_SESSION["website"] = "";
if (!isset($_SESSION["comment"]) $_SESSION["comment"] = "";
if (!isset($_SESSION["gender"]) $_SESSION["gender"] = "";
echo "Session variables are set.";
?>

<html>
<body>

<?php 
echo "Name: " .  $_SESSION["name"] . "<br/>"

echo "Major: " . $_SESSION["major"] . "<br/>";

echo "Show: " . $_SESSION["website"] . "<br/>";

echo "Comment: " . $_SESSION["comment"] . "<br/>"

echo "Gender: " .  $_SESSION["gender"];
?>

</body>
</html>