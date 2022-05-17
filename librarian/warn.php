<?php
require '../ConnectToDB.php';
session_start();
$conn = ConnectToDB::getConnection();

// Get the form variables
$userid = $_GET['userid'];

$query = "SELECT warningCount
          FROM student
          WHERE user_id = $userid";

$result = $conn->query($query) or die('Error in query: ' . $conn->error);
$data = $result->fetch_assoc();
$numberOfWarnings = $data ["warningCount"];

if ($numberOfWarnings >= 3 ) {
    echo '<script>alert(Max Number Of Warning Count);';
    echo "document.location.href='viewProfile.php?userid=$userid';</script>";
}else{
    $queryUpdate = "UPDATE student
                    SET warningCount = $numberOfWarnings +1
                    WHERE user_id =$userid";
    $queryUpdate = $conn->query($queryUpdate) or die('Error in query: ' . $conn->error);
    echo "<script>alert('Warning Count Has Been Updated');";
    echo "document.location.href='viewProfile.php?userid=$userid';</script>";
}
    

$conn->close();
?>