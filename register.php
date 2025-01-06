<?php
include "koneksi.php";
?>

<html>

<head>
    <title>Register</title>

    <link rel="stylesheet" href="./CSS/styleregister.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
</head>

<body>

    <div class="formjudul">
        <h2 class="text-center">Form Registrasi</h2>


        <div class="container mt-1">
            <form action="registrasi.php" method="post">
                <div class="form-group">
                    <label for="nama">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" class="form-control number" name= "nim" placeholder="NIM" required="">
                </div>
                <div class="btn">
                    <input type="submit" class="gray" name="register" value="Register"></input>
                    <div class="btnback">
                        <button type="button" class="gray" onclick="location.href='index.php'">Back</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</body>

<script src="assets/jquery-3.6.3.js"></script>
<script src="assets/simple.money.format.js"></script>
<script>
    $(document).on("keypress", ".number", function (e){
    if(e.which != 8 && e.which != 0 && (e.which <48 || e.which >57)){
      return false;
    }
  });
</script>


</html>

<!-- <div class="signup">
        <h2>STUDENT</h2>
        <h2>LABS</h2>
        <h2>.CO</h2>
        <h1>REGISTER</h1>
        <form action="registrasi.php" method="POST">
            <label>USERNAME</label>
            <input type="text" name="username" placeholder="Username" required="">
            <label>EMAIL</label>
            <input type="email" name="email" placeholder="Email" required="">
            <label>PASSWORD</label>
            <input type="password" name="password" placeholder="Password" required="">
            <label>NIM</label>
            <input type="text" name="nim" placeholder="NIM" required="">
            <div class="buttonregis">
                <input type="submit" style='margin-top: 16px; height:30px; width:75px' class="gray" name="register" value="Register"></input>
                <button type="button" style='margin-top: 16px; height:30px; width:75px' class="gray" onclick="location.href='index.php'">Back</button>

        </form>
    </div> -->
</body>

</html>