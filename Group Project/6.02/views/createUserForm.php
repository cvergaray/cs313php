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
      <form action = "." method="POST">
         <table style="width:100%">
            <tr>
               <td>Username: <input name="name"><br></td>
            </tr>
            <tr>
               <td>Password: <input type="password" name="pass"><br></td>
            </tr>
            <tr>
               <td>Re-enter Password: <input type="password" name="check"><br></td>
            </tr>
            <tr>
               <td><input type="hidden" name="action" value="CreateUser">
                  <input type="submit" value="Create"></td>
            </tr>
         </table>
      </form>
   </body>
</html>
