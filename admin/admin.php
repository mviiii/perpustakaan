<?php include "../db/koneksi.php"; ?>

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">

        <div class="row">
          <div class="col-10">
            <h4 class="card-title">List Admin</h4>
          </div>
          <div class="col-2">
            <a href="index.php?dashboard=admin-add"><button class="decoration-none btn btn-primary px-4 py-2 mr-auto font-weight-bold ">add +</button></a>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th> Nama Lengkap </th>
                <th> Username </th>
                <th> Password </th>
                <th> More </th>

              </tr>
            </thead>
            <?php
            $no = 1;
            $queri = mysqli_query($koneksi, "SELECT * FROM admin");
            while ($a = $queri->fetch_assoc()) {
            ?>
              <tbody>
                <tr>
                  <th><?php echo $no++ ?></th>
                  <td><?php echo $a['nama_lengkap'] ?></td>
                  <td><?php echo $a['username'] ?></td>
                  <td><?php echo $a['password'] ?></td>
                  <td>
                    <a href="index.php?dashboard=admin-edit&id=<?php echo $a['id_admin'] ?>">
                      <button class="btn btn-info btn-icon text-decoration-none">
                        <i class="mdi mdi-lead-pencil"></i>
                      </button>
                    </a>
                    <a href="admin_hapus.php?id=<?php echo $a['id_admin'] ?>" onclick="confirmationDelete(event)">
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