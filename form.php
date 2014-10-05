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
  
  <h1>Star Trek Survey</h1>
  <h2>CS 313</h2>
  
  <div>
    <form action = "." method="POST" id = "form">
      <table>
        <tr>
          <td>
            Name: 
          </td>
          <td>
            <input type = "text" size = "60" name = "name" value="<?=$name ?>"/> <?= $nameErr?>
          </td>
        </tr>
        <tr>
          <td>
            Major: 
          </td>
          <td>
            <input type = "text" size = "60" name = "major" value="<?=$major ?>"/> <?= $majorErr?>
          </td>
        </tr>
        <tr>
          <td>
            <p>Do you like Star Trek?</p>
          </td>
          <td>
            <input type = "radio" name = "radioButtons" value = "peor"   
		   <?php if (isset($_SESSION["preference"]) && $_SESSION["preference"]=="peor")  echo "checked";?> > Not at all </input>
            
	    <input type = "radio" name = "radioButtons" value = "mal"    
		   <?php if (isset($_SESSION["preference"]) && $_SESSION["preference"]=="mal")   echo "checked";?> > Not really </input>
            
	    <input type = "radio" name = "radioButtons" value = "bueno"  
		   <?php if (isset($_SESSION["preference"]) && $_SESSION["preference"]=="bueno") echo "checked";?> > Kinda </input>
            
	    <input type = "radio" name = "radioButtons" value = "mejor"  
		   <?php if (isset($_SESSION["preference"]) && $_SESSION["preference"]=="mejor") echo "checked";?> > Oh Yeah! </input>
          </td>
        </tr>
      </table>
      
      <p>Which Star Trek series do you like? &nbsp
        <input type = "checkbox" name = "TOS" value = "tos" <?php if (in_array("tos", $_SESSION["shows"])) echo "checked"; ?> > TOS </input>
        <input type = "checkbox" name = "TAS" value = "tas" <?php if (in_array("tas", $_SESSION["shows"])) echo "checked"; ?> > TAS </input>
        <input type = "checkbox" name = "TNG" value = "tns" <?php if (in_array("tng", $_SESSION["shows"])) echo "checked"; ?> > TNG </input>
        <input type = "checkbox" name = "DS9" value = "ds9" <?php if (in_array("ds9", $_SESSION["shows"])) echo "checked"; ?> > DS9 </input>
        <input type = "checkbox" name = "VOY" value = "voy" <?php if (in_array("voy", $_SESSION["shows"])) echo "checked"; ?> > VOY </input>
        <input type = "checkbox" name = "ENT" value = "ent" <?php if (in_array("ent", $_SESSION["shows"])) echo "checked"; ?> > ENT </input>
      </p>
      
      <p>
        <label>
          <textarea name = "Reasons"  
                    rows = "5"  
                    cols = "90"
                    placeholder = "Please explain why you do or do not like Star Trek here">
	    <?=_SESSION["reasons"]?>
          </textarea> 
        </label>
      </p>
      
      <br/>
      <input type = "submit" value = "Submit Form"/>
      <input type = "reset"  value = "Clear Form"/>        
      <input type = "hidden" value = "submit" name = "action"
             <br/>
             <br/>
    </form>
    <hr/><br/>
  </div>
