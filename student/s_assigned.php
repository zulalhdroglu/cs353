<?php
require 'ConnectToDB.php';
$conn = ConnectToDB::getConnection();

session_start();
$sid = $_SESSION['user_id'];
?>
<html>
    <head>
    <script src="//code.jquery.com/jquery.min.js"></script>
    
    </head>
    <div id="nav-placeholder">
    </div>

    <script>
$(function(){
  $("#nav-placeholder").load("stubar2.html");
});
</script>

<style>

<?php include 'design.css'; ?></style>
<?php


echo '<h1> ASSIGNED ITEMS  </h1>';

$query = "SELECT item_id, instructor_id, title
          FROM assign NATURAL JOIN assignmentitem NATURAL JOIN contain NATURAL JOIN libraryitem 
          WHERE student_id = $sid                  
                  ";


$result = $conn->query($query) or die('Error in query: ' . $conn->error);

$table = '<table>';
$table .= '<tr> <th>Title </th><th> Assigned By </th>';
$count = mysqli_num_rows($result);


while ($row = $result->fetch_assoc()) {
    $table .= '<tr>';
    $tid = $row['title'];
    $table .= '<td>' . $tid . '</td>';
    $iid = $row['instructor_id'];
    
    $queryName = "SELECT username
              FROM user
              WHERE user_id = $iid
             ";
   $resultName = $conn->query($queryName) or die('Error in query: ' . $conn->error);

   $rowName = $resultName->fetch_assoc();
   $name = $rowName['username'];
   $table .= '<td>' . $name . '</td>';
   $table .= '</td> </tr>';
}

$table .= '</table>';
echo $table;
?>

