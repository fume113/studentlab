<?php 
    include "koneksi.php";

    if(isset($_POST['id'])) {

        $id    = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end   = $_POST['end'];

        mysqli_query($koneksi, "UPDATE deadline set title = '$title', start_deadline = '$start', end_deadline = '$end' WHERE id_deadline = '$id'");
    }
?>