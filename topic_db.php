<?php
require('connect.php');
session_start();
$topic = $_POST['topic'];
$message = $_POST['message'];
$id_user = $_SESSION['id_user'];
$pdate = $_GET = date("y-m-d", strtotime(("+7 HOURS")));
$sql = "INSERT INTO topic(id_user,topic,message,pdate) VALUES('$id_user','$topic','$message','$pdate')";
$result = mysqli_query($con, $sql);
if($result){
    $_SESSION['post_succ'] = "Post Success";
    header("location:index.php");
    exit(0);
}else{
    echo mysqli_error($con);
}
?>