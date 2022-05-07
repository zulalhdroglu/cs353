<?php
require 'ConnectToDB.php';
$conn = ConnectTODB::getConnection();
session_start();
$i_id = $_GET['i_id'];
$sid = $_SESSION['user_id'];

$queryReturn = "delete from holds
                where student_id = $sid AND item_id = $i_id
                
                ";

$resultReturn = $conn->query($queryReturn);

$query= "UPDATE libraryitem SET itemState = 'returned' where item_id = $i_id ";

$result = $conn->query($query);

if($resultReturn && $result){
    echo "<script>alert('Book is released');</script>";
    echo '<script>document.location = "s_searchBooks.php";</script>';
}
else{
    echo "<script>alert('Try Again Later!!!');</script>";
    echo '<script>document.location = "s_searchBooks.php";</script>';
}
  
?>