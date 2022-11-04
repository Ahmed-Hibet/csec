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
    if(isset($_GET['remove'])){
        include 'db_connection.php';
        $id = $_GET['id'];
        $roll = $_GET['roll'];
        if($roll == 'president'){
            ?>
            <script>
                alert('You must add new president first.');
                window.location = 'change_president.php';
            </script>
            <?php
        }
        else{
            $sql = "UPDATE `users` SET roll = 'member' WHERE id = '$id';";
            if($conn->query($sql)){
                ?>
                <script>
                    window.location = 'executive_commitee.php';
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    window.location = 'executive_commitee.php';
                </script>
                <?php
            }
        }
    }
    else{
        ?>
        <script>
            window.location = 'executive_commitee.php';
        </script>
        <?php
    }
?>