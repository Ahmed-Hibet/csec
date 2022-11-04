<html lang="en">
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
        include 'db_connection.php';
        if(isset($_POST['submit'])){

            $flag = 0;

            // checking if their is empty field submitted
            if((!isset($_POST['fname'])) || (!isset($_POST['lname'])) || (!isset($_POST['id'])) || (!isset($_POST['year'])) || 
            (!isset($_POST['phone'])) || (!isset($_POST['email'])) || (!isset($_POST['gender'])) || (!isset($_POST['education'])) || 
            (!isset($_POST['department'])) ) {
                ?>
                <script>
                    alert('Please fill all the fields');
                    window.location = 'edit_profile.php';
                </script>
                <?php
                $flag = 1;
            }

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $id = $_POST['id'];
            $year = $_POST['year'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $education = $_POST['education'];
            $department = $_POST['department'];

            // validating ID

            $id = $conn->real_escape_string($id);
            $sql = "SELECT * FROM `users` WHERE id = '$id'";
            $result = $conn->query($sql);

            if($result->num_rows > 1){
                ?>
                <script>
                    alert('This ID already have an account');
                    window.location = 'edit_profile.php';
                </script>
                <?php
                $flag = 1;
            }
            
            // validating email

            $email = $conn->real_escape_string($email);
            $sql = "SELECT * FROM `users` WHERE email = '$email'";
            $result = $conn->query($sql);

            if($result->num_rows > 1){
                ?>
                <script>
                    alert('Please use another email account! It is already used.');
                    window.location = 'edit_profile.php';
                </script>
                <?php
                $flag = 1;
            }

            // validate phone number
            //.....................
            if($flag == 0){
                $oldId = $_SESSION['id'];
                $sql = "UPDATE `users` SET firstName = '$fname', lastName = '$lname', id = '$id', gender = '$gender', 
                education = '$education', academicYear = '$year', department = '$department', email = '$email', phone = '$phone' 
                WHERE id = '$oldId';";
                
                if($conn->query($sql)){
                    $_SESSION['id'] = $id;
                    ?>
                    <script>
                        alert('Updated successfully');
                        window.location = 'profile.php';
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert('Updating fail');
                        window.location = 'profile.php';
                    </script>
                    <?php
                }
            }
        }
        else{
            header("Location: profile.php");
        }
    ?>
</body>
</html>