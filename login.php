<?php
require('connect.php');
session_start();
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
        <h2 class="text-center">Login</h2>
        <hr>
        <?php if (isset($_SESSION['reg_succ'])) { ?>
            <div class="alert alert-success" role="alert">
                <h6 class="text-center">
                    <?php
                    echo $_SESSION['reg_succ'];
                    unset($_SESSION['reg_succ']);
                    ?>
                </h6>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['login_error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <h6 class="text-center">
                    <?php
                    echo $_SESSION['login_error'];
                    unset($_SESSION['login_error']);
                    ?>
                </h6>
            </div>
        <?php } ?>
        <form action="login_db.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-outline-primary">Login</button>
            <button type="reset" class="btn btn-outline-danger">Clear</button>
            <a href="register.php" class="btn btn-outline-dark">Register Form</a>
        </form>
    </div>
</body>

</html>