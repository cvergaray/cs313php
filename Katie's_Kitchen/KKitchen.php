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
   <body>
      <h1>Katie's Kitchen</h1>
      <form action="results.php" method="POST" >
         Product Type: <select name="category">

            <?php
            try {
               echo 'entering PHP section <br>';
               // Start the session
               echo 'Starting Session <br>';
               session_start();
               echo 'Including DBCONNECTION <br>';
               include 'dbConnection.php';
               echo 'Loading DB <br>';
               $db = loadDB();
               echo 'Setting up query <br>';
               $stmt = $db->query("SELECT * FROM baked_goods");
               echo 'Ececuting Query <br>';
               $stmt->execute();

               while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                 echo 'Running a row <br>';

                  echo '<option value="' . $row['item_name'] . '">' . $row['item_name'] . ' </option>' . "<br>";
               }
            } catch (PDOException $ex) {
               echo "Error connecting to DB. Details: $ex";
               die();
            }
            ?>
         </select>
         <br/><br/>

         <input type="submit" value="Submit">
      </form>

   </body>
</html>
