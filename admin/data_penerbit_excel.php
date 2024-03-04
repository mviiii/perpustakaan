<?php
include '../db/koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export-data-penerbit.xls");
?>
<table class="table" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Penerbit</th>
            <th>Nama Penerbit</th>
            <th>Kota</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    $queri = mysqli_query($koneksi, "SELECT * FROM penerbit");
    while ($row = $queri->fetch_assoc()) {
    ?>
        <tbody>

            <tr>
                <td><?php echo $no++; ?></td>
                <td>
                </td>
                <td><?php echo $row['id_penerbit']; ?></td>
                <td><?php echo $row['nama_penerbit']; ?></td>
                <td><?php echo $row['kota']; ?></td>
            </tr>

        </tbody>
    <?php
    }
    ?>
</table>