<?php

session_start();

include 'db/koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['role'] == 'admin') {
            $_SESSION['role'] = $row['role'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama_lengkap'];
            $_SESSION['id_admin'] = $row['id_admin'];
            header('Location:admin/index.php');
            exit();
        } else {
            $_SESSION['role'] = $row['role'];
            $_SESSION['nama'] = $row['nama_lengkap'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_admin'] = $row['id_admin'];
            header('Location:pustakawan/pustakawan.php');
            exit();
        }
    } else {
        $_SESSION['gagal_login'] = 'Maaf, username atau password anda salah!';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo ">
                                <label class="navbar-brand brand-logo font-weight-bold mb-2"> Perpustakaan SMK Negeri 1 Rongga</label>
                            </div>
                            <h4>Halo! mari kita mulai</h4>
                            <h6 class="font-weight-light">Masuk untuk melanjutkan.</h6>
                            <form class="pt-3" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <input type="submit" value="Masuk" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <!-- <script src="assets/js/misc.js"></script> -->
    <!-- endinject -->
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>

    <!-- SWEET ALERT NOTIFKATION -->
    <?php if (isset($_SESSION['gagal_login']) && $_SESSION['gagal_login'] != '') : ?>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(event) {
                Swal.fire({
                    icon: "error",
                    title: "<?php echo $_SESSION['gagal_login'] ?>",
                    showConfirmButton: false,
                    timer: 2200
                });
            });
        </script>
        <?php unset($_SESSION['gagal_login']) ?>
    <?php endif ?>
    <!-- SWEET ALERT NOTIFKATION -->
</body>

</html>