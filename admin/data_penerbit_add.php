<?php
include "../db/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_penerbit = $_POST['nama_penerbit'];
  $kota = $_POST['kota'];

  $query = mysqli_query($koneksi, "INSERT INTO penerbit (nama_penerbit, kota) VALUES ('$nama_penerbit', '$kota')");

  if ($query) {
    echo "<script>
        window.location ='?dashboard=data-penerbit&aksi=tambah-data-berhasil';
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
            <h4 class="card-title">Form Tambah Data Penerbit</h4>
          </div>
          <div class="col-2">
            <a href="index.php?dashboard=data-penulis"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">back</button></a>

          </div>
        </div>

        <div class="table-responsive">
          <form action="" method="post">
            <div class="mb-3">
              <label for="nama_penerbit" class="form-label">Nama Penerbit</label>
              <input type="text" id="nama_penerbit" name="nama_penerbit" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="kota" class="kota">Kota</label>
              <input type="text" id="kota" name="kota" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">SIMPAN</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>