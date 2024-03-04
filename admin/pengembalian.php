<?php
include '../db/koneksi.php';

?>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">

          <div class="col-10">
            <h4 class="card-title">Pengembalian</h4>
          </div>

        </div>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>tanggal kembali</th>
                <th>admin</th>
                <th>denda</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            $queri = mysqli_query($koneksi, "SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.peminjaman_id = peminjaman.id_peminjaman INNER JOIN admin ON pengembalian.admin_id = admin.id_admin INNER JOIN detail_peminjaman ON peminjaman.id_peminjaman = detail_peminjaman.peminjaman_id INNER JOIN buku ON detail_peminjaman.buku_id = buku.id_buku INNER JOIN siswa ON peminjaman.siswa_id = siswa.id_siswa");
            ?>
            <?php while ($row = $queri->fetch_assoc()) { ?>
              <tbody>
                <tr>
                  <td><?php echo $row['id_kembali'] ?></td>
                  <td><?php echo $row['nama_siswa'] ?></td>
                  <td><?php echo $row['tgl_kembali'] ?></td>
                  <td><?php echo $row['nama_lengkap'] ?></td>
                  <td><?php echo $row['denda'] ?></td>
                  <td>
                    <a href="pengembalian_delete.php?id=<?php echo $row['id_kembali'] ?>" onclick="confirmationDelete(event)">
                      <button class="btn btn-danger btn-icon">
                        <i class="mdi mdi-delete-variant"></i>
                      </button>
                    </a>
                  </td>
                </tr>
              </tbody>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>