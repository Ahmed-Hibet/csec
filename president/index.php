
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-4/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/president.css">
    <title>CSEC</title>
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
        $sql = "SELECT CPD FROM `users` WHERE CPD = 'yes';";
        $cpd = $conn->query($sql);
        $sql = "SELECT CBD FROM `users` WHERE CBD = 'yes';";
        $cbd = $conn->query($sql);
        $sql = "SELECT DD FROM `users` WHERE DD = 'yes';";
        $dd = $conn->query($sql);
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
            <a href="executive_commitee.php">Manage Executive Commitee</a>
        </div>
        <div class="devisions">
            <a href="cpd_list.php" class="cpd dev" style="text-decoration: none;">
                <h5>Compititive Programming Devision</h5>
                <?php echo "<h6> $cpd->num_rows </h6>"; ?>
            </a>
            <a href="cbd_list.php" class="cbd dev" style="text-decoration: none;">
                <h5>Capacity Building Devision</h5>
                <?php echo "<h6> $cbd->num_rows </h6>"; ?>
            </a>
            <a href="dd_list.php" class="dd dev" style="text-decoration: none;">
                <h5>Development Devision</h5>
                <?php echo "<h6> $dd->num_rows </h6>"; ?>
            </a>
        </div>
    </div>
    
    <script src="../js/president.js"></script>
</body>
</html>