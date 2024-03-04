<?php
include "../db/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_buku = $_GET['id-buku'];

  // cek jumlah buku
  $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
  $buku = mysqli_fetch_assoc($query);

  $id_buku = $_GET['id-buku'];
  $siswa_id = $_POST['siswa_id'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_harus_kembali = date('Y-m-d', strtotime($tgl_pinjam . '+7 days'));
  $admin_id = $_SESSION['id_admin'];
  $jumlah_pinjam = $_POST['jumlah_pinjam'];

  if ($buku['jumlah'] >= $jumlah_pinjam) {
    $selisih_buku = $buku['jumlah'] - $jumlah_pinjam;
    $query = mysqli_query($koneksi, "INSERT INTO peminjaman (siswa_id, tgl_pinjam, tgl_harus_kembali, admin_id, status_pinjam) VALUES ('$siswa_id', '$tgl_pinjam', '$tgl_harus_kembali', '$admin_id', 'pinjam')");
    if ($query) {

      $id_peminjaman = mysqli_insert_id($koneksi);
      mysqli_query($koneksi, "INSERT INTO detail_peminjaman (peminjaman_id, buku_id, jumlah_pinjam) VALUES ('$id_peminjaman', '$id_buku', '$jumlah_pinjam')");

      // update jumlah buku
      mysqli_query($koneksi, "UPDATE buku SET jumlah = '$selisih_buku' WHERE id_buku = '$id_buku'");

      echo "<script>window.location ='index.php?dashboard=peminjaman&notif=add-berhasil';</script>";
    }
  } else {
    echo "<script>window.location ='?dashboard=peminjaman-add&id-buku=$id_buku&error=error';</script>";
  }
}
// if ($query) {
//   echo "<script>
//       window.location ='?dashboard=peminjaman&aksi=tambah-data-berhasil';
//   </sc>";
// }

?>


<div class="row">
  <div class="col-6 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-4">

          <div class="col-10">
            <h4 class="card-title">Buku</h4>
          </div>
        </div>

        <div class="table-responsive">
          <div class="table-responsive">
            <div class="row">
              <?php
              $id_buku = $_GET['id-buku'];
              $queri_buku = mysqli_query($koneksi, "SELECT id_buku,judul,nama_penulis,isbn, sinopsis,foto_sampul FROM buku INNER JOIN penulis ON buku.penulis_id=penulis.id_penulis WHERE id_buku='$id_buku'");
              $buku = mysqli_fetch_assoc($queri_buku);
              ?>
              <div class="col-6">
                <img src="../img/buku/<?php echo $buku['foto_sampul']; ?>" alt="" style="width: 100%; height: auto ; object-fit: cover;" class="rounded shadow-lg" />
              </div>
              <div class="col-6">
                <h2><?php echo $buku['judul'] ?></h2>
                <p><?php echo $buku['isbn'] ?></p>
                <hr>
                <p class="card-text text-justify line-height-1"><?php echo $buku['sinopsis'] ?></p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- KOLOM PEMINJAMAN -->
  <div class=" col-6 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-4">

          <div class="col-10">
            <h4 class="card-title">Peminjam</h4>
          </div>
          <div class="col-2">


          </div>
        </div>

        <div class="table-responsive">
          <form action="" method="post">
            <div class="mb-3">
              <label for="nama_siswa" class="form-label">Nama Siswa</label>
              <?php $select_siswa = "SELECT id_siswa, nama_siswa FROM siswa" ?>
              <?php $queri_siswa = mysqli_query($koneksi, $select_siswa) ?>
              <select name="siswa_id" id="" class="form-select">
                <?php while ($siswa = mysqli_fetch_array($queri_siswa)) : ?>
                  <option value="<?php echo $siswa['id_siswa'] ?>"><?php echo $siswa['nama_siswa'] ?></option>
                <?php endwhile ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="tanggal_lahir" class="form-label">Tanggal</label>
              <input type="date" id="tanggal_lahir" name="tgl_pinjam" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>
            <div class="mb-3">
              <label for="tanggal_lahir" class="form-label">Jumlah Pinjam</label>
              <input type="number" id="tanggal_lahir" name="jumlah_pinjam" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="?dashboard=peminjaman" class="btn btn-danger">KEMBALI</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>