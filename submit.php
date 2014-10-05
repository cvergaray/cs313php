<?php
   session_start();
   ?>

<html>
  <head>
    <meta charset="UTF-8">
      <title>Response Recorded</title>
    </head>		   
    <body>
      <div>
	<h1>Star Trek Survey</h1>
        <h2>CS 313</h2>
      </div>

        Name: <?php echo $_POST["name"]; ?><br><br>
        Major: <?php echo $_POST["major"]; ?><br><br>
        Shows you like: <br> <br>

        <?php
          if(!empty($_POST["TOS"]))
             $_SESSION["shows"] .= "The Original Series " . " <br> ";
          if(!empty($_POST["TAS"]))
             $_SESSION["shows"] .= "The Animated Series " . " <br> ";
          if(!empty($_POST["TNG"]))
             $_SESSION["shows"] .= "The Next Generation " . " <br> ";
          if(!empty($_POST["DS9"]))
             $_SESSION["shows"] .= "Deep Space 9 " . " <br> ";          
          if(!empty($_POST["VOY"]))
             $_SESSION["shows"] .= "Voyager " . " <br> ";
          if(!empty($_POST["ENT"]))
             $_SESSION["shows"] .= "Enterprise " . " <br> ";             
          echo($_SESSION["shows"] . "<br>");
          ?><br>
        This is why: <?=$_POST["reasons"] ?><br>
      
      <?php
	 //Please vote only once
         $_SESSION["assign2_voted"] = "true";
	 //print_r($_SESSION);

	 $myfile = fopen("oldresults.txt", "a");
	 
	 $txt = "<div> <p> Name: " . $_POST["name"] . " <br> " . PHP_EOL;
	 fwrite($myfile, $txt);
	 $txt = "Major: " . $_POST["major"]  . " <br> " . PHP_EOL;
	 fwrite($myfile, $txt);
	 $txt = "Shows you like: <br> " . $_SESSION["shows"]  . " <br> " . PHP_EOL;
	 fwrite($myfile, $txt);
	 $txt = "Here is why: " . $_POST["reasons"]  . " <br> " . PHP_EOL;
	 fwrite($myfile, $txt);
	 $txt = "</p> </div> <br>  <hr>  <br> " . PHP_EOL; 
	 fwrite($myfile, $txt);
	 
	 fclose($myfile);

	 ?>
      <div>
	<div>
	  <br/>
	  <a href="http://php-cvergara.rhcloud.com/results.php">See all Results!</a>
	</div>
      </div>
    </body>
  </html>
