<?php
include '../db/koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export-data-penulis.xls");
?>
<table class="table" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Penulis</th>
            <th>Nama Penulis</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    $queri = mysqli_query($koneksi, "SELECT * FROM penulis");
    while ($row = $queri->fetch_assoc()) {
    ?>
        <tbody>

            <tr>
                <td><?php echo $no++; ?></td>
                <td>
                </td>
                <td><?php echo $row['id_penulis']; ?></td>
                <td><?php echo $row['nama_penulis']; ?></td>
            </tr>

        </tbody>
    <?php
    }
    ?>
</table>