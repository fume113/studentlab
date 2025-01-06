<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tambahan Fitur -->
  <link rel="stylesheet" href="assets/fullcalendar.css" />
  <link rel="stylesheet" href="assets/bootstrap.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./CSS/cssfont.css" />
  <link rel="stylesheet" href="css/deadtugas.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Javascript -->
  <script src="assets/jquery.min.js"></script>
  <script src="assets/jquery-ui.min.js"></script>
  <script src="assets/moment.min.js"></script>
  <script src="assets/fullcalendar.min.js"></script>

  <title>Deadline Tugas</title>
</head>
<!-- Navbar  -->
<div><br /></div>
<nav class="navbar navbar-expand-sm navbar-light shadow rounded-pill fw-bold fs-4" style="background-color: #f16262">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Menu </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="mainMenu.php">Main Menu</a></li>
            <li><a class="dropdown-item" href="keuangan.php">Keuangan</a></li>
            <li><a class="dropdown-item" href="jadwalKegiatan.php">Kegiatan</a></li>
          </ul>
        </li>
      </ul>
      <!-- Navbar Profile -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['Username']; ?></a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Akhir Navbar + Profile -->

<body>
  <br>
  <h2 class="text-center fw-bold fs-3">Jadwal Deadline</h2>
  <br>
  <div class="container">
    <div id="calendar"></div>
  </div>
  <!-- Button Back -->
  <div class="buttonback">
    <br />
    <br />
    <a href="mainMenu.php" class="fa-solid fa-arrow-left link-dark fs-3 ms-5 text-white"></a>
  </div>
  <!-- Button Back -->
  <br>
  <br>
  <br>
  <br>
  <br>
</body>
<script>
  // Persiapan JQuery
  $(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
      // Izinkan Tabel Bisa di Edit
      editable: true,
      // Atur Header Kalendar
      header: {
        left: 'prev, next today',
        center: 'title',
        right: 'month, agendaWeek, agendaDay'
      },
      // tampilkan data dari database
      events: 'tampilDeadline.php',

      // Izinkan Tabel/Kalendar Bisa Dipilih
      selectable: true,
      selectHelper: true,
      // Function Simpan Data
      select: function(start, end, allDay) {
        // Tampilkan pesan input
        var title = prompt("Masukkan Judul Deadline");
        if (title) {
          // Tampung Tanggal yang dipilih ke dalam variable start dan end
          var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

          // Perintah Ajax Lempar Data Untuk Disimpan
          $.ajax({
            url: "simpanDeadline.php",
            type: "POST",
            data: {
              title: title,
              start: start,
              end: end
            },
            success: function() {
              // Jika Simpan Sukses Refresh Kalender dan Tampilkan Pesan Sukses
              calendar.fullCalendar('refetchEvents');
              alert('Simpan Suksess...!');
            }
          });
        }
      },
      // Event Ketika Judul Kegiatan Dipindah
      eventDrop: function(event) {
        var id = event.id;
        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
        var title = event.title;
        // Perintah Ajax Lempar Data Untuk Diubah
        $.ajax({
          url: "ubahDeadline.php",
          type: "POST",
          data: {
            id: id,
            title: title,
            start: start,
            end: end
          },
          success: function() {
            // Jika Simpan Sukses Refresh Kalender dan Tampilkan Pesan Sukses
            calendar.fullCalendar('refetchEvents');
            alert('Ubah Jadwal Berhasil...!');
          }
        });
      },
      // Event Ketika judul kegiatan diklik
      eventClick: function(event) {
        if (confirm("Apakah anda yakin akan menghapus kegiatan ini")) {
          var id = event.id;
          $.ajax({
            url: "hapusDeadline.php",
            type: "POST",
            data: {
              id: id,
            },
            success: function() {
              // Jika Simpan Sukses Refresh Kalender dan Tampilkan Pesan Sukses
              calendar.fullCalendar('refetchEvents');
              alert('Jadwal Berhasil Dihapus...!');
            }
          });
        }
      }
    });
  });
</script>

</html>