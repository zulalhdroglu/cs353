<?php
require 'ConnectToDB.php';
session_start();
$conn = ConnectToDB::getConnection();

// Get the form variables
$userId = strtolower($_POST['username']);
$password = $_POST['password'];

$query = "SELECT COUNT(*) AS count
          FROM user
          WHERE LOWER(user_id) = '$userId' AND password = '$password'";

$result = $conn->query($query) or die('Error in query: ' . $conn->error);
$data = $result->fetch_assoc();

if ($data['count'] > 0) {
    
    $_SESSION['user_id'] = $userId;
    $query2 = "SELECT COUNT(*) AS count 
               FROM librarian
               WHERE user_id = $userId ";
    $result = $conn ->query($query2) or  die('Error in query: ' . $conn->error);
    $data = $result->fetch_assoc();

    $query3 = "SELECT COUNT(*) AS count 
               FROM student
               WHERE user_id = $userId ";
    $result3 = $conn ->query($query3) or  die('Error in query: ' . $conn->error);
    $data3 = $result3->fetch_assoc();

    if($data3['count'] > 0 ){
        header('Location: student/student.php');
    }
    else if ($data['count'] > 0) {
    header('Location: librarian/librarian.php');
    }
    
} else {
    echo '<script>alert("Login failed, wrong credentials.");';
    echo 'document.location = "index.php";</script>';
}
$conn->close();
?>