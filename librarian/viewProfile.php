<style><?php include '../student/design.css'; ?></style>
<!doctype html>
<?php
require '../ConnectToDB.php';
session_start();
$conn = ConnectToDB::getConnection();

$userid = $_GET['userid'];
$query = " SELECT U.user_id, U.username, U.email
            FROM user AS U
            WHERE U.user_id ='$userid'";
$result = $conn->query($query) or die('Error in query: ' . $conn->error);
$row = $result->fetch_assoc();

?>
<html>
    <head>
            <script src="//code.jquery.com/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>Home</title>
    <h1> User Profile  </h1>

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

         .container{
             display: flex;
             align-content: center;
             justify-content: center;
         }

          .container div{
             display: flex;
             align-items: center;
             margin: 20px;
             width: 100%;
         }
   
    </style>
    </head>
    <div id="nav-placeholder">
    </div>
    <script>
    $(function(){
    $("#nav-placeholder").load("navbar.html");
    });
    </script>
    <style type="text/css">

</style>
<div id="container">
<div id="left">
<?php
$queryBorrowed = "SELECT title , item_id
              FROM borrow NATURAL JOIN libraryitem
              WHERE student_id = $userid";

$resultBorrowed = $conn->query($queryBorrowed) or die('Error in query: ' . $conn->error);

/*$queryHolded = "SELECT title , item_id
              FROM holds NATURAL JOIN libraryitem
              WHERE student_id = $sid";
              */

//$resultHolded = $conn->query($queryHolded) or die('Error in query: ' . $conn->error);

$queryRented = "SELECT mm_number
              FROM uses
              WHERE s_id = $userid";

$resultRented = $conn->query($queryRented) or die('Error in query: ' . $conn->error);




$table1 = '<table>';
$table1 .= '<tr> <th>Borrowed Items</th><th>Return Borrowed Item </th>';
//<th>Holded Items </th><th>Return Holded Items </th>

$count = mysqli_num_rows($resultBorrowed);

while ($row = $resultBorrowed->fetch_assoc()) {
    $table1 .= '<tr>';
    $bid = $row['title'];
    $table1 .= '<td>' . $bid . '</td>';
    $iid = $row['item_id'];
    $table1 .= '<td>' . "<a href='returnItems.php?i_id=$iid' ><button type ='submit' class = 'buttonret'>Return</button></a>";
    $table1 .= '</td> </tr>';
}

$table1 .= '</table>';
echo $table1;
?>
</div>


<div id="right">
<?php
$table3 = '<table>';
$table3 .= '<tr> <th>Rented Rooms </th><th>Leave Room </th>';
while ($row = $resultRented->fetch_assoc()) {
    $table3 .= '<tr>';
    $rid = $row['mm_number'];
    $table3 .= '<td>' . $rid . '</td>';
    $table3 .= '<td>' . "<a href='leaveRoom.php?mm_number=$rid' ><button type ='submit' class = 'buttonrel'>Leave</button></a>";
    $table3 .= '</td> </tr>';
}
$table3 .= '</table>';
echo $table3;
?>
</div>

<div>
<?php
$usertype = $_SESSION['userType'];
if($usertype == 'student'){
    $queryWarning = "SELECT user_id, warningCount
                    FROM student
                    WHERE user_id = $userid";
    $queryWarning = $conn->query($queryWarning) or die('Error in query: ' . $conn->error);

    $table4 = '<table>';
    $table4 .= '<tr> <th>User ID</th><th>Warning Count </th>';
    while ($row = $resultRented->fetch_assoc()) {
        $table4 .= '<tr>';
        $userid = $row['user_id'];
        $table4 .= '<td>' . $rid . '</td>';
        $table4 .= '<td>' . $row['user_id']. '</td>';
        $table4 .= '</td> </tr>';
    }
    $table4 .= '</table>';
    echo $table4;
    echo "<a href='warn.php?userid=$userid'><button>Warn Student</button></a>";
}
?>
</div>
</div>
</html>
