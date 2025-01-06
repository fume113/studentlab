<?php 
    session_start();
    include "koneksi.php";
    
    if (isset($_POST['login'])){

        $Username   = $_POST['Username'];
        $Pass       = $_POST['Pass'];

        $Data = mysqli_query($koneksi, "SELECT * FROM akun WHERE username = '$Username' AND pass = '$Pass' ");
        $cek = mysqli_num_rows($Data);

        if($cek > 0){
            $_SESSION["Username"] = $Username;
            $_SESSION["Pass"] = $Pass;
        } else {
            echo '<script type = "text/javascript">';
            echo 'alert("Username atau Password Salah!");';
            echo 'window.location.href = "index.php"';
            echo '</script>';
        }
        }
        if(isset($_SESSION["Username"])){
            header("Location:mainMenu.php");
        }
?>