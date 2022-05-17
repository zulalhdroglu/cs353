<style><?php include '../design.css'; ?></style>
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
        <label  for ="userType">User:</label>
        <select name="userType">
            <option value = "student">Student</option> 
            <option value = "instructor">Instructor</option>  
        </select> 
     <div>
        <button type="submit">Select</button>
    </div>

    </form>
<?php
require '../ConnectToDB.php';
session_start();
$conn = ConnectToDB::getConnection();
if (isset($_POST['userType']))  {
    $userType = $_POST["userType"];
     $_SESSION['userType'] = $userType;
    switch ($userType) {
        case 'student':
                $query = "SELECT student.user_id,user.username, user.email,student.department,student.warningCount
                    FROM user 
                    RIGHT JOIN student 
                    ON user.user_id= student.user_id;";
                $result = $conn->query($query) or die('Error in query: ' . $conn->error);
                $table1 = '<table>';
                $table1 .= '<tr> <th>User ID</th> <th>User Name </th> <th>Email </th><th>Department</th><th>Warning Count</th>';
                $table1 .= '<th>View Profile</th> </tr>';
                while ($row = $result->fetch_assoc()) {
                    $table1 .= '<tr>';
                    $userid = $row['user_id'];
                    $table1 .= '<td>' . $userid . '</td>';
                    $table1 .= '<td>' . $row['username'] . '</td>';
                    $table1 .= '<td>' . $row['email'] . '</td>';
                    $table1 .= '<td>' . $row['department'] . '</td>';
                    $table1 .= '<td>' . $row['warningCount'] . '</td>';
                    $table1 .= '<td>' . "<a href='viewProfile.php?userid=$userid'><button>View</button></a>";
                    $table1 .= '</td> </tr>';
                }
                $table1 .= '</table>';
                echo $table1;
                break;
        case 'instructor':
            $query = "SELECT instructor.user_id,user.username, user.email,instructor.department
                      FROM user 
                      RIGHT JOIN instructor 
                      ON user.user_id= instructor.user_id;";
            $result = $conn->query($query) or die('Error in query: ' . $conn->error);
            $table1 = '<table>';
            $table1 .= '<tr> <th>User ID</th> <th>User Name </th> <th>Email </th><th>Department</th>';
            $table1 .= '<th>View Profile</th> </tr>';
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
