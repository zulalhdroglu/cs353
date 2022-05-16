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

        <button type="submit">Search</button>
    </div>
    </form>
    <?php 
    if (isset($_POST['search']))  {
        $search = $_POST["search"];
        $query = "SELECT item_id, title,genre,itemState
                 FROM libraryItem 
                WHERE title LIKE '%$search%'";
        $result = $conn->query($query) or die('Error in query: ' . $conn->error);
        $table1 = '<table>';
        $table1 .= '<tr> <th>Item ID </th> <th>Item Name </th> <th>Catagory </th><th>State</th>';
        $table1 .= '<th>View Item Page</th> </tr>';
        while ($row = $result->fetch_assoc()) {
            $table1 .= '<tr>';
            $itemid = $row['item_id'];
            $table1 .= '<td>' . $itemid . '</td>';
            $table1 .= '<td>' . $row['title'] . '</td>';
            $table1 .= '<td>' . $row['genre'] . '</td>';
            $table1 .= '<td>' . $row['itemState'] . '</td>';
            $table1 .= '<td>' . "<a href='viewProfile.php?itemid=$itemid'><button>View</button></a>";
            $table1 .= '</td> </tr>';
        }
        $table1 .= '</table>';
        echo $table1;
    }
    ?>

    </html>
