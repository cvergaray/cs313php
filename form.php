<?php	
   session_start();
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Star Trek Survey</title>
  </head>

  <body>  
    <h1>Star Trek Survey</h1>
    <h2>CS 313</h2>

    <?php 
    $_SESSION["assign2_voted"] = "false";
    print_r($_SESSION);
    ?>

    <div>
      <form action = "submit.php" method="POST">
	<table>
          <tr>
            <td>
              Name: 
            </td>
            <td>
              <input type = "text" size = "60" name = "name"/>
            </td>
          </tr>
          <tr>
            <td>
              Major: 
            </td>
            <td>
              <input type = "text" size = "60" name = "major"/>
            </td>
          </tr>
          <tr>
            <td>
              <p>Do you like Star Trek?</p>
            </td>
            <td>
              <input type = "radio" name = "radioButtons" value = "1"> Not at all </input>              
	      <input type = "radio" name = "radioButtons" value = "2"> Not really </input>              
	      <input type = "radio" name = "radioButtons" value = "3"> Kinda </input>              
	      <input type = "radio" name = "radioButtons" value = "4"> Oh Yeah! </input>
            </td>
          </tr>
	</table>
	
	<p>Which Star Trek series do you like? &nbsp
          <input type = "checkbox" name = "TOS" value = "tos"> TOS </input>
          <input type = "checkbox" name = "TAS" value = "tas"> TAS </input>
          <input type = "checkbox" name = "TNG" value = "tns"> TNG </input>
          <input type = "checkbox" name = "DS9" value = "ds9"> DS9 </input>
          <input type = "checkbox" name = "VOY" value = "voy"> VOY </input>
          <input type = "checkbox" name = "ENT" value = "ent"> ENT </input>
	</p>
	
	<p>
          <label>
            <textarea name = "reasons"  
                      rows = "5"  
                      cols = "90"
                      placeholder = "Please explain why you do or do not like Star Trek here"></textarea> 
          </label>
	</p>
	
	<br/>
	<input type = "submit" value = "Submit Form"/>
      </form>
      <hr/><br/>

        <?php
        function cleanInput($input) {
          $input = trim($input);
          $input = stripslashes($input);
          $input = htmlspecialchars($input);
          return $input;
        }
        ?>

    </div>
  </body>
</html>
