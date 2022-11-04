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
        else if($_SESSION['roll'] != 'cpd head'){
            ?>
            <script>
                alert('You have no permission to access this page');
                <?php
                    if($_SESSION['roll'] == 'vice president'){
                        echo "window.location = '../vice_president'";
                    }
                    else if($_SESSION['roll'] == 'president'){
                        echo "window.location = '../president'";
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
                <a href="new_event.php"><button type="button" class="btn btn-success" style="margin-right: 10px;">Create Event</button></a>
                <a href="logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
            </div>
        </nav>
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="profile.php">Profile</a>
            <a href="index.php">Members</a>
            <a href="attendance.php">Attendance</a>
            <a href="event.php">Events</a>
            <a href="registration.php">Registration</a>
        </div>

        <div class="event">
            <br>
            <h3>Create Event</h3>
            <form action="save_new_event.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Event title</label>
                        <input type="text" class="form-control" name="title" placeholder="Event title..." required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Last Name</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <legend class="col-form-label">Visible For</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visible" value="any" checked>Any User
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visible" value="cpd">CPD Only
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <textarea name="description" style="width: 100%; height:200px;" placeholder="Some description about the event..."></textarea>
                    </div>
                </div>
                <input type="submit" class="btn btn-success" name="submit" value="Create">
            </form>        

        </div>
    </div>
    
    <script src="../js/president.js"></script>
</body>
</html>