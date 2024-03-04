<?php
include "../db/koneksi.php";
$id = $_GET['id'];

$pilih = mysqli_query($koneksi, " SELECT * FROM peminjaman WHERE id_peminjaman=$id");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_peminjaman = $_POST['id_peminjaman'];
  $siswa_id = $_POST['siswa_id'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_harus_kembali = $_POST['tgl_harus_kembali'];
  $admin_id = $_POST['admin_id'];
  $status_pinjam = $_POST['status_pinjamt'];

  $query = mysqli_query($koneksi, "UPDATE peminjaman SET  id_peminjaman='id_peminjaman', siswa_id='$siswa_id', tgl_pinjam='$tgl_pinjam', tgl_harus_kembali='$tgl_harus_kembali', admin_id='$admin_id',status_pinjam='$status_pinjam' WHERE id_peminjaman='$id'");

  if ($query) {
    echo "<script>
    window.location = 'index.php?dashboard=peminjaman&aksi=tambah-data-berhasil';
</script>";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menambah Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <h1>Edit Buku</h1>
      <form action="" method="post">
        <?php
        while ($data = mysqli_fetch_array($pilih)) {
        ?>
          <div class="mb-3">
            <label for="id_peminjaman" class="form-label">id_peminjaman</label>
            <input type="text" id="id_peminjaman" name="id_peminjaman" class="form-control" value="<?php echo $data['id_peminjaman'] ?>">
          </div>
          <div class="mb-3">
            <label for="siswa_id" class="siswa_id">siswa_id</label>
            <input type="text" id="siswa_id" name="siswa_id" class="form-control" value="<?php echo $data['siswa_id'] ?>">
          </div>
          <div class="mb-3">
            <label for="tgl_pinjam" class="form-label">tgl_pinjam</label>
            <input name="tanggal" class="form-control" type="date" placeholder="pilih tanggal" required>
          </div>
          <div class="mb-3">
            <label for="tgl_harus_kembali" class="form-label">tgl_harus_kembali</label>
            <input name="tanggal" class="form-control" type="date" placeholder="pilih tanggal" required>
          </div>
          <div class="mb-3">
            <label for="admin_id" class="form-label">admin_id</label>
            <input type="text" id="admin_id" name="admin_id" class="form-control" value="<?php echo $data['admin_id'] ?>">
          </div>
          <div class="mb-3">
            <label for="status_pinjam" class="form-label">status_pinjam</label>
            <input type="text" id="status_pinjam" name="status_pinjam" class="form-control" value="<?php echo $data['status_pinjam'] ?>">
          </div>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
  <?php } ?>
  </form>
  </div>
  </div>
</body>

</html>