<?php
include '../db/koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export-data-buku.xls");
?>
<table class="table" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Id buku</th>
            <th>Isbn</th>
            <th>Judul</th>
            <th>Penulis Id</th>
            <th>Penerbit Id</th>
            <th>Kategodi Id</th>
            <th>Tahun Terbit</th>
            <th>sinopsis</th>
            <th>Jumlah</th>
            <th>Foto Sampul</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    $queri = mysqli_query($koneksi, "SELECT * FROM buku");
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
                <td><?php echo $row['id_buku']; ?></td>
                <td><?php echo $row['isbn']; ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['penulis_id']; ?></td>
                <td><?php echo $row['penerbit_id']; ?></td>
                <td><?php echo $row['kategori_id']; ?></td>
                <td><?php echo $row['tahun_terbit']; ?></td>
                <td><?php echo $row['sinopsis']; ?></td>
                <td><?php echo $row['jumlah']; ?></td>
                <td><?php echo $row['foto_sampul']; ?></td>
            </tr>

        </tbody>
    <?php
    }
    ?>
</table>