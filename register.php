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
        <h2 class="text-center">Register</h2>
        <hr>
        <?php if (isset($_SESSION['have_user'])) { ?>
            <div class="alert alert-danger" role="alert">
                <h6 class="text-center">
                    <?php
                    echo $_SESSION['have_user'];
                    unset($_SESSION['have_user']);
                    ?>
                </h6>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error_pass'])) { ?>
            <div class="alert alert-danger" role="alert">
                <h6 class="text-center">
                    <?php
                    echo $_SESSION['error_pass'];
                    unset($_SESSION['error_pass']);
                    ?>
                </h6>
            </div>
        <?php } ?>
        <form action="register_db.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" class="form-control" name="fname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" name="lname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="c_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="c_password">
            </div>
            <div class="mb-3">
                <label for="bdate" class="form-label">Birth Day</label>
                <input type="date" class="form-control" name="bdate">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Gender</label><br>
                <input class="form-check-input" type="radio" name="gender" value="male" checked>
                <label class="form-check-label" for="male">Male</label>
                <input class="form-check-input" type="radio" name="gender" value="female" checked>
                <label class="form-check-label" for="female">Female</label>
                <input class="form-check-input" type="radio" name="gender" value="other" checked>
                <label class="form-check-label" for="other">Other</label>
            </div>
            <button type="submit" class="btn btn-outline-primary">Register</button>
            <button type="reset" class="btn btn-outline-danger">Clear</button>
            <a href="login.php" class="btn btn-outline-dark">Login Form</a>
        </form>
    </div>
</body>

</html>