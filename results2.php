<?php
// Start the session
session_start();
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