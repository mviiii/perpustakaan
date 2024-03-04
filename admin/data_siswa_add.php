<?php
include "../db/koneksi.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nisn = $_POST['nisn'];
  $nama_siswa = $_POST['nama_siswa'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];
  $ekstensi_diperbolehkan = ['png', 'jpg'];
  $foto_siswa = $_FILES['foto_siswa']['name'];
  $x = explode('.', $foto_siswa);
  $ekstensi = strtolower(end($x));
  $ukuran_sampul = $_FILES['foto_siswa']['size'];
  $file_tmp = $_FILES['foto_siswa']['tmp_name'];

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran_sampul < 1044070) {
      move_uploaded_file($file_tmp, '../img/siswa/' . $foto_siswa);
      $query = mysqli_query($koneksi, "INSERT INTO siswa (nisn, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_hp, foto_siswa) VALUES ('$nisn','$nama_siswa','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat','$no_hp','$foto_siswa')");
      if ($query) {
        echo "<script>window.location = 'index.php?dashboard=data-siswa&notif=add-berhasil';</script>";
      } else {
        echo 'GAGAL MENGUPLOAD GAMBAR';
      }
    } else {
      echo "<script>window.location = 'index.php?dashboard=data-siswa&aksi=tambah-data-berhasil';</script>";
    }
  } else {
  }
}

?>

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">

          <div class="col-10">
            <h4 class="card-title">Tambah Data Siswa</h4>
          </div>
          <div class="col-2">
            <a href="index.php?dashboard=data-siswa"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">back</button></a>
          </div>
        </div>
        <div class="table-responsive">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nisn" class="form-label">NISN</label>
              <input type="text" id="nisn" name="nisn" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="nama_siswa" class="form-label">Nama Siswa</label>
              <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <select name="jenis_kelamin" id="" class="form-select" required>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
              <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="tanggal_lahir" class="form-label">Tanggal</label>
              <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" id="alamat" name="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="no_hp" class="form-label">No HP</label>
              <input type="text" id="no_hp" name="no_hp" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="foto_siswa" class="form-label">Foto Siswa</label>
              <input type="file" id="foto_siswa" name="foto_siswa" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">SIMPAN</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>