<?php
require('connect.php');
session_start();
$id_topic = $_GET['id_topic'];
$sql = "UPDATE topic SET totalview=totalview+1 WHERE id_topic='" . $id_topic . "'";
$result = mysqli_query($con, $sql);
if ($_SESSION['id_user'] == '') {
    header("location:login.php");
    exit(0);
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('location:login.php');
    exit(0);
}
$sql1 = "SELECT * FROM topic WHERE id_topic='" . $id_topic . "'";
$result1 = mysqli_query($con, $sql1);
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
        <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
            <?php
            $sql2 = "SELECT * FROM topic WHERE id_user='" . $row['id_user'] . "'";
            $result2 = mysqli_query($con, $sql2);
            $row1 = mysqli_fetch_assoc($result2);
            $sql3 = "SELECT * FROM user WHERE id_user='" . $row1['id_user'] . "'";
            $result3 = mysqli_query($con, $sql3);
            $row2 = mysqli_fetch_assoc($result3);
            $originaldate = $row['pdate'];
            $newdate = date(("d") . "/" . date("m") . "/" . (date("Y") + 543), strtotime($originaldate));
            ?>
            <div class="card text-bg-dark mb-3" style="max-width: fixed;">
                <div class="card-header">
                    <h4 class="text-center">Topic : <?php echo $row['topic']; ?></h4>
                    <h5 class="text-center">Poster : <?php echo $row2['username']; ?><h5>
                            <h5 class="text-center">Post Date : <?php echo $newdate; ?></h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Message : </h5>
                    <p class="card-text"><?php echo $row['message']; ?></p>
                </div>
            </div>
        <?php } ?>
        <hr>
        <form action="reply_db.php" method="post">
            <div class="mb-3">
                <label for="message" class="form-label">Reply</label>
                <textarea class="form-control" name="message" rows="3" placeholder="Please enter your message"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Reply</button>
            <button type="reset" class="btn btn-danger">Clear</button>
        </form>
        <br>
        <a href="index.php" class="btn btn-primary">Home</a>
        <a href="totaltopic.php" class="btn btn-secondary">Total Topic</a>
        <a href="mytopic.php" class="btn btn-info">My Topic</a>
    </div>
</body>

</html>