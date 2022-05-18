<?php
require 'ConnectToDB.php';
$conn = ConnectTODB::getConnection();
session_start();
$i_id = $_GET['i_id'];
$sid = $_SESSION['user_id'];

$queryCount = "SELECT warningCount
               FROM student
               WHERE user_id = $sid
";

$resultCount = $conn->query($queryCount) or die('Error in query: ' . $conn->error);
$rowCount = $resultCount->fetch_assoc();
$warcount = $rowCount['warningCount'];
echo $warcount;

if( $warcount >= 3){
    echo "<script>alert('You cannot borrow new items since your warning count reached 3. Try again later.');</script>";
    echo '<script>document.location = "s_searchBooks.php";</script>';
}

else{
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
  
}
?>