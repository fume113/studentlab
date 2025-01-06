<?php
include "koneksi.php";

if(isset($_POST['register'])){
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $nim        = $_POST['nim'];

    $query ="INSERT INTO `akun` (`username`,`email`,`pass`,`nim`) VALUES ('$username','$email','$password','$nim')";
    $query_run = mysqli_query($koneksi,$query);
    
    if($query_run){
        echo '<script type="text/javascript"> alert("Registrasi Berhasil"); 
            window.location.href = "index.php"
             </script>';
    } 
}
?>