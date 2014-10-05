<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Star Trek Survey</title>
  </head>


    <body>
    <h1>Star Trek Survey</h1>
    <h2>CS 313</h2>
        Name: <?php echo $_POST["name"]; ?><br><br>
        Major: <?php echo $_POST["major"]; ?><br><br>
        Shows you like:<br> 

        <?php
          if(empty($_POST["shows"])) 
          {
            echo("You don't like any Star Trek shows.");
          } 
          else
          {
            $count = count($_POST["shows"]);

            for($i=0; $i < $count; $i++)
            {
              echo($_POST["shows"][$i] . "<br>");
            }
          }
          ?><br>
        This is why: <?=$_POST["reasons"] ?><br>

     <?php
     echo readfile("oldresults.txt");
     ?>

  </body>
</html>
