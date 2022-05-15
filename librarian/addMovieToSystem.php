<?php
require '../ConnectToDB.php';
session_start();
$conn = ConnectToDB::getConnection();

$title = $_POST['title'];
$genre = $_POST['genre'];
$itemState = $_POST['itemState'];

$duration = $_POST['duration'];
$director = $_POST['director'];

$query = "INSERT INTO libraryItem(title, genre, itemState)
         values ('$title', '$genre','$itemState')";
$result = $conn->query($query) or die('Error in query: ' . $conn->error);
$query2 = "SELECT item_id 
           FROM libraryitem 
           WHERE title = '$title' AND genre = '$genre' AND itemState = '$itemState'";
$result2 = $conn->query($query2) or die('Error in query: ' . $conn->error);
$row = $result2->fetch_assoc();
$item_id = $row["item_id"];

$query3 = "INSERT INTO movie(item_id, duration, director_name) values($item_id, '$duration', '$director')";
$result3 = $conn->query($query3) or die('Error in query: ' . $conn->error);
header('Location:addBookForm.php');
echo "<script>alert('Instructor Successfully Added To The System');</script>";

$conn->close();
?>