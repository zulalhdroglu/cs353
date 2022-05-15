<style><?php include '../design.css'; ?></style>
<!doctype html>
<html>
    <head>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <link rel='stylesheet' type='text/css'
              href='http://fonts.googleapis.com/css?family=Spectral'>
    </head>
    <div id="nav-placeholder">
    </div>
    <body>
    <h1>ADD STUDENT TO SYSTEM</h1>
    <div id='register'>
    <form method='post' onsubmit='return validateForm();' action='addStudentToSystem.php'>
        User Name:<br>
        <input type='text' id='usernameInput' name='username' required><br>
        Email:<br>
        <input type='text' id='emailInput' name='email' required><br>
        Password:<br>
        <input type='text' id='passwordInput' name='password' required><br>
        <label for = "phone">Phone No :</label><br>
        <input type='tel' id='phoneInput' name='phone' placeholder="5xxxxxxxxx" pattern = "[5]{1}[0-9]{2}[0-9]{7}" required><br>
        Warning Count :<br>
        <input type='number' id='warningInput' name='warning' required min= '0' max ="3"><br>
        Department:<br>
        <input type='text' id='departmentInput' name='department' required><br>
        CGPA:<br>
        <input type='text' id='cgpaInput' name='cgpa' required><br>
        <button type='submit'>Register Student</button>
        </form>
    </div id='register'>
    </body>
    <script>
    $(function(){
    $("#nav-placeholder").load("navbar.html");
    });
</script>
</html>