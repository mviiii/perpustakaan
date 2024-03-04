<?php
include '../db/koneksi.php';

?>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-10">
            <h4 class="card-title">List Buku</h4>
          </div>
          <div class="col-2">
            <a href="index.php?dashboard=data-buku-add"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">add +</button></a>
          </div>
        </div>


        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>Tahun Terbit</th>
                <th>Sinopsis</th>
                <th>Jumlah</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            $no = 1;
            $queri = mysqli_query($koneksi, "SELECT foto_sampul, judul, isbn, nama_penulis, nama_penerbit, nama_kategori, tahun_terbit, sinopsis, jumlah, id_buku FROM buku INNER JOIN penulis ON buku.penulis_id = penulis.id_penulis INNER JOIN penerbit ON buku.penerbit_id = penerbit.id_penerbit INNER JOIN kategori ON buku.kategori_id = kategori.id_kategori");
            while ($row = $queri->fetch_assoc()) {
            ?>
              <tbody>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="../img/buku/<?php echo $row['foto_sampul']; ?>" alt="" style="width: 56px; height: 56px ; object-fit: cover;" class="rounded-circle shadow-sm" />
                      <div class="ms-3">
                        <p class="fw-bold mb-1"><?php echo $row['judul']; ?></p>
                        <p class="text-muted mb-0"><?php echo $row['isbn']; ?></p>
                      </div>
                    </div>
                  </td>
                  <td><?php echo $row['nama_penulis']; ?></td>
                  <td><?php echo $row['nama_penerbit']; ?></td>
                  <td><?php echo $row['nama_kategori']; ?></td>
                  <td><?php echo $row['tahun_terbit']; ?></td>
                  <td>
                    <?php echo mb_strimwidth($row['sinopsis'], 0, 20, "..."); ?></td>
                  <td><?php echo $row['jumlah']; ?></td>
                  <td>
                    <a href="?dashboard=data-buku-edit&id=<?php echo $row['id_buku']; ?>">
                      <button class="btn btn-info btn-icon text-decoration-none">
                        <i class="mdi mdi-lead-pencil"></i>
                      </button>
                    </a>
                    <a href="data_buku_delete.php?id=<?php echo $row['id_buku'] ?>" onclick="confirmationDelete(event)">
                      <button class="btn btn-danger btn-icon">
                        <i class="mdi mdi-delete-variant"></i>
                      </button>
                    </a>
                  </td>
                </tr>

              </tbody>
            <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SWEET ALERT NOTIFKATION -->
<?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') : ?>
  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
      Swal.fire({
        icon: "success",
        title: "Data berhasil dihapus",
        showConfirmButton: false,
        timer: 2200
      });
    });
  </script>
  <?php unset($_SESSION['success']) ?>
<?php endif ?>
<!-- SWEET ALERT NOTIFKATION -->

<!-- ALERT HAPUS -->
<script type="text/javascript">
  function hapus_admin() {
    var link = document.getElementById('hapusbutton').value
    const swalButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success m-2",
        cancelButton: "btn btn-danger m-2"
      },
      buttonsStyling: false
    });
    swalButtons.fire({
      title: "Apakah Kamu yakin akan menghapusnya?",
      text: "Data yang terhapus tidak bisa dikembalikan!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yaa, hapus saja!",
      cancelButtonText: "Gak jadi deh hehe ",
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = link
      }
    });
  }
</script>
<!-- ALERT HAPUS -->