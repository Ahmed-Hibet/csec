
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-4/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/president.css">
    <title>CSEC-Attendance</title>
</head>
<body>
    <?php
    session_start();


        if(!isset($_SESSION['id'])){
            header("Location: ../login.php");
        }
        else if($_SESSION['roll'] != 'president'){
            ?>
            <script>
                alert('You have no permission to access this page');
                <?php
                    if($_SESSION['roll'] == 'vice president'){
                        echo "window.location = '../vice_president'";
                    }
                    else if($_SESSION['roll'] == 'cpd head'){
                        echo "window.location = '../cpd_head'";
                    }
                    else if($_SESSION['roll'] == 'cbd head'){
                        echo "window.location = '../cbd_head'";
                    }
                    else if($_SESSION['roll'] == 'dd head'){
                        echo "window.location = '../dd_head'";
                    }
                    else if($_SESSION['roll'] == 'member'){
                        echo "window.location = '../member'";
                    }
                    else if($_SESSION['roll'] == 'not member'){
                        echo "window.location = '../user'";
                    }
                    else{
                        echo "window.location = '../login.php'";
                    }
                ?>
            </script>
            <?php
        }
        include 'db_connection.php';
        $sql = "SELECT * FROM `users` WHERE NOT roll = 'not member';";
        $member = $conn->query($sql);
    ?>
    <div id="main">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="openbtn" onclick="openNav()">&#9776;</button>
            <a class="navbar-brand" href="index.php">CSEC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <a href="new_attendance.php"><button type="button" class="btn btn-success" style="margin-right: 10px;">New Attendance</button></a>
                <a href="logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
            </div>
        </nav>
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="profile.php">Profile</a>
            <a href="index.php">Members</a>
            <a href="attendance.php">Attendance</a>
            <a href="event.php">Events</a>
            <a href="#">Registration</a>
        </div>
        <div>
            <h3>CSEC Attendance</h3>
            <?php
                if($member->num_rows == 0){
                    echo "No Member";
                }
                else{
                    ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">ID</th>
                                <th scope="col">CPD present</th>
                                <th scope="col">CBD present</th>
                                <th scope="col">DD present</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                 while($row=mysqli_fetch_assoc($member)){
                                     echo "<tr>";
                                     echo "<td>".$row['firstName']." ".$row['lastName']."</td>";
                                     echo "<td>".$row['id']."</td>";
                                     $id = $row['id'];
                                     $sql = "SELECT * FROM `attendance` WHERE division = 'cpd' AND ID = '$id';";
                                     $cpd1 = $conn->query($sql);
                                     $sql = "SELECT * FROM `attendance` WHERE division = 'cpd' AND ID = '$id' AND present = 'yes';";
                                     $cpd2 = $conn->query($sql);
                                     if($row['CPD'] == 'no'){
                                        echo "<td>Not member</td>";
                                     }
                                     else{
                                         $total = $cpd1->num_rows;
                                         $present = $cpd2->num_rows;
                                         if($total == 0){
                                            echo "<td>100% (0/0)</td>";
                                         }
                                         else if($present == 0){
                                            echo "<td>0% ($present/$total)</td>";
                                         }
                                         else{
                                            $percentile = $present / $total * 100;
                                            echo "<td>$percentile% ($present/$total)</td>";
                                         }
                                     }
                                     $sql = "SELECT * FROM `attendance` WHERE division = 'cbd' AND ID = '$id';";
                                     $cbd1 = $conn->query($sql);
                                     $sql = "SELECT * FROM `attendance` WHERE division = 'cbd' AND ID = '$id' AND present = 'yes';";
                                     $cbd2 = $conn->query($sql);
                                     if($row['CBD'] == 'no'){
                                        echo "<td>Not member</td>";
                                     }
                                     else{
                                         $total = $cbd1->num_rows;
                                         $present = $cbd2->num_rows;
                                         if($total == 0){
                                            echo "<td>100% (0/0)</td>";
                                         }
                                         else if($present == 0){
                                            echo "<td>0% ($present/$total)</td>";
                                         }
                                         else{
                                            $percentile = $present / $total * 100;
                                            echo "<td>$percentile% ($present/$total)</td>";
                                         }
                                     }
                                     $sql = "SELECT * FROM `attendance` WHERE division = 'dd' AND ID = '$id';";
                                     $dd1 = $conn->query($sql);
                                     $sql = "SELECT * FROM `attendance` WHERE division = 'dd' AND ID = '$id' AND present = 'yes';";
                                     $dd2 = $conn->query($sql);
                                     if($row['DD'] == 'no'){
                                        echo "<td>Not member</td>";
                                     }
                                     else{
                                         $total = $dd1->num_rows;
                                         $present = $dd2->num_rows;
                                         if($total == 0){
                                            echo "<td>100% (0/0)</td>";
                                         }
                                         else if($present == 0){
                                            echo "<td>0% ($present/$total)</td>";
                                         }
                                         else{
                                            $percentile = $present / $total * 100;
                                            echo "<td>$percentile% ($present/$total)</td>";
                                         }
                                     }
                                     echo "</tr>";
                                 }
                            ?>
                        </tbody>
                    </table>
                    <a href="reset_attendance.php"><button type="button" class="btn btn-danger">Reset</button></a>
                    <?php
                }
            ?>
        </div>
    </div>
    
    <script src="../js/president.js"></script>
</body>
</html>