<?php
require('connect.php');
session_start();
if ($_SESSION['id_user'] == '') {
    header("location:login.php");
    exit(0);
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('location:login.php');
    exit(0);
}
$id_user = $_SESSION['id_user'];
$username = $_SESSION['username'];
$sql = "SELECT * FROM topic WHERE id_user='" . $id_user . "'";
$result = mysqli_query($con, $sql);
$order = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container my-2">
        <h2 class="text-center">My Topic</h2>
        <hr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <?php
            $originaldate = $row['pdate'];
            $newdate = date(("d") . "/" . date("m") . "/" . (date("Y") + 543), strtotime($originaldate));
            ?>
            <div class="card text-bg-secondary mb-3" style="max-width: fixed;">
                <div class="card-header">
                    <h4 class="text-center">Topic : <?php echo $row['topic']; ?></h4>
                    <h5 class="text-center">Poster : <?php echo $username; ?><h5>
                    <h5 class="text-center">Post Date : <?php echo $newdate; ?></h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Message : </h5>
                    <p class="card-text"><?php echo $row['message'];?></p>
                    <a href="edittopic.php?id_topic=<?php echo $row['id_topic'];?>" class="btn btn-info">Edit</a>
                    <a href="delete_db.php?id_topic=<?php echo $row['id_topic'];?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        <?php } ?>
        <a href="index.php" class="btn btn-outline-primary">Home</a>
        <a href="totaltopic.php" class="btn btn-outline-success">Total Topic</a>
    </div>
</body>

</html>