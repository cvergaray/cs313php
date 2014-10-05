<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Star Trek Survey</title>
    </head>
    <?php
    $_SESSION["action"] = "none";
    
    // Get Vars
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["action"]))
                $action = $_POST["action"];
        }
        elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["action"]))
                $action = $_GET["action"];
        }
        
    $_SESSION["shows"] = array();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Check for/get Name from form
        if (empty($_POST["name"])) {
            $nameErr = "*Name is required";
        } else {
            $name = cleanInput($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
            }            
        }
        // Check for/get Major from form
        if (empty($_POST["major"])) {
            $majorErr = "*Major is required";
        } else {
            $major = cleanInput($_POST["major"]);
        }
        // Check for/get 'preference'
        if (empty($_POST["preference"])) {
            $preferenceErr = "*Please Specify a preference";
        } else {
            $preferences = $_POST['places'];
        }
        // Check for/get 'shows'
        if (empty($_POST["shows"])) {
            $shows = array();
        } else {
            $shows = $_POST['places'];
        }
        // Get Comments from form
        $comments = cleanInput($_POST["comments"]);
    }    
    
    ?>
    
    <body>
        <?php

	   include "form.php";

            switch ($_SESSION["action"])
            {
                case "submit":
                    if (isset($nameErr) || isset($emailErr) || isset($majorErr))
                        include "form.php";
                    else
                        include "results.php";
                    break;
                default:
                    include "form.php";
                    break;
            }
        ?>
        
        <?php
        function cleanInput($input) {
          $input = trim($input);
          $input = stripslashes($input);
          $input = htmlspecialchars($input);
          return $input;
        }        
        ?>

    </body>
</html>
