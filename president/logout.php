<?php
session_start();
if(isset($_SESSION['id']))
{
    unset($_SESSION['id']);
    unset($_SESSION['roll']);
}
header("Location: ../login.php");
?>