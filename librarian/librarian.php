<style><?php include '../design.css'; ?></style>
<!doctype html>
<?php
require '../ConnectToDB.php';
session_start();
$conn = ConnectToDB::getConnection();

$userId = $_SESSION['userId'];
$query = " SELECT U.user_id, U.username, U.email
            FROM user AS U
            WHERE U.user_id ='$userId'";
$result = $conn->query($query) or die('Error in query: ' . $conn->error);
$row = $result->fetch_assoc();

?>
<html>
<html>
    <head>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>Home</title>
    <h1> WELCOME  </h1>

    <div class="card">
    <img src="profile.png" alt="John" style="width:10%" class="center">
 <div> 
  <h7> <b>username:</b> <?php echo $row['username']; ?> </h1>
  </div>
  <div> 
  <h7> <b>email:</b> <?php echo $row['email']; ?></h1>
  </div>
  <div> 
  <h7> <b>id:</b> <?php echo $row['user_id']; ?> </h1>
  </div>

</div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style type="text/css">
        
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ffffff;
         }
         h2{
            text-align: center;
            color: #017572;
         }
         .vertical-center {
       margin: 0;
      position: absolute;
      top: 60%;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
}
         .container{
            text-align: center;  
width: 300px;  
height: 150px;  
padding-top: 50px;  
         }

          .container div{
             display: flex;
             align-items: center;
             margin: 20px;
             width: 100%;
         }
   
    </style>
<div class="container">
  <div class="vertical-center">
    <button onclick="location.href='viewLibraryItems.php'" type="button">View Library Items</button>
  </div>
  <div>
    <button onclick="location.href='viewUsers.php'" type="button">View Users </button>
  </div>
  </div>
</div>
    </head>
    <div id="nav-placeholder">
    </div>
    <script>
    $(function(){
    $("#nav-placeholder").load("navbar.html");
    });
    </script>

</html>
