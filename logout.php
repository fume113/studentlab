<?php 
    session_start();
    include "koneksi.php";
    if(session_destroy()){
        header("location: index.php");
    }
?>