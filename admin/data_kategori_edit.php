<?php
include "../db/koneksi.php";
$id = $_GET['id'];

$pilih = mysqli_query($koneksi, " SELECT * FROM kategori");
$data = mysqli_fetch_assoc($pilih);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_kategori = $_POST['nama_kategori'];

  $query = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id'");

  if ($query) {
    echo "<script>
        window.location = '?dashboard=data-kategori&aksi=hapus-berhasil';
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
            <h4 class="card-title">Edit Kategori <?php echo $data['nama_kategori'] ?></h4>
          </div>
          <div class="col-2">
            <a href="index.php?dashboard=data-penulis"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">back</button></a>

          </div>
        </div>

        <div class="table-responsive">
          <form action="" method="post">

            <div class="mb-3">
              <label for="nama_kategori" class="form-label">Nama Kategori</label>
              <input type="text" id="nama_kategori" value="<?php echo $data['nama_kategori'] ?>" name="nama_kategori" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>