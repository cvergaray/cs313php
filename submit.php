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
        Shows you like:<br>

        <?php
          if(!empty($_POST["TOS"]))
             $_SESSION["Shows"] .= "The Original Series ";
          if(!empty($_POST["TAS"]))
             $_SESSION["Shows"] .= "The Animated Series ";
          if(!empty($_POST["TNG"]))
             $_SESSION["Shows"] .= "The Next Generation ";
          if(!empty($_POST["DS9"]))
             $_SESSION["Shows"] .= "Deep Space 9 ";          
          if(!empty($_POST["VOY"]))
             $_SESSION["Shows"] .= "Voyager ";
          if(!empty($_POST["ENT"]))
             $_SESSION["Shows"] .= "Enterprise ";             
          echo($_SESSION["shows"][$i] . "<br>");
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
	 $txt = "Shows you like: " . $_SESSION["shows"]  . " <br> " . PHP_EOL;
	 fwrite($myfile, $txt);
	 $txt = "Here is why: " . $_POST["resons"]  . " <br> " . PHP_EOL;
	 fwrite($myfile, $txt);
	 $txt = "</p> </div> <br>  <hr>  <br> " . PHP_EOL; 
	 fwrite($myfile, $txt);
	 
	 fclose($myfile);

	 ?>
      <div>
	<div id="section">
	  <h1>Your response has been recorded!</h1>
	  <br/>
	  <a href="http://php-cvergara.rhcloud.com/results.php">See all Results!</a>
	</div>
      </div>
    </body>
  </html>
