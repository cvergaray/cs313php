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
      </div>
      
      <?php
	 //Please vote only once
         $_SESSION["assign2_voted"] = "true";
	 print_r($_SESSION);
		      
         $info = array();
         $info = file("datatxt");
		      
         $info[$_POST['q1']] += 1;
         $info[$_POST['q2']] += 1;
         $info[$_POST['q3']] += 1;
         $info[$_POST['q4']] += 1;
											    
         $string = "";
											    
	 for($i=0; $i < 10; $i++)
	 {
	 $string .= (int)$info[$i]. PHP_EOL;
	 }
	 //echo $string;
	 file_put_contents("datatxt", $string);
	 ?>
      <div>
	<div id="section">
	  <h1>Your response has been recorded!</h1>
	  <br/>
	  <a href="http://php-cvergara.rhcloud.com/results.php">See the Results!</a>
	</div>
      </div>
    </body>
  </html>
