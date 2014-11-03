<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Session support
session_start();

include 'KKHead.php';

// Password functions
require_once('password.php');

// Connect to database
require_once('dbConnection.php');
$db = loadDB();

// Get Action
$action = getVariable("action");

switch (strtolower($action)) {
   // Create a new user account
   case "createuser":
      phpAlert("Creating user");
      // Get username/password from form
      $newName = getVariable("name");
      $newPass = getVariable("pass");
      $fname = getVariable("fname");
      $mname = getVariable("mname");
      $lname = getVariable("lname");

      // Attempt to add new user
      $passwordHash = password_hash($newPass, PASSWORD_BCRYPT);
      $success = insertUser($newName, $passwordHash, $fname, $mname, $lname);

      // IF SUCCESSFUL, show welcome page
      if ($success) {
         // Login User
         loginUser($newName);

         $username = $newName;

         // Show welcome page
         phpAlert("now loading welcome page");
         include('welcomePage.php');
         phpAlert("loaded");
      } else {
         phpAlert("Trying to load query");
         // See if desired username was already taken
         $query = "SELECT * FROM system_user WHERE user_name = '" . $newName . "'";
         $stmt = $db->prepare($query);
         $stmt->execute();
         //There can only be one.
         if ($stmt->rowCount() == 0) {
            // Not an existing user, must have been some other error
            $message = "There was a problem creating the account. Please try again.";
         } else {
            $message = "That username already exists, please choose a new one.";
         }
         
         phpAlert($message);
         
         // (re)show sign up form
         include('createUserForm.php');
      }
      break;

   // Login using the specified credentials
   case "login":
      phpAlert("Trying to log in.");
      // Get username/password from form
      $username = getVariable("username");
      $password = getVariable("password");

      // Check if credentials are valid
      if (getCredentialsAreValid($username, $password)) {
         phpAlert("Credentials are valid!");
         // "Log the user in" / store session variable
         loginUser($username);
         // Show welcome page
         include('welcomePage.php');
      }
      // Otherwise, show login form
      else {
         $message = "Invalid username or password";
         phpAlert($message);
         include('loginForm.php');
      }
      break;

   // Logout    
   case "logout":
      phpAlert("Logging out");
      logoutUser();
      include('loginForm.php');
      break;

   // Show the Sign-up form
   case "signup":
      phpAlert("signing up new user");
      include('createUserForm.php');
      break;

   // No action specified / show welcome page if logged in; otherwise, show
   // sign-in page
   default:
      // Check if user is already logged in
      if (getUserIsLoggedIn()) {
         // Get current user's username
         $username = getCurrentUser();
         // Show welcome page
         phpAlert("Loading welcome page");
         include('welcomePage.php');
      }
      // Otherwise, show login form
      else {
         phpAlert("Loading login form");
         include('loginForm.php');
      }
      break;
}

// Checks whether the specified username and password are valid
function getCredentialsAreValid($username, $password) {
   global $db;

   phpAlert("building query string");
   // Query String
   $query = "SELECT * FROM system_user WHERE system_user_name = '$username';";

   phpAlert("query string is: " . $query);
   
   try {
      $statement = $db->prepare($query);
      $statement->execute();
      $result = $statement->fetch();
      $statement->closeCursor();
      // If user doesn't exist, return false
      if (empty($result))
         return false;

      phpAlert("Account exists, verifying password");
      // Validate using password_verify()
      return (password_verify($password, $result['system_user_password']));
   } catch (PDOException $ex) {
      echo $ex->getMessage();
      exit;
   }
}

// Gets the currently logged in username
function getCurrentUser() {
   if (isset($_SESSION["currentUser"]))
      return $_SESSION["currentUser"];
   // Else
   return false;
}

// Logs in the specified user
function loginUser($username) {
   $_SESSION["currentUser"] = $username;
   $_SESSION['authenticated'] = TRUE;
}

// Logs out the current user
function logoutUser() {
   unset($_SESSION["currentUser"]);
   $_SESSION['authenticated'] = FALSE;
}

// Gets whether a user is currently signed in or not
function getUserIsLoggedIn() {
   // Check session variable
   if (isset($_SESSION["currentUser"]))
      return true;

   // else
   return false;
}

// Gets a passed variable from a form or the URL
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

// Attempts to add a new user to the database
function insertUser($username, $hash, $fName, $mName, $lName) {
   global $db;

   $query = $db->prepare("INSERT INTO katie_db.system_user (`system_user_id` , " .
           "`system_user_name` , `system_user_password` , `is_administrator` , " .
           "`first_name` , `middle_name` , `last_name` , `creation_date`) VALUES " . 
           "( NULL,  '$username',  '$hash',  '0',  '$fName',  '$mName',  '$lName',  UTC_DATE());");

   return $query->execute();
}

?>

<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>