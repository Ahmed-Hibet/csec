
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-4/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/president.css">
    <title>CSEC-Executive Commitee</title>
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
        $sql = "SELECT * FROM `users` WHERE roll = 'president' OR roll = 'vice president' OR roll = 'cpd head' OR roll = 'cbd head' OR roll = 'dd head';";
        $executive = $conn->query($sql);
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
                <a href="add_executive.php"><button type="button" class="btn btn-success" style="margin-right: 10px;">Add Executive</button></a>
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
            <a href="executive_commitee.php">Manage Executive Commitee</a>
        </div>
        <div>
            <br>
            <h3>Executive Commitees</h3>
            <?php
                if($executive->num_rows == 0){
                    echo "There is no executive commitee yet.";
                }
                else{
                    ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">ID</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Education</th>
                                <th scope="col">Department</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Roll</th>
                                <th scope="col">Remove From Executive</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                 while($row=mysqli_fetch_assoc($executive)){
                                     echo "<tr>";
                                     echo "<td>".$row['firstName']." ".$row['lastName']."</td>";
                                     echo "<td>".$row['id']."</td>";
                                     echo "<td>".$row['gender']."</td>";
                                     echo "<td>".$row['academicYear']." year ".$row['education']."</td>";
                                     echo "<td>".$row['department']."</td>";
                                     echo "<td>".$row['email']."</td>";
                                     echo "<td>".$row['phone']."</td>";
                                     echo "<td>".$row['roll']."</td>";
                                     echo " <td>"; ?>
                                        <form action="remove_executive.php" method="get">
                                            <input type="hidden" value="<?php echo $row['roll']; ?>" name="roll">
                                            <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                            <input type="submit" value="Remove" class="btn btn-danger" name="remove">
                                        </form>
                                    <?php echo "</td>";
                                     echo "</tr>";
                                 }
                            ?>
                        </tbody>
                    </table>
                    <?php
                }
            ?>
        </div>
    </div>
    
    <script src="../js/president.js"></script>
</body>
</html>