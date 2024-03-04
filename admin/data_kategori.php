<?php
include '../db/koneksi.php';

?>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">

          <div class="col-10">
            <h3 class="card-title">Data Kategori Buku</h3>
          </div>
          <div class="col-2">
            <a href="?dashboard=data-kategori-add"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">add +</button></a>

          </div>
        </div>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            $queri = mysqli_query($koneksi, "SELECT * FROM kategori");
            while ($row = $queri->fetch_assoc()) {
            ?>
              <tbody>
                <tr>
                  <td><?php echo $row['nama_kategori'] ?></td>
                  <td>
                    <a href="?dashboard=data-kategori-edit&id=<?php echo $row['id_kategori'] ?>">
                      <button class="btn btn-info btn-icon text-decoration-none">
                        <i class="mdi mdi-lead-pencil"></i>
                      </button>
                    </a>
                    <a href="data_kategori_delete.php?id=<?php echo $row['id_kategori'] ?>" onclick="confirmationDelete(event)">
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