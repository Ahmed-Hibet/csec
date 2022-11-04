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
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $roll = $_POST['roll'];

        $sql = "SELECT * FROM `users` WHERE id = '$id' AND (roll = 'president' OR roll = 'vice president' OR roll = 'cpd head' OR roll = 'cbd head' OR roll = 'dd head')";
        $result = $conn->query($sql);

        $sql = "SELECT * FROM `users` WHERE roll = '$roll';";
        $result2 = $conn->query($sql);

        $sql = "SELECT * FROM `users` WHERE id = '$id' AND roll = 'member'";
        $result3 = $conn->query($sql);
        if($result->num_rows > 0){
            ?>
            <script>
                alert('The user is already executive member. Please select another member');
                window.location = 'add_executive.php';
            </script>
            <?php
        }
        else if($result2->num_rows > 0){
            ?>
            <script>
                alert("<?php echo $roll.' already exist. Please select another roll'; ?>");
                window.location = 'add_executive.php';
            </script>
            <?php
        }
        else if($result3->num_rows == 0){
            ?>
            <script>
                alert('There is no member with such ID.');
                window.location = 'add_executive.php';
            </script>
            <?php
        }
        else{
            $sql = "UPDATE `users` SET roll = '$roll' WHERE id = '$id';";
            if($conn->query($sql)){
                ?>
                <script>
                    alert('Added Successfully');
                    window.location = 'executive_commitee.php';
                </script>
                <?php
            }
        }
    }
?>