<?php
require 'ConnectToDB.php';
$conn = ConnectTODB::getConnection();
session_start();
$i_id = $_GET['i_id'];
$sid = $_SESSION['user_id'];

$queryHolds = "insert into holds( student_id, item_id) values( $sid, $i_id )
                
                ";

$resultHolds = $conn->query($queryHolds);

$queryUpdate = "UPDATE libraryitem SET itemState = 'onHold' where item_id = $i_id ";

$resultUpdate = $conn->query($queryUpdate);

if($resultHolds && $resultUpdate){
    echo "<script>alert('Item put on hold');</script>";
    echo '<script>document.location = "s_profile.php";</script>';
}
else{
    echo "<script>alert('Try Again Later!!!');</script>";
    echo '<script>document.location = "s_profile.php";</script>';
}
  
?>