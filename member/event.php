<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-4/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/president.css">
    <title>CSEC-Events</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['id'])){
            header("Location: ../login.php");
        }
        else if($_SESSION['roll'] != 'member'){
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
                    else if($_SESSION['roll'] == 'president'){
                        echo "window.location = '../president'";
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

        <div class="profile">
            <br>
            <h3>Recent Events</h3>
            <?php
                include 'db_connection.php';
                $userId = $_SESSION['id'];
                $sql = "SELECT CPD, CBD, DD FROM `users` WHERE id = '$userId'";
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                $cpdMember = $row['CPD'];
                $cbdMember = $row['CBD'];
                $ddMember = $row['DD'];
                $sql = "SELECT * FROM `events`;";
                $result = $conn->query($sql);
                if($result->num_rows == 0){
                    echo "There is no events";
                }
                else{
                    ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Event Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM `events` WHERE visibleFor = 'any' OR visibleFor = 'all';";
                                $result = $conn->query($sql);
                                 while($row=mysqli_fetch_assoc($result)){
                                     echo "<tr>";
                                     echo "<td>".$row['title']."</td>";
                                     echo "<td>".$row['description']."</td>";
                                     echo "<td>".$row['dates']."</td>";
                                     echo "</tr>";
                                 }
                                 if($cpdMember == 'yes'){
                                    $sql = "SELECT * FROM `events` WHERE visibleFor = 'cpd';";
                                    $result = $conn->query($sql);
                                     while($row=mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        echo "<td>".$row['title']."</td>";
                                        echo "<td>".$row['description']."</td>";
                                        echo "<td>".$row['dates']."</td>";
                                        echo "</tr>";
                                     }
                                 }
                                 if($cbdMember == 'yes'){
                                    $sql = "SELECT * FROM `events` WHERE visibleFor = 'cbd';";
                                    $result = $conn->query($sql);
                                     while($row=mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        echo "<td>".$row['title']."</td>";
                                        echo "<td>".$row['description']."</td>";
                                        echo "<td>".$row['dates']."</td>";
                                        echo "</tr>";
                                     }
                                 }
                                 if($ddMember == 'yes'){
                                    $sql = "SELECT * FROM `events` WHERE visibleFor = 'dd';";
                                    $result = $conn->query($sql);
                                     while($row=mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        echo "<td>".$row['title']."</td>";
                                        echo "<td>".$row['description']."</td>";
                                        echo "<td>".$row['dates']."</td>";
                                        echo "</tr>";
                                     }
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