<?php session_start() ?>
<?php
if (!isset($_SESSION['username'])) {
  header('Location:../login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Perpustakaan </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" />

  <!-- sweet alert -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css">
</head>

<body>
  <div class="container-scroller">

    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo font-weight-bold mb-2" href="index.html"> Perpustakaan</a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="" method="get">
            <div class="input-group">
              <input type="text" name="cari" class="form-control bg-transparent border-0" placeholder="Search projects">
              <select name="dashboard" id="" class="form-select bg-transparent border-0 py-0">
                <option value="peminjaman">peminjaman</option>
                <option value="data-siswa">Data Siswa</option>
                <option value="data-buku">Data Buku</option>
                <option value="data-penulis">Data Penulis</option>
                <option value="data-penerbit">Data Penerbit</option>
                <option value="data-kategori">Data Kategori</option>
              </select>
              <button type="submit" class="input-group-prepend bg-transparent"><i class="input-group-text border-0 mdi mdi-magnify"></i></button>
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="../assets/images/faces-clipart/pic-2.png" alt="image">
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php echo $_SESSION['nama'] ?></p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
              <div class="dropdown-divider"></div>
              <span class="dropdown-item" onclick="logout()" id="logout">
                <i class="mdi mdi-logout me-2 text-primary"></i>logout
              </span>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="../img/abangku.png" alt="image">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">Perpustakaan</span>
                <span class="text-secondary text-small">Smkn 1 Rongga</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php">
              <span class="menu-title">Home</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?dashboard=admin">
              <span class="menu-title">Admin</span>
              <i class="mdi mdi-contacts menu-icon"></i>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" data-bs-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="transaksi">
              <span class="menu-title">Transaksi</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-flattr menu-icon"></i>
            </a>
            <div class="collapse" id="transaksi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="?dashboard=peminjaman">Tambah Peminjaman</a></li>
                <li class="nav-item"> <a class="nav-link" href="?dashboard=peminjaman-list">Data Peminjaman</a></li>
                <li class="nav-item"> <a class="nav-link" href="?dashboard=pengembalian">Pengembalian</a>
                </li>
            </div>
          </li>

          <li class="nav-item active">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Data Master</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-database menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="?dashboard=data-buku">Buku</a></li>
                <li class="nav-item"> <a class="nav-link" href="?dashboard=data-penulis">Penulis</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="?dashboard=data-penerbit">Penerbit</a></li>
                <li class="nav-item"> <a class="nav-link" href="?dashboard=data-kategori">Kategori</a></li>
                <li class="nav-item"> <a class="nav-link" href="?dashboard=data-siswa">Siswa</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" data-bs-toggle="collapse" href="#report" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Report</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-arrow-down-bold-box menu-icon"></i>
            </a>
            <div class="collapse" id="report">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="peminjaman_excel.php">Peminjaman</a></li>
                <li class="nav-item"> <a class="nav-link" href="pengembalian_excel.php">Pengembalian</a>
                <li class="nav-item"> <a class="nav-link" href="data_buku_excel.php">Buku</a></li>
                <li class="nav-item"> <a class="nav-link" href="data_penulis_excel.php">Penulis</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="data_penerbit_excel.php">Penerbit</a></li>
                <li class="nav-item"> <a class="nav-link" href="data_kategori_excel.php">Kategori</a></li>
                <li class="nav-item"> <a class="nav-link" href="data_siswa_excel.php">Siswa</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <?php include "notifikasi.php" ?>
          <?php
          if (!empty($_GET['dashboard'])) {
            if ($_GET['dashboard'] == 'admin') {
              include 'admin.php';
            } elseif ($_GET['dashboard'] == 'admin-add') {
              include 'admin_add.php';
            } elseif ($_GET['dashboard'] == 'admin-edit') {
              include 'admin_edit.php';
            } elseif ($_GET['dashboard'] == 'admin-delete') {
              include 'admin_hapus.php';
            } elseif ($_GET['dashboard'] == 'data-buku') {
              include 'data_buku.php';
            } elseif ($_GET['dashboard'] == 'data-buku-detail') {
              include 'data_buku_detail.php';
            } elseif ($_GET['dashboard'] == 'data-buku-add') {
              include 'data_buku_add.php';
            } elseif ($_GET['dashboard'] == 'data-buku-edit') {
              include 'data_buku_edit.php';
            } elseif ($_GET['dashboard'] == 'data-siswa') {
              include 'data_siswa.php';
            } elseif ($_GET['dashboard'] == 'data-siswa-add') {
              include 'data_siswa_add.php';
            } elseif ($_GET['dashboard'] == 'data-siswa-edit') {
              include 'data_siswa_edit.php';
            } elseif ($_GET['dashboard'] == 'data-siswa-delete') {
              include 'data_siswa_delete.php';
            } elseif ($_GET['dashboard'] == 'data-penulis') {
              include 'data_penulis.php';
            } elseif ($_GET['dashboard'] == 'data-penulis-add') {
              include 'data_penulis_add.php';
            } elseif ($_GET['dashboard'] == 'data-penulis-edit') {
              include 'data_penulis_edit.php';
            } elseif ($_GET['dashboard'] == 'data-penulis-delete') {
              include 'data_penulis_delete.php';
            } elseif ($_GET['dashboard'] == 'data-penerbit') {
              include 'data_penerbit.php';
            } elseif ($_GET['dashboard'] == 'data-penerbit-add') {
              include 'data_penerbit_add.php';
            } elseif ($_GET['dashboard'] == 'data-penerbit-edit') {
              include 'data_penerbit_edit.php';
            } elseif ($_GET['dashboard'] == 'data-penerbit-delete') {
              include 'data_penerbit_delete.php';
            } elseif ($_GET['dashboard'] == 'data-kategori') {
              include 'data_kategori.php';
            } elseif ($_GET['dashboard'] == 'data-kategori-add') {
              include 'data_kategori_add.php';
            } elseif ($_GET['dashboard'] == 'data-kategori-edit') {
              include 'data_kategori_edit.php';
            } elseif ($_GET['dashboard'] == 'data-kategori-delete') {
              include 'data_kategori_delete.php';
            } elseif ($_GET['dashboard'] == 'peminjaman') {
              include 'peminjaman.php';
            } elseif ($_GET['dashboard'] == 'peminjaman-add') {
              include 'peminjaman_add.php';
            } elseif ($_GET['dashboard'] == 'peminjaman-edit') {
              include 'peminjaman_edit.php';
            } elseif ($_GET['dashboard'] == 'peminjaman-delete') {
              include 'peminjaman_delete.php';
            } elseif ($_GET['dashboard'] == 'peminjaman-list') {
              include 'peminjaman_list.php';
            } elseif ($_GET['dashboard'] == 'peminjaman-detail') {
              include 'peminjaman_detail.php';
            } elseif ($_GET['dashboard'] == 'pengembalian') {
              include 'pengembalian.php';
            } elseif ($_GET['dashboard'] == 'pengembalian-add') {
              include 'pengembalian_add.php';
            } elseif ($_GET['dashboard'] == 'pengembalian-edit') {
              include 'pengembalian_edit.php';
            } elseif ($_GET['dashboard'] == 'pengembalian-delete') {
              include 'pengembalian_delete.php';
            } else {
              echo 'helo';
            }
          } else {
            include 'home.php';
          }
          ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../assets/vendors/chart.js/Chart.min.js"></script>
  <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->

  <!-- Custom js for this page -->
  <script src="../assets/js/dashboard.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <!-- End custom js for this page -->

  <!-- jquery -->
  <script src="../assets/js/jquery.min.js"></script>

  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
  <!-- ALERT HAPUS -->
  <script type="text/javascript">
    function logout() {
      var link_logout = '../logout.php';
      const swalButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success m-2",
          cancelButton: "btn btn-danger m-2"
        },
        buttonsStyling: false
      });
      swalButtons.fire({
        title: "Apakah Kamu yakin?",
        text: "jika keluar, anda harus login kembali!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yaa, keluar sekarang!",
        cancelButtonText: "Gak jadi ah",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = link_logout
        }
      });
    }
  </script>
  <!-- ALERT HAPUS -->
  <?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') : ?>
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function(event) {
        Swal.fire({
          icon: "success",
          title: "Data berhasil dihapus",
          showConfirmButton: false,
          timer: 2200
        });
      });
    </script>
    <?php unset($_SESSION['success']) ?>
  <?php endif ?>
  <!-- SWEET ALERT NOTIFKATION -->

  <!-- ALERT KEMBALIKAN -->
  <script type="text/javascript">
    function confirmationDelete(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
      console.log(urlToRedirect);
      const swalButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success m-2',
          cancelButton: 'btn btn-danger m-2'
        },
        buttonsStyling: false
      });
      swalButtons.fire({
        title: "Apakah kamu yakin?",
        text: "Data yang sudah dihapus tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yaa, Hapus saja!",
        cancelButtonText: "Gak jadi deh hehe ",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = urlToRedirect
        }
      });
    }
  </script>
  <!-- ALERT KEMBALIKAN -->
</body>

</html>