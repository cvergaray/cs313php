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
        <h1>Login</h1>
        <h2>Exising User</h2>
        <form method="POST">
            <label>Username:</label><input type="text" name="name"><br>
            <label>Password:</label><input type="password" name="pass"><br>
            <input type="hidden" name="action" value="Login">
            <input type="submit" value="Login">
        </form>
        <h2>New User?</h2>
        <a href="?action=SignUp">Create a New Account</a>
    </body>
</html>
