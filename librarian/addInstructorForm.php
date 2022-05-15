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
    <form method='post' onsubmit='return validateForm();' action='addInstructorToSystem.php'>
        User Name:<br>
        <input type='text' id='usernameInput' name='username' required><br>
        Email:<br>
        <input type='text' id='emailInput' name='email' required><br>
        Password:<br>
        <input type='text' id='passwordInput' name='password' required><br>
        <label for = "phone">Phone No :</label><br>
        <input type='tel' id='phoneInput' name='phone' placeholder="5xxxxxxxxx" pattern = "[5]{1}[0-9]{2}[0-9]{7}" required><br>
        Department:<br>
        <input type='text' id='departmentInput' name='department' required><br>
        Office:<br>
        <input type='text' id='officeInput' name='office' required><br>
        Salary:<br>
        <input type='text' id='salaryInput' name='salary' required><br>
        Fax:<br>
        <input type='text' id='faxInput' name='fax' required><br>
        <button type='submit'>Register Instructor</button>
        </form>
    </div id='register'>
    </body>
    <script>
    $(function(){
    $("#nav-placeholder").load("navbar.html");
    });
</script>
</html>