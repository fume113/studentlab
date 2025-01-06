<<?php 
    include "koneksi.php";

        if(isset($_POST['pemasukan'])) {
            $pemasukan   = $_POST['pemasukan'];

            $query = "INSERT INTO `keuangan` (`pemasukan`) VALUES ('$pemasukan') ";
            $query_run = mysqli_query($koneksi,$query);

            if($query_run){
                echo '<script type="text/javascript"> alert("Berhasil"); 
            window.location.href = "keuangan.php"
             </script>';
            } else {
                echo '<script type="text/javascript"> alert("Gagal Berhasil"); 
            window.location.href = "keuangan.php"
             </script>';
            }
        }
?>