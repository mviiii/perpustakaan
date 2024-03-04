<?php
include "../db/koneksi.php";
$id = $_GET['id'];

$pilih = mysqli_query($koneksi, " SELECT * FROM admin WHERE id_admin='$id'");
$data = mysqli_fetch_assoc($pilih);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_lengkap = $_POST['nama_lengkap'];
  $Username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($koneksi, "UPDATE admin SET nama_lengkap='$nama_lengkap', username='$Username', password='$password' WHERE id_admin='$id'");

  if ($query) {
    echo "<script>
        window.location = 'index.php?dashboard=admin&notif=edit-berhasil';
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
            <h4 class="card-title">Edit Data Admin</h4>
            <p class="card-description"> Form untuk mengubah data admin</p>
          </div>
          <div class="col-2">
            <a href="index.php?dashboard=admin"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">back</button></a>

          </div>
        </div>

        <div class="table-responsive">
          <form action="" method="post">
            <div class="mb-3">
              <label for="nama_penerbit" class="form-label">Nama Lengkap</label>
              <input type="text" id="nama_penerbit" name="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="kota" class="kota">Username</label>
              <input type="text" id="kota" name="username" class="form-control" value="<?= $data['username'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="kota" class="kota">Password</label>
              <input type="password" id="kota" name="password" class="form-control" value="<?= $data['password'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>