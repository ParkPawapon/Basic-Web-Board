<?php
require('connect.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM user WHERE username='" . $username . "'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
if($username==$row['username']){
    $_SESSION['username'] = $row['username'];
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['login_succ'] = "Login Success";
    header("location:index.php");
    exit(0);
}else{
    $_SESSION['login_error'] = "Wrong Username Or password";
    header("location:login.php");
    exit(0);
}
?>