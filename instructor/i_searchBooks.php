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
  $("#nav-placeholder").load("instructorbar.html");
});
</script>

<style>

<?php include '../design.css'; ?></style>
<?php


echo '<h1> BOOKS  </h1>';

$query = "SELECT *
          FROM book NATURAL JOIN libraryitem
          ";


$result = $conn->query($query) or die('Error in query: ' . $conn->error);

$table = '<table>';
$table .= '<tr> <th>Author</th><th>Year </th> <th>Title</th> <th>Assign To Student</th>';
$count = mysqli_num_rows($result);


while ($row = $result->fetch_assoc()) {
    $table .= '<tr>';
    $aid = $row['author'];
    $table .= '<td>' . $aid . '</td>';
    $yid = $row['p_year'];
    $table .= '<td>' . $yid . '</td>';
    $tid = $row['title'];
    $table .= '<td>' . $tid . '</td>';
    $iid = $row['item_id'];
    
    $table .= '<td>' ."  <form action='assignBook.php?iid=$iid' method='post'>
              Student ID <input type='text' name='sid'><br>

              <input type='submit' value='Submit' >
              </form>";

}
$table .= '</table>';
echo $table;

if($count == 0){
    echo "Oops there is no books in the library...";
}






?>