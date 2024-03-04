<?php
include '../db/koneksi.php';

?>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-4">

          <div class="col-10">
            <h4 class="card-title">Tambah Peminjaman Baru</h4>
          </div>
          <div class="col-2">


          </div>
        </div>

        <div class="table-responsive">
          <div class="table-responsive">
            <table class="table">
              <thead class="table-primary">
                <tr>
                  <th>No</th>
                  <th>Buku</th>
                  <th>Penulis</th>
                  <th>Sinopsis</th>
                  <th>Jumlah</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <?php
              $no = 1;
              $queri = mysqli_query($koneksi, "SELECT * FROM buku INNER JOIN penulis ON buku.penulis_id = penulis.id_penulis");
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
                    <td><?php echo mb_strimwidth($row['sinopsis'], 0, 20, "..."); ?></td>
                    <td><?php echo $row['jumlah']; ?></td>
                    <td>
                      <a href="pustakawan.php?url=peminjaman-add&id-buku=<?php echo $row['id_buku']; ?>"><button class="decoration-none btn-primary px-4 py-2 mr-auto font-weight-bold ">Pinjam</button></a>

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
</div>