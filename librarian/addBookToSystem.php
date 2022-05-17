<?php
require '../ConnectToDB.php';
session_start();
$conn = ConnectToDB::getConnection();

$title = $_POST['title'];
$genre = $_POST['genre'];
$itemState = $_POST['itemState'];

$author = $_POST['itemState'];
$publishYear = $_POST['publishYear'];

$query = "INSERT INTO libraryItem(title, genre, itemState)
         values ('$title', '$genre','$itemState')";
$result = $conn->query($query) or die('Error in query: ' . $conn->error);
$query2 = "SELECT item_id 
           FROM libraryitem 
           WHERE title = '$title' AND genre = '$genre' AND itemState = '$itemState'";
$result2 = $conn->query($query2) or die('Error in query: ' . $conn->error);
$row = $result2->fetch_assoc();
$item_id = $row["item_id"];

$query3 = "INSERT INTO book(item_id, author, p_year) values($item_id, '$author', '$publishYear')";
$result3 = $conn->query($query3) or die('Error in query: ' . $conn->error);
echo "<script>alert('Instructor Successfully Added To The System');</script>";
header('Location:addBookForm.php');
$conn->close();
?>