<?php
include '../db/koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export-data-peminjaman.xls");
?>
<table class="table" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Buku</th>
            <th>siswa</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    $queri = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN detail_peminjaman ON peminjaman.id_peminjaman = detail_peminjaman.peminjaman_id INNER JOIN buku ON detail_peminjaman.buku_id = buku.id_buku INNER JOIN siswa ON peminjaman.siswa_id = siswa.id_siswa");
    while ($row = $queri->fetch_assoc()) {
    ?>
        <tbody>

            <tr>
                <td><?php echo $no++; ?></td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="img/buku/<?php echo $row['foto_sampul']; ?>" alt="" style="width: 56px; height: 56px ; object-fit: cover;" class="rounded-circle shadow-sm" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1"><?php echo $row['judul']; ?></p>
                            <p class="text-muted mb-0"><?php echo $row['isbn']; ?></p>
                        </div>
                    </div>
                </td>
                <td><?php echo $row['nama_siswa']; ?></td>
                <td><?php echo $row['tgl_pinjam']; ?></td>
                <td><?php echo $row['tgl_harus_kembali']; ?></td>
                <td><?php echo $row['jumlah_pinjam']; ?></td>
                <td><?php echo $row['status_pinjam']; ?></td>
            </tr>

        </tbody>
    <?php
    }
    ?>
</table>