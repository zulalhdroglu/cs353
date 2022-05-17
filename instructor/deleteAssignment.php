<?php
require 'ConnectToDB.php';
$conn = ConnectTODB::getConnection();
session_start();
$assignment_id = $_GET['assignment_id'];
$item_id = $_GET['item_id'];
$sid = $_GET['s_id'];
$iid = $_SESSION['user_id'];

$query1 = "delete from assign
                where student_id = $sid AND instructor_id = $iid AND assignment_id = $assignment_id
                
                ";
$query2 = "delete from contain
                where item_id = $item_id AND assignment_id = $assignment_id";

$result1 = $conn->query($query1);
$result2 = $conn->query($query2);

if($result1 && $result2){
    echo "<script>alert('Assignment is deleted.');</script>";
    echo '<script>document.location = "i_profile.php";</script>';
}
else{
    echo "<script>alert('Try Again Later!!!');</script>";
    echo '<script>document.location = "i_profile.php";</script>';
}
 
?>


