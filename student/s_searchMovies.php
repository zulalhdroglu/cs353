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

<style><?php include 'design.css'; ?></style>

<?php


echo '<h1> MOVIES  </h1>';



$query = "SELECT *
          FROM all_movies
          ";


$result = $conn->query($query) or die('Error in query: ' . $conn->error);

$table = '<table>';
$table .= '<tr> <th>Title</th><th>Director </th> <th>Duration</th> <th>Genre</th><th>Borrow Movie</th><th>Hold Movie</th>';
$count = mysqli_num_rows($result);


while ($row = $result->fetch_assoc()) {
    $table .= '<tr>';
    $aid = $row['title'];
    $table .= '<td>' . $aid . '</td>';
    $yid = $row['director_name'];
    $table .= '<td>' . $yid . '</td>';
    $tid = $row['duration'];
    $table .= '<td>' . $tid . '</td>';
    $did = $row['genre'];
    $table .= '<td>' . $did . '</td>';
    $iid = $row['item_id'];
    $table .= '<td>' . "<a href='borrowbook.php?i_id=$iid' ><button type ='submit'  class = 'button0'>Borrow</button></a>";
    $table .= '<td>' . "<a href='holdbook.php?i_id=$iid'><button type ='submit'  class = 'button1'>Hold</button></a>";
    $table .= '</td> </tr>';
}
$table .= '</table>';
echo $table;

if($count == 0){
    echo "Oops there is no movies in the library...";
}


?>