<html lang="en">
<body>
    <?php
        include 'db_connection.php';
        if(isset($_POST['submit'])){

            $flag = 0;

            // checking if their is empty field submitted
            if((!isset($_POST['fname'])) || (!isset($_POST['lname'])) || (!isset($_POST['id'])) || (!isset($_POST['year'])) || 
            (!isset($_POST['phone'])) || (!isset($_POST['email'])) || (!isset($_POST['gender'])) || (!isset($_POST['education'])) || 
            (!isset($_POST['department'])) || (!isset($_POST['password'])) || (!isset($_POST['confirmPassword']))) {
                ?>
                <script>
                    alert('Please fill all the fields');
                    window.location = 'registration.php';
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
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            if($password != $confirmPassword){
                ?>
                <script>
                    alert('Confirm password does not match');
                    window.location = 'registration.php';
                </script>
                <?php
                $flag = 1;
            }

            // validating ID

            $id = $conn->real_escape_string($id);
            //$password = $conn->real_escape_string($password);
            $sql = "SELECT * FROM `users` WHERE id = '$id'";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                ?>
                <script>
                    alert('You already have an account');
                    window.location = 'registration.php';
                </script>
                <?php
                $flag = 1;
            }
            
            // validating email

            $email = $conn->real_escape_string($email);
            $sql = "SELECT * FROM `users` WHERE email = '$email'";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                ?>
                <script>
                    alert('Please use another email account! It is already used.');
                    window.location = 'registration.php';
                </script>
                <?php
                $flag = 1;
            }

            // validate phone number
            //.....................
            if($flag == 0){
                $sql = "INSERT INTO `users`(firstName, lastName, id, gender, education, academicYear, department, email, phone, password) 
                VALUES('$fname', '$lname', '$id', '$gender', '$education', '$year', '$department', '$email', '$phone', '$password')";

                if($conn->query($sql)){
                    ?>
                    <script>
                        alert('Registered successfully');
                        window.location = 'login.php';
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert('Registration failed');
                        window.location = 'registration.php';
                    </script>
                    <?php
                }
            }
        }
        else{
            header("Location: registration.php");
        }
    ?>
</body>
</html>