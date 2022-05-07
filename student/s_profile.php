
<style><?php include 'design.css'; ?></style>
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

<html>
    <head>
    <script src="//code.jquery.com/jquery.min.js"></script>
    </head>
    <div id="nav-placeholder">
    </div>

    <script>
$(function(){
  $("#nav-placeholder").load("stubar.html");
});
</script>



<style type="text/css">


    </style>
        <h2 class="welcome_text" > My Profile </h2>
     
    


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

<div class="container" style="display: flex;">
<div style="width: 50%;">
<?php
$queryBorrowed = "SELECT title , item_id
                  FROM borrow NATURAL JOIN libraryitem
                  WHERE student_id = $sid";

$resultBorrowed = $conn->query($queryBorrowed) or die('Error in query: ' . $conn->error);

$queryHolded   = "SELECT title , item_id
                  FROM holds NATURAL JOIN libraryitem
                  WHERE student_id = $sid";

$resultHolded = $conn->query($queryHolded) or die('Error in query: ' . $conn->error);

$table1 = '<table>';
$table1 .= '<tr> <th>Borrowed Items</th><th>Return Borrowed Item </th>';
//<th>Holded Items </th><th>Return Holded Items </th>

$count = mysqli_num_rows($resultBorrowed);

while ($row = $resultBorrowed->fetch_assoc()) {
    $table1 .= '<tr>';
    $bid = $row['title'];
    $table1 .= '<td>' . $bid . '</td>';
    $iid = $row['item_id'];
    $table1 .= '<td>' . "<a href='returnItems.php?i_id=$iid' ><button type ='submit'>Return</button></a>";
    $table1 .= '</td> </tr>';
}
$table1 .= '</table>';
echo $table1;
?>
</div>

<div style="flex-grow: 1;">
<?php
$table2 = '<table>';
$table2 .= '<tr> <th>Holded Items </th><th>Return Holded Items </th>';
while ($row = $resultHolded->fetch_assoc()) {
    $table2 .= '<tr>';
    $bid = $row['title'];
    $table2 .= '<td>' . $bid . '</td>';
    $iid = $row['item_id'];
    $table2 .= '<td>' . "<a href='releaseItems.php?i_id=$iid' ><button type ='submit'>Release</button></a>";
    $table2 .= '</td> </tr>';
}
$table2 .= '</table>';
echo $table2;
?>
</div>
        
</div>




  






