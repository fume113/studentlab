<?php 
    // Panggil Koneksi Database
    include "koneksi.php";

    $tampil = mysqli_query($koneksi, "SELECT * FROM deadline order by id_deadline");

    $dataArr2 = array();
    while ($data = mysqli_fetch_array($tampil)) {

        $dataArr2[] = array(
            'id' => $data['id_deadline'],
            'title' => $data['title'],
            'start' => $data['start_deadline'],
            'end' => $data['end_deadline']
        );
    }

    echo json_encode($dataArr2);