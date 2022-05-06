
<?php
require 'ConnectToDB.php';
$conn = ConnectToDB::getConnection();

session_start();
$sid = $_SESSION['user_id'];

$query = "SELECT U.user_id, U.username, U.email
          FROM user as U
          WHERE U.user_id = '$sid' ";

$result = $conn->query($query) or die('Error in query: ' . $conn->error);



$row = $result->fetch_assoc()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>

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
    </style>
</head>
<body>
<div class="container">

<style type="text/css">


    </style>
        <h2 class="welcome_text" > My Profile </h2>
        
    

    

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="card">
<img src="profile.png" alt="John" style="width:10%">
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








