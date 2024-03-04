<?php
include "../db/koneksi.php";
$id = $_GET['id_buku'];

$pilih = mysqli_query($koneksi, " SELECT * FROM buku WHERE id_buku=$id");

?>
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Buku</h4>
            <div class="row">
                <?php
                $no = 1;
                while ($row = $pilih->fetch_assoc()) {
                ?>
                    <div class="col-md-4">
                        <img src="../img/buku/<?php echo $row['foto_sampul']; ?>" alt="" style=" width:300px; object-fit: cover;" />
                    </div>
                    <div class="col-md-4">
                        <h4 class="card-title"><?php echo $row['judul']; ?></h4>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>