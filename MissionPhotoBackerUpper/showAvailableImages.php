<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dbConnection.php';
$db = loadDB();

$newQuery = ("SELECT id, name FROM image");
$newStmt = $db->prepare($newQuery);
$newStmt->execute();

echo $newStmt->rowCount();

while ($newRow = $newStmt->fetch(PDO::FETCH_ASSOC)) {
   echo $newRow["id"] + " : " + $newRow["name"];
}
?>


