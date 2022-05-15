<?php
require 'ConnectToDB.php';
$conn = ConnectTODB::getConnection();
session_start();
$mm_number = $_GET['mm_number'];
$sid = $_SESSION['user_id'];

$queryHolds = "insert into uses( mm_number, s_id) values( $mm_number, $sid )
                
                ";

$resultHolds = $conn->query($queryHolds);

$queryUpdate = "update multimediaroom set availability = 'notAvailable' where mm_number = $mm_number";

$resultUpdate = $conn->query($queryUpdate);

if($resultHolds && $resultUpdate){
    echo "<script>alert('Room is rented');</script>";
    echo '<script>document.location = "s_profile.php";</script>';
}
else{
    echo "<script>alert('Try Again Later!!!');</script>";
    echo '<script>document.location = "s_profile.php";</script>';
}
  
?>