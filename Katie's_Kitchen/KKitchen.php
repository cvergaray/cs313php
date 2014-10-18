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
            // Start the session
            session_start();
            include 'dbConnection.php';
            $db = loadDB();

            $stmt = $db->query("SELECT * FROM baked_goods");

            echo '<div>';

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               echo '<option value="' . $row['item_name'] . '">' . $row['item_name'] . ' </option>' . "<br>";
            }
            ?>
         </select>
         <br/><br/>

         <input type="submit" value="Submit">
      </form>

   </body>
</html>
