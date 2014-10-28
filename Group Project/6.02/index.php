<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Session support
session_start();

// Password functions
require_once('password.php');

// Connect to database
require_once('dbConnection.php');
$db = loadDB();

// Get Action
$action = getVariable("action");

switch (strtolower($action)) {
   case "CreateUser":
      // TO DO: CHRIS
      // TO DO: Add code to create new user
      // Get hash for the password
      // Insert the username/hash
      $success = FALSE;
      $newName = getVariable("name");
      $newPass = getVariable("pass");
      $checkPass = getVariable("check");
      if (is_null($newName) || 
          is_null($newPass) || 
          is_null($checkPass) || 
          $newPass != $checkPass) {
         var_dump($newName);
         var_dump($checkPass);
         var_dump($newPass);
         echo "Error in creation.";
      } else {
         $query = "SELECT *
           FROM     user
           WHERE    user_name = :" . $newName;
         
         $stmt = $db->prepare($query);
         $stmt->execute();
         //There can only be one.
         if($stmt->rowCount() == 0){
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $success = insertUser($newName, $passwordHash);
         } else {
            echo "A record already existed, please enter a new username";
         }
         
      }
      // IF SUCCESSFUL, show welcome page
      if ($success) {   // For now, just assume it worked
         // Set session variable
         // Show welcome page
         include('views/welcomePage.php');
      } else {
         // (re)show sign up form
         include('views/createUserForm.php');
      }
      break;
   case "login":
      // Get username/password from form
      $username = getVariable("name");
      $password = getVariable("password");

      // Get password hash, using BCRYPT
      $passwordHash = password_hash($password, PASSWORD_BCRYPT);

      // Check if credentials are valid
      if (getCredentialsAreValid($username, $passwordHash)) {
         // TO DO: Set username session variable
         // Show welcome page
         include('views/welcomePage.php');
      }
      // Otherwise, show login form
      else {
         include('views/loginForm.php');
      }
      break;
   case "signup":
      include('views/createUserForm.php');
      break;
   default:
      // Check if user is already logged in
      if (getUserIsLoggedIn()) {
         // Show welcome page
         include('views/welcomePage.php');
      }
      // Otherwise, show login form
      else {
         include('views/loginForm.php');
      }
      break;
}

// TO DO: Create a function that returns true if the specified username and
// password hash are valid; otherwise, false;
function getCredentialsAreValid($username, $passwordHash) {
   global $db;

   // Query String
   $query = "
            SELECT *
            FROM     user
            WHERE    user_name = :username";

   try {
      $statement = $db->prepare($query);
      $statement->bindValue(':username', $username);
      $statement->execute();
      $result = $statement->fetch();
      $statement->closeCursor();
      // If user doesn't exist, return false
      if (empty($result))
         return false;

      return ($result['password'] == $passwordHash);
   } catch (PDOException $ex) {
      echo $ex->getMessage();
      exit;
   }
}

// TO DO: Create a function that returns true if a valid user is logged in;
// otherwise, false.
function getUserIsLoggedIn() {

   // For now, just return false
   return false;
}

// Gets a passed variable
function getVariable($variableName) {
   if (isset($_GET[$variableName])) {
      $return = $_GET[$variableName];
   } elseif (isset($_POST[$variableName])) {
      $return = $_POST[$variableName];
   } else {
      return NULL;
   }

   return $return;
}

function insertUser($username, $hash) {

   global $db;
//$db = loadDB();

   $query = $db->prepare('INSERT INTO users_db.user (user_name, password) VALUES (:username, :hash)');

   $array = array(
       'username' => $username,
       'hash' => $hash
   );

   return $query->execute($array);
}

?>