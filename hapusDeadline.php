<?php 
    include "koneksi.php";

    if(isset($_POST['id'])) {
        $id = $_POST['id'];

        mysqli_query($koneksi, "DELETE FROM deadline WHERE id_deadline = '$id' ");
    }
?>