<?php
require('connect.php');
$id_topic = $_GET['id_topic'];
$sql = "DELETE FROM topic WHERE id_topic='" . $id_topic . "'";
$result = mysqli_query($con, $sql);
if($result){
    $_SESSION['delete'] = "Delete Success";
    header("location:mytopic.php");
    exit(0);
}
?>