<!DOCTYPE html>
<html>
<?php
    // Handle vars
    if (!isset($name)) $name="";
    if (!isset($nameErr)) $nameErr = "";
    if (!isset($email)) $email = "";
    if (!isset($emailErr)) $emailErr = "";
    if (!isset($major)) $major = "";
    if (!isset($majorErr)) $majorErr = "";
    if (!isset($places)) $places = array();
    if (!isset($comments)) $comments = "";
?> 

    <body>
    <h1>2.02 Team Readiness Project</h1>
    <h2>CS 313</h2>
    <h3>Details</h3>
        Name: <?php echo $name; ?><br><br>
        Your email address is: <a href="mailto:<?=$email?>"><?php echo $email; ?></a><br><br>
        Major: <?php echo $major; ?><br><br>
        Places you have visited:<br> 

        <?php
          if(empty($places)) 
          {
            echo("You haven't been anywhere.");
          } 
          else
          {
            $count = count($places);

            for($i=0; $i < $count; $i++)
            {
              echo($places[$i] . "<BR>");
            }
          }
          ?><br>
        Comments: <?=$comments ?><br>
  </body>
</html>