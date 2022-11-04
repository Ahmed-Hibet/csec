<html lang="en">
<body>
    <?php
        include 'db_connection.php';
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $password = $_POST['password'];
            $id = $conn->real_escape_string($id);
            $password = $conn->real_escape_string($password);

            $sql = "SELECT * FROM `users` WHERE ID = '$id' AND password = '$password' LIMIT 1";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);

            if($result->num_rows > 0){
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['roll'] = $row['roll'];
                if($_SESSION['roll'] == 'president'){
                    header("Location: ./president");
                }
                else if($_SESSION['roll'] == 'vice president'){
                    header("Location: ./vice_president");
                }
                else if($_SESSION['roll'] == 'cpd head'){
                    header("Location: ./cpd_head");
                }
                else if($_SESSION['roll'] == 'cbd head'){
                    header("Location: ./cbd_head");
                }
                else if($_SESSION['roll'] == 'dd head'){
                    header("Location: ./dd_head");
                }
                else if($_SESSION['roll'] == 'member'){
                    header("Location: ./member");
                }
                else{
                    header("Location: ./user");
                }
            } 
            else {
                ?>
                <script>
                    alert('Invalid Id or password');
                    window.location = 'login.php';
                </script>
                <?php
            }
        }
        else{
            header("Location: login.php");
        }
    ?>
</body>
</html>