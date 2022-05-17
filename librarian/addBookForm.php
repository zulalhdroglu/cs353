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
    <h1>ADD BOOK TO SYSTEM</h1>
    <div id='register'>
    <form method='post' onsubmit='return validateForm();' action='addBookToSystem.php'>
        Title:<br>
        <input type='text' id='title' name='title' required><br>
        Genre:<br>
        <input type='text' id='genre' name='genre' required><br>
        Item State:<br>
        <input type='text' id='itemState' name='itemState' required><br>
        Author:<br>
        <input type='text' id='author' name='author' required><br>
        Publish Year:<br>
        <input type='text' id='publishYear' name='publishYear' required><br>
        <button type='submit'>Add Book</button>
        </form>
    </div id='register'>
     </body>
    <script>
    $(function(){
    $("#nav-placeholder").load("navbar.html");
    });
</script>
</html>