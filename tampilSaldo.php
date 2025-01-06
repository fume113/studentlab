<?php 
    // Panggil Koneksi Database
    include "koneksi.php";

    $tampil = mysqli_query($koneksi, "SELECT * FROM keuangan order by id_keuangan");

    $dataArr = array();
    while ($data = mysqli_fetch_array($tampil)) {

        $dataArr[] = array(
            'id' => $data['id_keuangan'],
            'saldo' => $data['saldo'],
            'pemasukan' => $data['pemasukan'],
            'pengeluaran' => $data['pengeluaran']
            'goal' => $data['goal']
        );
    }

    echo json_encode($dataArr);