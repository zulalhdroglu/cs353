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
  $("#nav-placeholder").load("stubar.html");
});
</script>

<style><?php include 'design.css'; ?></style>
<?php

echo '<h1> MULTIMEDIA ROOM  </h1>';

$query = "SELECT mm_number, availability
          FROM multimediaroom
          
          ";

$result = $conn->query($query) or die('Error in query: ' . $conn->error);

$table = '<table>';
$table .= '<tr> <th>Multimedia Rooms</th><th> Rent Room </th>';
$count = mysqli_num_rows($result);


if($count > 0){

    $queryCheck = "SELECT mm_number, s_id
              FROM uses
              WHERE s_id = $sid
    
    ";
    $resultCheck = $conn->query($queryCheck) or die('Error in query: ' . $conn->error);
    $rowCheck = $resultCheck->fetch_assoc();

    echo "You can only rent 1 room at a time. ";
    echo "You already rented room ", $rowCheck['mm_number'], ".";



  }

else{

while ($row = $result->fetch_assoc()) {
  $table .= '<tr>';
  $mid = $row['mm_number'];
  $table .= '<td>' . $mid . '</td>';
  if($row['availability'] == 'available')
  $table .= '<td>' . "<a href='rentRoom.php? mm_number=$mid' ><button type ='submit'  class = 'button0' >Rent</button1></a>";
  else
  $table .= '<td>' . "<button type ='submit' disabled class = 'buttondis' >Not available</button1></a>";
  
  

  
  $table .= '</td> </tr>';
}
$table .= '</table>';
echo $table;

if($count == 0){
  echo "There is no available multi-media room in the library. Try again later...";
}
  }



?>