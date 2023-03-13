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
        <h2 class="text-center">Webboard Online</h2>
        <hr>
        <?php if (isset($_SESSION['username'])) { ?>
            <div class="alert alert-success" role="alert">
                <h5 class="text-center">
                    Welcome <?php echo $_SESSION['username']; ?>
                </h5>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['login_succ'])) { ?>
            <div class="alert alert-success" role="alert">
                <h6 class="text-center">
                    <?php
                    echo $_SESSION['login_succ'];
                    unset($_SESSION['login_succ']);
                    ?>
                </h6>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['post_succ'])) { ?>
            <div class="alert alert-info" role="alert">
                <h6 class="text-center">
                    <?php
                    echo $_SESSION['post_succ'];
                    unset($_SESSION['post_succ']);
                    ?>
                </h6>
            </div>
        <?php } ?>
        <form action="topic_db.php" method="POST">
            <div class="mb-3">
                <label for="topic" class="form-label">Topic</label>
                <input type="text" class="form-control" name="topic" placeholder="Please enter your topic">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" rows="3" placeholder="Please enter your message"></textarea>            
            </div>
            <button type="submit" class="btn btn-outline-primary">Post</button>
            <button type="reset" class="btn btn-outline-danger">Clear</button>
        </form>
        <hr>
        <a href="mytopic.php" class="btn btn-outline-dark">My Topic</a>
        <a href="totaltopic.php" class="btn btn-outline-secondary">Total Topic</a>
        <a href="index.php?logout='1'" class="btn btn-outline-danger">Logout</a>
    </div>
</body>

</html>