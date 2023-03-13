<?php
require('connect.php');
session_start();
$username = $_POST['username'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$c_pass = $_POST['c_password'];
$bdate = $_POST['bdate'];
$gender = $_POST['gender'];
$sql = "SELECT * FROM user WHERE username='" . $username . "'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
if ($username == $row['username']) {
    $_SESSION['have_user'] = "Have a Username in System";
    header("location:register.php");
    exit(0);
} else {
    if ($password == $c_pass) {
        $_SESSION['reg_succ'] = "Register Success";
        $sql1 = "INSERT INTO  user(username,fname,lname,email,password,bdate,gender) VALUES('$username','$fname','$lname','$email','$password','$bdate','$gender')";
        $result1 = mysqli_query($con, $sql1);
        header("location:login.php");
        exit(0);
    } else {
        $_SESSION['error_pass'] = "Password doesn't Match";
        header("location:register.php");
        exit(0);
    }
}
