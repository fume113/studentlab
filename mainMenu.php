<?php
session_start();
include "koneksi.php";

// Query Deadline
$deadline = mysqli_query($koneksi, "SELECT * FROM deadline ORDER BY end_deadline ASC LIMIT 1");
$dataArrDeadline = array();

// Query Kegiatan
$kegiatan = mysqli_query($koneksi, "SELECT * FROM events ORDER BY start_event ASC LIMIT 1");
$dataArrKegiatan = array();

// Query Saldo
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Main Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./CSS/cssfont.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!-- Profile Menu -->
  <div class="main d-flex">
    <div class="card rounded-5 border border-5 ms-5 mt-5" style="width: 25rem; height: 50rem; background-color: #f16262">
      <div class="card-body">
        <p class="fa-regular fa-circle-user fa-5x d-flex justify-content-center mt-3"></p>
        <h5 class="card-title fs-1 text-center fw-bold"><?php echo $_SESSION['Username']; ?></h5>
        <br />
        <!-- Isi Content Profile -->
        <p class="card-text fs-3 fw-bold">Saldo :</p>
        <br />

        <?php while ($dataDeadline = mysqli_fetch_array($deadline)) : ?>
          <p class="card-text fs-3 fw-bold">Deadline : <?php echo $dataDeadline['title'] ?> <br> <?php echo $dataDeadline['end_deadline'] ?></p>
        <?php endwhile; ?>

        <br />
        <?php while ($dataKegiatan = mysqli_fetch_array($kegiatan)) : ?>
          <p class="card-text fs-3 fw-bold">Kegiatan : <?php echo $dataKegiatan['title'] ?> <br> <?php echo $dataKegiatan['start_event'] ?></p>
        <?php endwhile; ?>

        <!-- Isi Content Profile -->
        <p class="card-text-stdnt fs-3 fw-bold">
          STUDENT <br />
          LABS <br />
          .CO
        </p>
      </div>
    </div>
    <div class="btn-icon d-flex justify-content-start ms-5">
      <a class="btn fw-bold rounded-circle border border-5 p-4 mt-5 fa-solid fa-sack-dollar fa-5x me-5" href="keuangan.php" role="button"></a>
      <a class=" btn fw-bold rounded-circle border border-5 p-4 mt-5 fa-solid fa-list-check fa-5x me-5" href="deadlineTugas.php" role="button"></a>
      <a class="btn fw-bold rounded-circle border border-5 p-4 mt-5 fa-solid fa-earth-asia fa-5x me-5" href="jadwalKegiatan.php" role="button"></a>
    </div>
    <!-- Logout Button -->
    <div class="btn-logout">
      <a class="btn fw-bold rounded-5 mt-5" href="logout.php" role="button">Logout</a>
    </div>
  </div>
  <!-- Logout Button -->
  </div>
  <!-- Profile Menu -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>