<style><?php include '../design.css'; ?></style>
<?php
require '../ConnectToDB.php';
session_start();
$conn = ConnectToDB::getConnection();

?>
<!doctype html>
<html>
    <head>
    <script src="//code.jquery.com/jquery.min.js"></script>
    </head>
    <div id="nav-placeholder">
    </div>

    <script>
    $(function(){
    $("#nav-placeholder").load("navbar.html");
    });
    </script>

    <form action="" method="post">
    Search item by name: <br> <br>
    <input type='text' id='search' name='search' placeholder="Search Library Item" required><br>
    <div>
        <button type="submit" >Search</button>
    </div>
    </form >

    <label style= "position:relative; left:-500px; top:2px" for ="itemTYpe">Item:</label>
        <select  style= "position:relative; left:-500px; top:2px" name="itemType">
            <option value = "book">Book</option> 
            <option value = "movie">Movie</option>  
        </select> 
    <form action="" method="post">
    <div>
        <button style= "position:relative; left:-500px; top:2px" type="submit" >Search</button>
    </div>
    </form>

    <?php

$search;
if (isset($_POST['search'])) {
    $search = $_POST["search"];
    if ($search != "") {
        $query = "SELECT item_id, title,genre,itemState
                 FROM libraryItem 
                WHERE title LIKE '%$search%'";
        $result = $conn->query($query) or die('Error in query: ' . $conn->error);
        $table1 = '<table>';
        $table1 .= '<tr> <th>Item ID </th> <th>Item Name </th><th>Type </th> <th>Catagory </th><th>State</th>';
        $table1 .= '<th>View Item Page</th> <th>Delete Item</th></tr>';
        while ($row = $result->fetch_assoc()) {
            $table1 .= '<tr>';
            $itemid = $row['item_id'];
            $table1 .= '<td>' . $itemid . '</td>';
            $table1 .= '<td>' . $row['title'] . '</td>';
            $query3 = "SELECT COUNT(*) AS count 
               FROM book
               WHERE item_id = $itemid ";
            $result3 = $conn->query($query3) or die('Error in query: ' . $conn->error);
            $data3 = $result3->fetch_assoc();
            if ($data3['count'] > 0) {
                $table1 .= '<td>' . 'Book' . '</td>';
                $itemType = "Book";
            }
            else {
                $table1 .= '<td>' . "Movie" . '</td>';
                $itemType = "Movie";
            }
            
            $table1 .= '<td>' . $row['genre'] . '</td>';
            $table1 .= '<td>' . $row['itemState'] . '</td>';
            $table1 .= '<td>' . "<a href='viewItem.php?itemid=$itemid'><button>View</button></a>";
            $table1 .= '<td>' . "<a href='deleteItem.php?itemid=$itemid&&itemType=$itemType'><button>Delete</button></a>";
            $table1 .= '</td> </tr>';
        }
        $table1 .= '</table>';
        echo $table1;
    }
    else {
        $query = "SELECT item_id, title,genre,itemState
        FROM libraryItem ";
        $result = $conn->query($query) or die('Error in query: ' . $conn->error);
        $table1 = '<table>';
        $table1 .= '<tr> <th>Item ID </th> <th>Item Name </th><th>Type </th> <th>Catagory </th><th>State</th>';
        $table1 .= '<th>View Item Page</th><th>Delete Item</th> </tr>';
        while ($row = $result->fetch_assoc()) {
            $table1 .= '<tr>';
            $itemid = $row['item_id'];
            $table1 .= '<td>' . $itemid . '</td>';
            $table1 .= '<td>' . $row['title'] . '</td>';
            $query3 = "SELECT COUNT(*) AS count 
      FROM book
      WHERE item_id = $itemid ";
            $result3 = $conn->query($query3) or die('Error in query: ' . $conn->error);
            $data3 = $result3->fetch_assoc();
            if ($data3['count'] > 0) {
                $table1 .= '<td>' . 'Book' . '</td>';
            }
            else {
                $table1 .= '<td>' . "Movie" . '</td>';
            }

            $table1 .= '<td>' . $row['genre'] . '</td>';
            $table1 .= '<td>' . $row['itemState'] . '</td>';
            $table1 .= '<td>' . "<a href='viewItem.php?itemid=$itemid'><button>View</button></a>";
            $table1 .= '<td>' . "<a href='deleteItem.php?itemid=$itemid'><button>Delete Item</button></a>";
            $table1 .= '</td> </tr>';
        }
        $table1 .= '</table>';
        echo $table1;
    }
}
if (isset($_POST['itemType'])){
    $itemType = $_POST['itemType'];
    echo "$itemType";
    switch ($itemType) {
        case 'book':
                $query = "SELECT book.item_id,libraryItem.title, libraryItem.genre,libraryItem.state
                    FROM libraryItem 
                    RIGHT JOIN book 
                    ON libraryItem.item_id= book.item_id;";
                $result = $conn->query($query) or die('Error in query: ' . $conn->error);
                $table1 = '<table>';
                $table1 .= '<tr> <th>User ID</th> <th>User Name </th> <th>Email </th><th>Department</th><th>Warning Count</th>';
                $table1 .= '<th>View Profile</th><th>Delete Item</th> </tr>';
                while ($row = $result->fetch_assoc()) {
                    $table1 .= '<tr>';
                    $itemid = $row['item_id'];
                    $table1 .= '<td>' . $itemid . '</td>';
                    $table1 .= '<td>' . $row['title'] . '</td>';
                    $table1 .= '<td>' . $row['genre'] . '</td>';
                    $table1 .= '<td>' . $row['itemState'] . '</td>';
                    $table1 .= '<td>' . "<a href='viewItem.php?item=$itemid'><button>Delete Item</button></a>";
                    $table1 .= '</td> </tr>';
                }
                $table1 .= '</table>';
                echo $table1;
                break;
        case 'movie':
            $query = "SELECT instructor.user_id,user.username, user.email,instructor.department
                      FROM user 
                      RIGHT JOIN instructor 
                      ON user.user_id= instructor.user_id;";
            $result = $conn->query($query) or die('Error in query: ' . $conn->error);
            $table1 = '<table>';
            $table1 .= '<tr> <th>User ID</th> <th>User Name </th> <th>Email </th><th>Department</th>';
            $table1 .= '<th>View Profile</th> <th>Delete Item</th></tr>';
            while ($row = $result->fetch_assoc()) {
                $table1 .= '<tr>';
                $userid = $row['user_id'];
                $table1 .= '<td>' . $userid . '</td>';
                $table1 .= '<td>' . $row['username'] . '</td>';
                $table1 .= '<td>' . $row['email'] . '</td>';
                $table1 .= '<td>' . $row['department'] . '</td>';
                $table1 .= '<td>' . "<a href='viewProfile.php?userId=$userid'><button>View</button></a>";
                $table1 .= '</td> </tr>';
            }
            $table1 .= '</table>';
            echo $table1;
            break;
    }

}
?>

    </html>
