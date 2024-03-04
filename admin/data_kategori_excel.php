<?php
include '../db/koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export-data-kategori.xls");
?>
<table class="table" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Id kategori</th>
            <th>Nama kategori</th>

        </tr>
    </thead>
    <?php
    $no = 1;
    $queri = mysqli_query($koneksi, "SELECT * FROM kategori");
    while ($row = $queri->fetch_assoc()) {
    ?>
        <tbody>

            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_kategori']; ?></td>
                <td><?php echo $row['nama_kategori']; ?></td>
            </tr>

        </tbody>
    <?php
    }
    ?>
</table>