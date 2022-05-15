<style><?php include '../design.css'; ?></style>
<!doctype html>
<html>
    <head>
    <script src="//code.jquery.com/jquery.min.js"></script>
    </head>
    <div id="nav-placeholder">
    </div>
    <script>
    $(function(){
    $("#nav-placeholder").load("navbar.html");
    });
    </script>
<?php
require '../ConnectToDB.php';
session_start();
$conn = ConnectToDB::getConnection();
$user_id= $_GET['user_id'];
echo "$user_id";
?>
</html>
