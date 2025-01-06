<?php
session_start();
include "koneksi.php";
?>

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="./CSS/stylelogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
    <!-- Login Form -->
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center">StudentsLab.co</h1>
            </div>
            <div class="card-text">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="Username" required="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="Pass" required="">
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn-login" name="login" value="Login"></input>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" class="btn-regis" onclick="location.href='register.php'">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- //
    <div class="signup">
        <form action="login.php" method="post">
            <label>USERNAME</label>
            <input type="text" class="field" name="Username" placeholder="Username" required="">
            <label>PASSWORD</label>
            <input type="password" class="field" name="Pass" placeholder="Password" required="">
            <div class="buttonregis">
                <input type="submit" style='margin-top: 16px; height:30px; width:75px' class="gray" name="login" value="Login"></input>
                <button type="button" style='height:30px; width:75px' class="gray" onclick="location.href='register.php'">Register</button>
        </form>


    </div> -->
</body>

</html>