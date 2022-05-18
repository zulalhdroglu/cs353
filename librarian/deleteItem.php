<?php
require '../ConnectToDB.php';
session_start();
$conn = ConnectToDB::getConnection();

$itemid = $_GET['itemid'];
$itemType = $_GET['itemType'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Automatic Popup</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style media="screen">
    	*,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #ffb3ba;
}
.popup{
    background-color: #ffffff;
    width: 420px;
    padding: 30px 40px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
    border-radius: 8px;
    font-family: "Poppins",sans-serif;
    display: none; 
    text-align: center;
}
.popup button{
    display: block;
    margin:  0 0 20px auto;
    background-color: transparent;
    font-size: 30px;
    color: #ffffff;
		background: #03549a;
		border-radius: 100%;
		width: 40px;
		height: 40px;
    border: none;
    outline: none;
    cursor: pointer;
}
.popup h2{
	margin-top: -20px;
}
.popup p{
    font-size: 14px;
    text-align: justify;
    margin: 20px 0;
    line-height: 25px;
}
a{
    display: block;
    width: 150px;
    position: relative;
    margin: 10px auto;
    text-align: center;
    background-color: #0f72e5;
		border-radius: 20px;
    color: #ffffff;
    text-decoration: none;
    padding: 8px 0;
}
    </style>
</head>
<body>
    <div class="popup">
        <button id="close">&times;</button>
        <h2></h2>
        <p>
            Do you want to delete library item from system? 
            <?php
            if($itemType =="Book"){
                $query = "DELETE FROM book  WHERE item_id = $itemid;";
                $result = $conn->query($query) or die('Error in query: ' . $conn->error);
                $query2 ="DELETE FROM libraryItem WHERE item_id = $itemid;";
            }
            else{
                $query = "DELETE FROM movie  WHERE item_id = $itemid;";
                $result = $conn->query($query) or die('Error in query: ' . $conn->error);
                $query2 ="DELETE FROM libraryItem WHERE item_id = $itemid;";
            }
            ?>
        </p>

        <a href="viewLibraryItems.php">Yes</a>
    </div>
    <!--Script-->
    <script type="text/javascript">
window.addEventListener("load", function(){
    setTimeout(
        function open(event){
            document.querySelector(".popup").style.display = "block";
        },
    )
});

document.querySelector("#close").addEventListener("click", function(){
    document.querySelector(".popup").style.display = "none";
});
    </script>
</body>
</html>
