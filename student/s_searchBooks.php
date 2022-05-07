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

<style><?php include 'design.css'; ?></style>

<?php
require 'ConnectToDB.php';
$conn = ConnectToDB::getConnection();

session_start();
$sid = $_SESSION['user_id'];

echo '<h1> BOOKS  </h1>';



$query = "SELECT title, item_id, author, p_year
          FROM libraryitem NATURAL JOIN book
          WHERE itemState = 'returned'
          ";


$result = $conn->query($query) or die('Error in query: ' . $conn->error);

$table = '<table>';
$table .= '<tr> <th>Author</th><th>Year </th> <th>Title</th>';
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
    $table .= '<td>' . "<a href='borrowbook.php?i_id=$iid' ><button type ='submit'>Borrow</button></a>";
    $table .= '<td>' . "<a href='holdbook.php?i_id=$iid'><button type ='submit'>Hold</button></a>";
    $table .= '</td> </tr>';
}
$table .= '</table>';
echo $table;

if($count == 0){
    echo "Oops there is no books in the library...";
}









?>