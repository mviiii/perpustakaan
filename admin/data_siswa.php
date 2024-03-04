<?php
include '../db/koneksi.php';

?>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">

          <div class="col-10">
            <h4 class="card-title">List siswa</h4>
          </div>
          <div class="col-2">
            <a href="index.php?dashboard=data-siswa-add"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">Add +</button></a>

          </div>
        </div>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Langgal Lahir</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            if (isset($_GET['cari'])) {
              $cari = $_GET['cari'];
              $queri = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nama_siswa LIKE '%$cari%'");
            } else {
              $queri = mysqli_query($koneksi, "SELECT * FROM siswa");
            }

            while ($row = $queri->fetch_assoc()) {
            ?>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="../img/siswa/<?php echo $row['foto_siswa']; ?>" alt="" style="width: 56px; height: 56px ; object-fit: cover;" class="rounded-circle shadow-sm" />
                      <div class="ms-3">
                        <p class="fw-bold mb-1"><?php echo $row['nisn']; ?></p>
                        <p class="text-muted mb-0"><?php echo $row['nama_siswa']; ?></p>
                      </div>
                    </div>
                  </td>
                  <td><?php echo $row['jenis_kelamin'] ?></td>
                  <td><?php echo $row['tempat_lahir'] ?></td>
                  <td><?php echo $row['tanggal_lahir'] ?></td>
                  <td><?php echo $row['alamat'] ?></td>
                  <td><?php echo $row['no_hp'] ?></td>
                  <td>
                    <a href="?dashboard=data-siswa-edit&id=<?php echo $row['id_siswa'] ?>">
                      <button class="btn btn-info  btn-icon text-decoration-none">
                        <i class="mdi mdi-lead-pencil"></i>
                      </button>
                    </a>
                    <a href="data_siswa_delete.php?id=<?php echo $row['id_siswa'] ?>" onclick="confirmationDelete(event)">
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