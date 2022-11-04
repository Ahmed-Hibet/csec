<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-4/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/president.css">
    <title>CSEC-Profile</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['id'])){
            header("Location: ../login.php");
        }
        else if($_SESSION['roll'] != 'not member'){
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
                    else if($_SESSION['roll'] == 'member'){
                        echo "window.location = '../member'";
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
            <a href="event.php">Events</a>
            <a href="#">Registration</a>
        </div>

        <div class="edit-profile">
            <?php
                include 'db_connection.php';
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM `users` WHERE ID = '$id' LIMIT 1";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $row = mysqli_fetch_assoc($result);

                    ?>
                    <form action="validate_edit_profile.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="fname" value="<?php echo $row['firstName']; ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lname" value="<?php echo $row['lastName']; ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>ID</label>
                                <input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Year</label>
                                <input type="number" class="form-control" name="year" max = "6" min = "1" value="<?php echo $row['academicYear']; ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Phone number</label>
                                <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <legend class="col-form-label">Gender</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="Male" checked>Male
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="Female">Female
                                </div>
                            </div>
                            <div class="col-md-6">
                                <legend class="col-form-label">Education level</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="education" value="undergraduate" checked>Undergraduate
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="education" value="postgraduate">Postgraduate
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Department</label>
                                <input type="text" class="form-control" name="department" value="<?php echo $row['department']; ?>" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                    </form>
                    <?php
                }
            ?>
        </div>
    </div>
    
    <script src="../js/president.js"></script>
</body>
</html>