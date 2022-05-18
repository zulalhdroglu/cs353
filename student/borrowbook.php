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
echo $i_id;
$queryInsert = "insert into borrow(librarian_id, item_id, student_id, date) values(1, $i_id, $sid, '07052022')
                
                ";

$resultInsert = $conn->query($queryInsert);

$query3= "UPDATE libraryitem SET itemState = 'borrowed' where item_id = $i_id ";

$result3 = $conn->query($query3);

if($resultInsert && $result3){
    echo "<script>alert('Item is borrowed');</script>";
    echo '<script>document.location = "s_searchBooks.php";</script>';
}
else{
    echo "<script>alert('Try Again Later!!!');</script>";
    echo '<script>document.location = "s_searchBooks.php";</script>';
}
  
}
?>