<?php
include "../db/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "INSERT INTO admin (nama_lengkap, username, password) VALUES ('$nama_lengkap', '$username', '$password')");

    if ($query) {
        echo "<script>
        window.location = 'index.php?dashboard=admin&notif=add-berhasil';
    </script>";
    }
}
?>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title">Tambah Data Admin</h4>
                        <p class="card-description"> Form untuk menambah admin Baru</p>
                    </div>
                    <div class="col-2">
                        <a href="index.php?dashboard=admin"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">back</button></a>

                    </div>
                </div>

                <div class="table-responsive">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nama_penerbit" class="form-label">Nama Lengkap</label>
                            <input type="text" id="nama_penerbit" name="nama_lengkap" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="kota" class="kota">Username</label>
                            <input type="text" id="kota" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="kota" class="kota">Password</label>
                            <input type="password" id="kota" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>