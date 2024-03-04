<?php
include "../db/koneksi.php";
$id = $_GET['id'];

$pilih = mysqli_query($koneksi, " SELECT * FROM peminjaman");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nisn = $_POST['nisn'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_harus_kembali = $_POST['tgl_harus_kembali'];
  $id_admin = $_POST['id_admin'];
  $status_pinjam = $_POST['status_pinjam'];

  $query = mysqli_query($koneksi, "UPDATE peminjam SET id='$id', nisn='$nisn', tgl_pinjam='$tgl_pinjam', tgl_harus_kembali='$tgl_harus_kembali', id_admin='$id_admin', status_pinjam='$status_pinjam' WHERE id_peminjaman='$id'");

  if ($query) {
    header("location:peminjaman.php?aski=edit_berhasil");
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menambah Karyawan</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <h1>Edit Peminjaman</h1>
      <form action="" method="post">
        <?php
        while ($data = mysqli_fetch_array($pilih)) {
        ?>
          <div class="mb-3">
            <label for="nisn" class="form-label">nisn</label>
            <input type="text" id="nisn" name="nisn" class="form-control" value="<?php echo $data['nisn'] ?>">
          </div>
          <div class="mb-3">
            <label for="tgl_pinjam" class="tgl_pinjam">tgl_pinjam</label>
            <input type="text" id="tgl_pinjam" name="tgl_pinjam" class="form-control" value="<?php echo $data['tgl_pinjam'] ?>">
          </div>
          <div class="mb-3">
            <label for="tgl_harus_kembali" class="form-label">tgl_harus_kembali</label>
            <input type="text" id="itgl_harus_kembali" name="tgl_harus_kembali" class="form-control" value="<?php echo $data['tgl_harus_kembali'] ?>">
          </div>
          <div class="mb-3">
            <label for="id_admint" class="form-label">id_admin</label>
            <input type="text" id="id_admin" name="id_admin" class="form-control" value="<?php echo $data['id_admin'] ?>">
          </div>
          <div class="mb-3">
            <label for="status_pinjami" class="form-label">status_pinjam</label>
            <input type="text" id="status_pinjam" name="status_pinjami" class="form-control" value="<?php echo $data['status_pinjam'] ?>">
          </div>
          <button type="submit" class="btn btn-primary">SIMPAN</button>
        <?php } ?>
      </form>
    </div>
  </div>
</body>

</html>