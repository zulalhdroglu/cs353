
<?php
require '../ConnectToDB.php';
$conn = ConnectToDB::getConnection();

session_start();
$id = $_SESSION['user_id'];

$query = "SELECT U.user_id, U.username, U.email
          FROM user as U
          WHERE U.user_id = '$id' ";

$result = $conn->query($query) or die('Error in query: ' . $conn->error);



$row = $result->fetch_assoc()
?>
<style><?php include '../design.css'; ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <h1> My Profile  </h1>

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
<body>

<html>
    <head>
    <script src="//code.jquery.com/jquery.min.js"></script>
    </head>
    <div id="nav-placeholder">
    </div>

    <script>
$(function(){
  $("#nav-placeholder").load("instructorbar.html");
});
</script>

<style type="text/css">


    </style>

<?php
$queryAssigned = "SELECT student_id , item_id, instructor_id, title, assignment_id
                  FROM assign NATURAL JOIN assignmentitem NATURAL JOIN contain NATURAL JOIN libraryitem 
                  WHERE instructor_id = $id
                  GROUP BY instructor_id
                  
                  ";
$resultAssigned = $conn->query($queryAssigned) or die('Error in query: ' . $conn->error);

//$resultNames = $conn->query($queryNames) or die('Error in query: ' . $conn->error);
//$row2 = $resultNames->fetch_assoc();


$table1 = '<table>';
$table1 .= '<tr> <th>Assigned Items</th><th> Student Id </th><th> Student Name </th><th> Delete Assignment </th>';

$count = mysqli_num_rows($resultAssigned);

while ($row = $resultAssigned->fetch_assoc()) {
    $table1 .= '<tr>';
    $bid = $row['title'];
    $table1 .= '<td>' . $bid . '</td>';
    $sid = $row['student_id'];
    $table1 .= '<td>' . $sid . '</td>';
    $queryName = "SELECT username
              FROM user
              WHERE user_id = $sid
             ";
   $resultName = $conn->query($queryName) or die('Error in query: ' . $conn->error);
   $rowName = $resultName->fetch_assoc();
   $item_id = $row['item_id'];
   $assignment_id = $row['assignment_id'];
   $name = $rowName['username'];
   $table1 .= '<td>' . $name . '</td>';

   $table1 .= '<td>' . "<a href='deleteAssignment.php?s_id=$sid&assignment_id=$assignment_id&item_id=$item_id' ><button type ='submit' class = 'buttonrel'>Delete</button></a>";
    
   $table1 .= '</td> </tr>';
}

$table1 .= '</table>';
echo $table1;












?>


        
</div>


