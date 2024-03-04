<?php
include '../db/koneksi.php';

?>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">

          <div class="col-10">
            <h4 class="card-title">Data Penerbit</h4>
          </div>
          <div class="col-2">
            <a href="?dashboard=data-penerbit-add"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">add +</button></a>

          </div>
        </div>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Penerbit</th>
                <th>Kota</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            $queri = mysqli_query($koneksi, "SELECT * FROM penerbit");
            while ($row = $queri->fetch_assoc()) {
            ?>
              <tbody>

                <tr>
                  <td><?php echo $row['nama_penerbit'] ?></td>
                  <td><?php echo $row['kota'] ?></td>
                  <td>
                    <a href="?dashboard=data-penerbit-edit&id=<?php echo $row['id_penerbit'] ?>">
                      <button class="btn btn-info btn-rounded btn-icon text-decoration-none">
                        <i class="mdi mdi-lead-pencil"></i>
                      </button>
                    </a>
                    <a href="data_penerbit_delete.php?id=<?php echo $row['id_penerbit'] ?>" onclick="confirmationDelete(event)">
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
  function hapus_penerbit() {
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