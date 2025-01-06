<?php 
    // Panggil Koneksi Database
    include "koneksi.php";

    $tampil = mysqli_query($koneksi, "SELECT * FROM events order by id_events");

    $dataArr = array();
    while ($data = mysqli_fetch_array($tampil)) {

        $dataArr[] = array(
            'id' => $data['id_events'],
            'title' => $data['title'],
            'start' => $data['start_event'],
            'end' => $data['end_event']
        );
    }

    echo json_encode($dataArr);