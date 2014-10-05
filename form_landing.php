<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <?php
    $action = "none";
    
    // Get Vars
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["action"]))
                $action = $_POST["action"];
        }
        elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["action"]))
                $action = $_GET["action"];
        }
        
    //$name = $email = $major = $comments = "";
    //$nameErr = $emailErr = $majorErr = "";
    $places = array();
    
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
        // Check for/get Email from form
        if (empty($_POST["email"])) {
            $emailErr = "*Email is required";
        } else {
            $email = cleanInput($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "*Invalid email format";
            }
        }
        // Check for/get Major from form
        if (empty($_POST["major"])) {
            $majorErr = "*Major is required";
        } else {
            $major = cleanInput($_POST["major"]);
        }
        // Check for/get 'places'
        if (empty($_POST["places"])) {
            $places = array();
        } else {
            $places = $_POST['places'];
        }
        // Get Comments from form
        $comments = cleanInput($_POST["comments"]);
    }    
    
    ?>
    
    <body>
        <?php
            switch ($action)
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