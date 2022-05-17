<?php
require '../ConnectToDB.php';
$conn = ConnectToDB::getConnection();

session_start();
$id = $_SESSION['user_id'];

$sid = $_POST['sid'];
$iid = $_GET['iid'];

echo $id;

$aid = $iid;

$sql = "select * from assignmentitem where assignment_id = $aid";
$sqlRes = $conn->query($sql);

if(mysqli_num_rows($sqlRes)){
    
$queryInsert1 = "insert into contain(item_id,assignment_id)values($iid,$aid) ";

$queryInsert2 = "insert into assign(student_id,instructor_id,assignment_id)values($sid,$id,$aid)";

$resultInsert1 = $conn->query($queryInsert1);
$resultInsert2 = $conn->query($queryInsert2);

if($resultInsert1 && $resultInsert2){
    echo "<script>alert('Item is assigned');</script>";
    echo '<script>document.location = "i_profile.php";</script>';
}
else{
    echo "<script>alert('Try Again Later!!!');</script>";
    echo '<script>document.location = "i_profile.php";</script>';
}

}
else{

    $queryInsert =  "insert into assignmentitem(assignment_id,review,date ) values($aid,'notReviewed','16052022')";
    $queryInsert1 = "insert into contain(item_id,assignment_id)values($iid,$aid) ";

    $queryInsert2 = "insert into assign(student_id,instructor_id,assignment_id)values($sid,$id,$aid)";
    
    $resultInsert = $conn->query($queryInsert);
    $resultInsert1 = $conn->query($queryInsert1);
    $resultInsert2 = $conn->query($queryInsert2);
    
    if($resultInsert1 && $resultInsert2 && $resultInsert){
        echo "<script>alert('Item is assigned');</script>";
        echo '<script>document.location = "i_profile.php";</script>';
    }
    else{
        echo "<script>alert('Try Again Later!!!');</script>";
        echo '<script>document.location = "i_profile.php";</script>';
    }




}



?>