<?php
session_start();
include "koneksi.php";

$id = "";
$saldo = "";
$pemasukan = "";
$pengeluaran = "";
$goal = "";

// Query Saldo
$saldo = mysqli_query($koneksi, "SELECT * FROM keuangan ORDER BY id_keuangan DESC LIMIT 1");
$dataArrS = array();

// Query Pemasukkan
$P = mysqli_query($koneksi, "SELECT SUM(pemasukan) AS sumP FROM keuangan");
$dataArrP = array();

// Query Pengeluaran
$PP = mysqli_query($koneksi, "SELECT SUM(pengeluaran) AS sumPP FROM keuangan");
$dataArrPP = array();

// Query Goal
$goal = mysqli_query($koneksi, "SELECT * FROM keuangan ORDER BY goal_tabungan DESC LIMIT 1");
$dataArrG = array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keuangan</title>
  <link rel="stylesheet" href="assets/bootstrap.css" />
  <link rel="stylesheet" href="css/uang.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Javascript -->
  <script src="assets/jquery.min.js"></script>
  <script src="assets/jquery-ui.min.js"></script>
  <script src="assets/moment.min.js"></script>
  <script src="assets/fullcalendar.min.js"></script>
</head>

<body>
  <!-- Navbar  -->

  <nav class="navbar navbar-expand-sm navbar-light shadow rounded-pill fw-bold fs-4" style="background-color: #f16262">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Menu </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="mainMenu.php">Main Menu</a></li>
              <li><a class="dropdown-item" href="deadlineTugas.php">Deadline</a></li>
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

  <!-- Isi Content -->
  <div class="d-flex justify-content-center my-3" id="Content">
    <div class="row">
      <div class="col-sm-6 card-saldo">
        <div class="card mx-auto" style="width: 30rem; height: 16rem;">
          <div class="card-body">

            <h5 class="card-title" style="font-size: xx-large;">Saldo</h5>
            <?php while ($dataSaldo = mysqli_fetch_array($saldo)) : ?>
              <p class="card-text" style="font-size: x-large;">Rp<g class="money number"><?php echo $dataSaldo['saldo']; ?></g>
              </p>
            <?php endwhile; ?>

            <div class="card-pemasukan" style="width: 11rem; height: 3.5rem; background-color: #A6BB8D;">
              <?php while ($dataP = mysqli_fetch_array($P)) : ?>
                <p class="card-text">Pemasukan Bulan Ini : Rp<g class="money number"><?php echo $dataP['sumP']; ?></g>
                </p>
              <?php endwhile; ?>

              <div class="card-pengeluaran" style="width: 11rem; height: 3.5rem; background-color: #EB1D36;">
                <?php while ($dataPP = mysqli_fetch_array($PP)) : ?>
                  <p class="card-text">Pengeluaran Bulan Ini : Rp<g class="money number"><?php echo $dataPP['sumPP']; ?></g>
                  </p>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-5 card-goaltabungan">
        <div class="card mx-auto" style="width: 30rem; height: 16rem;">
          <div class="card-body">
            <h5 class="card-title">Goal Tabungan</h5>
            <?php while ($dataGoal = mysqli_fetch_array($goal)) : ?>
              <p class="card-text">Rp<g class="money number"><?php echo $dataGoal['goal_tabungan']; ?></g>
              </p>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row d-flex flex-column col-5 m-auto penginputan">
    <form action="masukUang.php" method="post">
      <input type="text" class="form-control money number" nama="pemasukan" placeholder="Pemasukan" aria-label="First name">
      <input type="submit" class="btn btn-primary" name="button" value="Masukkan Pemasukkan"></input>
    </form>
    <form action="#" method="post">
      <input type="text" class="form-control money number" nama="pengeluaran" placeholder="Pengeluaran" aria-label="First name">
      <input type="submit" class="btn btn-primary" name="button" value="Masukkan Pengeluaran"></input>
    </form>
    <form action="#" method="post">
      <input type="text" class="form-control money number" nama="goal" placeholder="Goal" aria-label="Last name">
      <input type="submit" class="btn btn-primary" name="button" value="Masukkan Goal Tabungan"></input>
    </form>
  </div>
  </div>
  </div>
  <!-- Akhir Content -->

  <!-- Button Back -->
  <div class="">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <a href="mainMenu.php" class="fa-solid fa-arrow-left link-dark fs-3 ms-5 text-white"></a>
  </div>
  <!-- Button Back -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="assets/jquery-3.6.3.js"></script>
<script src="assets/simple.money.format.js"></script>
<script>
  // Script Format Uang
  $(document).ready(function() {
    $(".money").simpleMoneyFormat();

    $(document).on("keypress", ".number", function(e) {
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
      }
    });
  });
</script>


</html>