<?php
require 'ConnectToDB.php';
$conn = ConnectTODB::getConnection();
session_start();
$mm_number = $_GET['mm_number'];
$sid = $_SESSION['user_id'];

$queryReturn = "delete from uses
                where mm_number = $mm_number AND s_id = $sid
                
                ";

$resultReturn = $conn->query($queryReturn);

$query= "UPDATE multimediaroom SET availability = 'available' where mm_number = $mm_number ";

$result = $conn->query($query);

if($resultReturn && $result){
    echo "<script>alert('You left the room');</script>";
    echo '<script>document.location = "s_profile.php";</script>';
}
else{
    echo "<script>alert('Try Again Later!!!');</script>";
    echo '<script>document.location = "s_profile.php";</script>';
}
  
?>