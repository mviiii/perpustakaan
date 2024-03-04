<?php
include '../db/koneksi.php';

?>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">

          <div class="col-10">
            <h4 class="card-title">Data Penulis</h4>
          </div>
          <div class="col-2">
            <a href="index.php?dashboard=data-penulis-add"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">add +</button></a>

          </div>
        </div>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Penulis</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            $queri = mysqli_query($koneksi, "SELECT * FROM penulis");
            while ($row = $queri->fetch_assoc()) {
            ?>
              <tbody>

                <tr>
                  <td><?php echo $row['id_penulis'] ?></td>
                  <td><?php echo $row['nama_penulis'] ?></td>
                  <td>
                    <a href="?dashboard=data-penulis-edit&id=<?php echo $row['id_penulis'] ?>">
                      <button class="btn btn-info btn-icon text-decoration-none">
                        <i class="mdi mdi-lead-pencil"></i>
                      </button>
                    </a>
                    <a href="data_penulis_delete.php?id=<?php echo $row['id_penulis'] ?>" onclick="confirmationDelete(event)">
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