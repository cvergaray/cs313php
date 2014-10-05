<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Star Trek Survey</title>
  </head>

     <?php
     echo readfile("oldresults.txt");
     ?>

  </body>
</html>
