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
    if(isset($_GET['delete'])){
        $id = $_GET['id'];
        $devision = $_GET['devision'];
        if($devision == 'cpd'){
            $sql = "UPDATE `users` SET CPD = 'no' WHERE id = '$id';";
            if($conn->query($sql)){
                ?>
                <script>
                    alert("Deleted successfully");
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Deletion failed");
                </script>
                <?php
            }
            ?>
            <script>
                window.location = 'cpd_list.php';
            </script>
            <?php
        }
        else if($devision == 'cbd'){
            $sql = "UPDATE `users` SET CBD = 'no' WHERE id = '$id';";
            if($conn->query($sql)){
                ?>
                <script>
                    alert("Deleted successfully");
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Deletion failed");
                </script>
                <?php
            }
            ?>
            <script>
                window.location = 'cbd_list.php';
            </script>
            <?php
        }
        else if($devision == 'dd'){
            $sql = "UPDATE `users` SET DD = 'no' WHERE id = '$id';";
            if($conn->query($sql)){
                ?>
                <script>
                    alert("Deleted successfully");
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Deletion failed");
                </script>
                <?php
            }
            ?>
            <script>
                window.location = 'dd_list.php';
            </script>
            <?php
        }
    }
?>