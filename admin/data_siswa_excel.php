<?php
include '../db/koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export-data-siswa.xls");
?>
<table class="table" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Siswa</th>
            <th>Nisn</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Foto Siswa</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    $queri = mysqli_query($koneksi, "SELECT * FROM siswa");
    while ($row = $queri->fetch_assoc()) {
    ?>
        <tbody>

            <tr>
                <td><?php echo $no++; ?></td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="../img/siswa/<?php echo $row['foto_siswa']; ?>" alt="" style="width: 56px; height: 56px ; object-fit: cover;" class="rounded-circle shadow-sm" />
                    </div>
                    </div>
                </td>
                <td><?php echo $row['id_siswa']; ?></td>
                <td><?php echo $row['nisn']; ?></td>
                <td><?php echo $row['nama_siswa']; ?></td>
                <td><?php echo $row['jenis_kelamin']; ?></td>
                <td><?php echo $row['tempat_lahir']; ?></td>
                <td><?php echo $row['tanggal_lahir']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['no_hp']; ?></td>
                <td><?php echo $row['foto_siswa']; ?></td>
            </tr>

        </tbody>
    <?php
    }
    ?>
</table>