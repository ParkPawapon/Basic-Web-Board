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
$sql = "SELECT * FROM topic";
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
        <h2 class="text-center">Total Topic</h2>
        <hr>
        <table class="table table-success table-striped">
            <tr>
                <td>No.</td>
                <td>Topic</td>
                <td>Poster</td>
                <td>Post Date</td>
                <td>Total Views</td>
                <td>Total Reply</td>
                <td>See More</td>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <?php
                    $sql1 = "SELECT * FROM topic WHERE id_user='" . $row['id_user'] . "'";
                    $result1 = mysqli_query($con, $sql1);
                    $row1 = mysqli_fetch_assoc($result1);
                    $sql2 = "SELECT * FROM user WHERE id_user='" . $row1['id_user'] . "'";
                    $result2 = mysqli_query($con, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $originaldate = $row['pdate'];
                    $newdate = date(("d") . "/" . date("m") . "/" . (date("Y") + 543), strtotime($originaldate));
                    ?>
                    <td><?php echo $order++; ?></td>
                    <td><?php echo $row['topic']; ?></td>
                    <td><?php echo $row2['username']; ?></td>
                    <td><?php echo $newdate; ?></td>
                    <td><?php echo $row['totalview']; ?></td>
                    <td></td>
                    <td><a href="seemore.php?id_topic=<?php echo $row['id_topic']; ?>" class="btn btn-success">See more</a></td>
                <?php } ?>
                </tr>
        </table>
        <a href="index.php" class="btn btn-outline-primary">Home</a>
        <a href="mytopic.php" class="btn btn-outline-success">My Topic</a>
    </div>
</body>

</html>