<?php

function console_log( $data ) {
    $bt = debug_backtrace();
    $caller = array_shift($bt);

    if ( is_array( $data ) )
        error_log( end(split('/',$caller['file'])) . ':' . $caller['line'] . ' => ' . implode( ',', $data) );
    else
        error_log( end(split('/',$caller['file'])) . ':' . $caller['line'] . ' => ' . $data );

}

// calling loadDB returns a connection to the scriptures_db database.
function loadDB() {

   // Check for OpenShift environment var and connect accordingly
   $openShiftCheck = getenv('OPENSHIFT_MYSQL_DB_HOST');
   $dbName = "katie_db";
   console_log("Now entering loadDB()");
   if ($openShiftCheck === null || $openShiftCheck == "") {
      // Use OpenShift
      // Values for across domains
      $crossDomain = true;
      if ($crossDomain) {
         console_log("Going across domains?");
         $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
         $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
         $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
         $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
      } else {
         // Values for Chris's domain
         $dbHost = "http://php-cvergara.rhcloud.com";
         $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
         $dbUser = 'php@localhost';
         $dbPassword = 'php-pass-150864067';
      }
   }


   // Attempt to load database
   try {
      console_log("Trying to load data");
      $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
      console_log("returning database");
      return $db;
   } catch (PDOException $ex) {
      console_log("Caught exception" . $ex->getMessage());
      echo "Error connecting to database.<br>";
      echo "Error: " . $ex->getMessage() . "<br>";
      die();
   }
}
