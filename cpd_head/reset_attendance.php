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
    include 'db_connection.php';
    $sql = "DELETE FROM `attendance` WHERE visibleFor = 'cpd';";
    if($conn->query($sql)){
        ?>
        <script>
            alert('Resetted successfully')
            window.location = 'attendance.php';
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Resetting failed')
            window.location = 'attendance.php';
        </script>
        <?php
    }
?>