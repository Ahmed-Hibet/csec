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
    if(isset($_POST['submit'])){
        include 'db_connection.php';
        $sql = "SELECT id, CPD FROM `users` WHERE CPD = 'yes';";
        $member = $conn->query($sql);
        $title = $_POST['title'];
        while($row=mysqli_fetch_assoc($member)){
            $id = $row['id'];
            if(isset($_POST[$id])){
                $sql = "INSERT INTO `attendance` (ID, eventTitle, division, present) VALUES('$id', '$title', 'cpd', 'yes')";
                $result = $conn->query($sql);
            }
            else{
                $sql = "INSERT INTO `attendance` (ID, eventTitle, division, present) VALUES('$id', '$title', 'cpd', 'no')";
                $result = $conn->query($sql);
            }
        }
        ?>
        <script>
            alert('saved successfully');
            window.location = 'attendance.php';
        </script>
        <?php
    }
    else{
        ?>
        <script>
            window.location = 'new_attendance.php';
        </script>
        <?php
    }
?>