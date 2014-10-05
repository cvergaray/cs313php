<?php
// Start the session
session_start();
?>
<html>
<body>

Name: <? php echo $_SESSION["name"];?>
<br/>

Major:<?php echo $_SESSION["major"];?>">
<br/>

Show: <?php echo $_SESSION["website"];?>">
<br/>

Comment: <?php echo $_SESSION["comment"];?>
<br/>

Gender: <?php echo $_SESSION["gender"];?>

</body>
</html>