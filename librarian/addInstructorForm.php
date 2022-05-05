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
    <h1>ADD INSTRUCTOR TO SYSTEM</h1>
    <div id='register'>
    <form method='post' onsubmit='return validateForm();' action='addStudenttoSystem.php'>
        User Name:<br>
        <input type='text' id='usernameInput' name='username' required><br>
        Email:<br>
        <input type='text' id='emailInput' name='email' required><br>
        Password:<br>
        <input type='text' id='passwordInput' name='password' required><br>
        Phone No :<br>
        <input type='number' id='phoneInput' name='phone' required><br>
        Department:<br>
        <input type='text' id='departmentInput' name='department' required><br>
        Office:<br>
        <input type='text' id='officeInput' name='office' required><br>
        Salary:<br>
        <input type='text' id='salaryInput' name='salary' required><br>
        Fax:<br>
        <input type='text' id='faxInput' name='fax' required><br>
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