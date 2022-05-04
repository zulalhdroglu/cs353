<style><?php include 'design.css'; ?></style>
<?php
// Destroy any previous session
session_start();
session_unset();
session_destroy();
?>

<!doctype html>
<html>
    <head>
        <meta charset='utf-8'/>
        <link rel='stylesheet' type='text/css'
              href='http://fonts.googleapis.com/css?family=Spectral'>
        <title>SCHOOL LIBRARY SYSTEM</title>
    </head>
    <body>
    <h1>SCHOOL LIBRARY SYSTEM</h1>
    <div id='login'>
    <form method='post' onsubmit='return validateForm();' action='login.php'>
        User ID:<br>
        <input type='text' id='usernameInput' name='username' required><br>
        Password:<br>
        <input type='password' id='passwordInput' name='password' required><br>
        <button type='submit'>Login</button>
        </form>
    </div id='login'>
    </body>
</html>