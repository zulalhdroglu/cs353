<?php
require '../ConnectToDB.php';
session_start();
$conn = ConnectToDB::getConnection();

$username = $_POST ['username'];
$email =$_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];

$warningCount = $_POST['warning'];
$department = $_POST['department'];
$cgpa = $_POST ['cgpa'];

$query = "INSERT INTO user (username,email,password,phone_no)
            values ('$username','$email', '$password','$phone')";
$result = $conn->query($query) or die('Error in query: ' . $conn->error);
$query2 = "SELECT user_id 
           FROM user 
           WHERE email = '$email' ";
$result2 = $conn->query($query2) or die('Error in query: ' . $conn->error);
$row = $result2->fetch_assoc();
$user_id = $row["user_id"];

$query3 = "INSERT INTO student(user_id, warningCount, department, CGPA) values($user_id, $warningCount, '$department', $cgpa)";
$result3 = $conn->query($query3) or die('Error in query: ' . $conn->error);
    echo "<script>alert('Student Successfully Added To The System');</script>";
    header('Location:addStudentForm.php');
$conn->close();
?>