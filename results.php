<!DOCTYPE html>
<html>

<?php
session_start();
?>

<?php
    // Handle vars
    if (!isset($_SESSION["name"])) $_SESSION["name"]="";
    if (!isset($_SESSION["nameErr"])) $_SESSION["nameErr"] = "";
    if (!isset($_SESSION["preference"])) $_SESSION["preference"] = "";
    if (!isset($_SESSION["major"])) $_SESSION["major"] = "";
    if (!isset($_SESSION["majorErr"])) $_SESSION["majorErr"] = "";
    if (!isset($_SESSION["shows"])) $_SESSION["shows"] = array();
    if (!isset($_SESSION["reasons"])) $_SESSION["reasons"] = "";
?>

    <body>
    <h1>Star Trek Survey</h1>
    <h2>CS 313</h2>
        Name: <?php echo $_SESSION["name"]; ?><br><br>
        Major: <?php echo $_SESSION["major"]; ?><br><br>
        Shows you like:<br> 

        <?php
          if(empty($_SESSION["shows"])) 
          {
            echo("You don't like any Star Trek shows.");
          } 
          else
          {
            $count = count($_SESSION["shows"]);

            for($i=0; $i < $count; $i++)
            {
              echo($_SESSION["shows"][$i] . "<BR>");
            }
          }
          ?><br>
        This is why: <?=$_SESSION["reasons"] ?><br>
  </body>
</html>
