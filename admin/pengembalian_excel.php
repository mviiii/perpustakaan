<?php
include '../db/koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export-data-pengembalian.xls");

?>
<table class="table" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Siswa</th>
            <th>tanggal kembali</th>
            <th>admin</th>
            <th>denda</th>
        </tr>
    </thead>
    <?php
    $queri = mysqli_query($koneksi, "SELECT * FROM pengembalian INNER JOIN peminjaman ON pengembalian.peminjaman_id = peminjaman.id_peminjaman INNER JOIN admin ON pengembalian.admin_id = admin.id_admin INNER JOIN detail_peminjaman ON peminjaman.id_peminjaman = detail_peminjaman.peminjaman_id INNER JOIN buku ON detail_peminjaman.buku_id = buku.id_buku INNER JOIN siswa ON peminjaman.siswa_id = siswa.id_siswa");
    while ($row = $queri->fetch_assoc()) {
    ?>
        <tbody>

            <tr>
                <td><?php echo $row['id_kembali'] ?></td>
                <td><?php echo $row['nama_siswa'] ?></td>
                <td><?php echo $row['tgl_kembali'] ?></td>
                <td><?php echo $row['nama_lengkap'] ?></td>
                <td><?php echo $row['denda'] ?></td>
            </tr>

        </tbody>
    <?php
    }
    ?>
</table>