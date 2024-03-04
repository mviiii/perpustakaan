<?php
include '../db/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $ekstensi_diperbolehkan = ['png', 'jpg'];
  $isbn = $_POST['isbn'];
  $judul = $_POST['judul'];
  $penulis_id = $_POST['penulis_id'];
  $penerbit_id = $_POST['penerbit_id'];
  $kategori_id = $_POST['kategori_id'];
  $tahun_terbit = $_POST['tahun_terbit'];
  $sinopsis = $_POST['sinopsis'];
  $jumlah = $_POST['jumlah'];
  $nama_sampul = $_FILES['foto_sampul']['name'];
  $x = explode('.', $nama_sampul);
  $ekstensi = strtolower(end($x));
  $ukuran_sampul = $_FILES['foto_sampul']['size'];
  $file_tmp = $_FILES['foto_sampul']['tmp_name'];

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran_sampul < 1044070) {
      move_uploaded_file($file_tmp, '../img/buku/' . $nama_sampul);
      $query = mysqli_query($koneksi, "INSERT INTO buku (isbn, judul, penulis_id, penerbit_id, kategori_id, tahun_terbit, sinopsis, jumlah, foto_sampul) VALUES ('$isbn','$judul','$penulis_id','$penerbit_id','$kategori_id','$tahun_terbit','$sinopsis','$jumlah','$nama_sampul')");
      if ($query) {
        echo "<script>window.location = 'index.php?dashboard=data-buku&notif=add-berhasil';</script>";
      } else {
        echo 'GAGAL MENGUPLOAD GAMBAR';
      }
    } else {
      echo "<script>window.location = 'index.php?dashboard=data-buku&aksi=tambah-data-berhasil';</script>";
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
            <h4 class="card-title">Buku</h4>
          </div>
          <div class="col-2">
            <a href="index.php?dashboard=data-buku"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">back</button></a>

          </div>
        </div>

        <div class="table-responsive">
          <!-- NOTIFIKASI -->
          <?php if (isset($_GET['notif'])) : ?>
            <?php if ($_GET['notif'] == "add-berhasil") : ?>
              <div class="alert alert-success">
                <span><b> Success - </b> Data Berhasil Ditambahkan !</span>
              </div>
            <?php endif; ?>
            <?php if ($_GET['notif'] == "edit-berhasil") : ?>
              <div class="alert alert-success">
                <span><b> Success - </b> Data Berhasil Diedit !</span>
              </div>
            <?php endif; ?>
            <?php if ($_GET['notif'] == "delete-berhasil") : ?>
              <div class="alert alert-success">
                <span><b> Success - </b> Data Berhasil Dihapus !</span>
              </div>
            <?php endif; ?>
          <?php endif; ?>
          <!-- NOTIFIKASI -->
          <div class="row">

          </div>

          <div class="table-responsive">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="judul" class="judul">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="penulis_id" class="form-label">Penulis</label>
                <?php $penulis = mysqli_query($koneksi, "SELECT * FROM penulis"); ?>
                <?php if (mysqli_num_rows($penulis) > 0) : ?>
                  <select name="penulis_id" class="form-select">
                    <?php while ($data_penulis = mysqli_fetch_array($penulis)) : ?>
                      <option value="<?php echo $data_penulis['id_penulis'] ?>">
                        <?php echo $data_penulis['nama_penulis'] ?>
                      </option>
                    <?php endwhile ?>
                  </select>
                <?php else : ?>
                  <select name="penulis_id" class="form-select">
                    <option value="index.php?dashboard=data-penulis-add">
                      Penulis tidak Ada, Silahkan Untuk Menambahkan data Penulis Terlebihdahulu
                    </option>
                  </select>
                  <div class="form-text mt-2">
                    <a href="?dashboard=data-penulis-add" class="text-decoration-none font-weight-bold">Klik disini</a>, untuk menambah penulis
                  </div>
                <?php endif ?>
              </div>
              <div class="mb-3">
                <label for="id_penerbit" class="form-label">Penerbit</label>
                <?php $penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit"); ?>
                <?php if (mysqli_num_rows($penerbit) > 0) : ?>
                  <select name="penerbit_id" class="form-select">
                    <?php while ($data_penerbit = mysqli_fetch_array($penerbit)) : ?>
                      <option value="<?php echo $data_penerbit['id_penerbit'] ?>">
                        <?php echo $data_penerbit['nama_penerbit'] ?>
                      </option>
                    <?php endwhile ?>
                  </select>
                <?php else : ?>
                  <select name="penulis_id" class="form-select">
                    <option>
                      Penerbit tidak Ada, Silahkan Untuk Menambahkan data Penerbit Terlebih dahulu
                    </option>
                  </select>
                  <div class="form-text mt-2">
                    <a href="?dashboard=data-penerbit-add" class="text-decoration-none font-weight-bold">Klik disini</a>, untuk menambah penerbit
                  </div>
                <?php endif ?>
              </div>
              <div class="mb-3">
                <label for="id_kategori" class="form-label">Kategori</label>
                <?php $kategori = mysqli_query($koneksi, "SELECT * FROM kategori"); ?>
                <?php if (mysqli_num_rows($kategori) > 0) : ?>
                  <select name="kategori_id" class="form-select">
                    <?php while ($data_kategori = mysqli_fetch_array($kategori)) : ?>
                      <option value="<?php echo $data_kategori['id_kategori'] ?>">
                        <?php echo $data_kategori['nama_kategori'] ?>
                      </option>
                    <?php endwhile ?>
                  </select>
                <?php else : ?>
                  <select name="kategori_id" class="form-select">
                    <option>
                      Kategori tidak Ada, Silahkan Untuk Menambahkan data kategori terlebihdahulu
                    </option>
                  </select>
                  <div class="form-text mt-2">
                    <a href="?dashboard=data-kategori-add" class="text-decoration-none font-weight-bold">Klik disini</a>, untuk menambah kategori
                  </div>
                <?php endif ?>
              </div>
              <div class=" mb-3">
                <label for="tanggal" class="form-label">Tahun Terbit</label>
                <input name="tahun_terbit" class="form-control" type="number" min="1900" max="2100" placeholder="2020" required>
              </div>
              <div class="mb-3">
                <label for="sinopsis" class="form-label">sinopsis</label>
                <input type="text" id="sinopsis" name="sinopsis" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="jumlah" class="form-label">jumlah</label>
                <div class="invalid-feedback">
                  Looks good!
                </div>
                <input type="text" id="jumlah" name="jumlah" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="foto_sampul" class="form-label">Foto Sampul</label>
                <input type="file" id="foto_sampul" name="foto_sampul" class="form-control" required accept="image/*">
              </div>
              <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function handleSelect(elm) {
    window.location = elm.value;
  }
</script>