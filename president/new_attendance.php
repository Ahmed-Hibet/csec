
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
                    <form action="save_new_attendance.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Event Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Present</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row=mysqli_fetch_assoc($member)){
                                        echo "<tr>";
                                        echo "<td>".$row['firstName']." ".$row['lastName']."</td>";
                                        echo "<td>".$row['id']."</td>";
                                        $id = $row['id'];
                                        echo "<td> <input type='checkbox' name='$id' value='$id'>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <input type="submit" class="btn btn-primary" value="Save" name="submit">
                    </form>
                    <?php
                }
            ?>
        </div>
    </div>
    
    <script src="../js/president.js"></script>
</body>
</html>