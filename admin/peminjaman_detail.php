<?php
include "../db/koneksi.php";
$id = $_GET['id'];

$pilih = mysqli_query($koneksi, " SELECT * FROM peminjaman INNER JOIN detail_peminjaman ON peminjaman.id_peminjaman = detail_peminjaman.peminjaman_id INNER JOIN buku ON detail_peminjaman.buku_id = buku.id_buku INNER JOIN siswa ON peminjaman.siswa_id = siswa.id_siswa WHERE peminjaman.id_peminjaman = '$id'");

$data = mysqli_fetch_assoc($pilih);

?>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <h4 class="card-title">Detail Peminjaman</h4>
                <a href="index.php?dashboard=peminjaman-list" class="btn btn-primary"><span class="mdi mdi-skip-backward"> Kembali</span></a>
            </div>
        </div>
    </div>
    <div class="col-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <img src="../img/buku/<?php echo $data['foto_sampul']; ?>" alt="" style=" width:100%; object-fit: cover;" />
            </div>
        </div>
    </div>
    <div class="col-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="card-heading">
                    <h4 class="card-title">Data Buku</h4>
                    <hr>
                </div>
                <p class="fw-bold">Judul Buku : <?php echo $data['judul']; ?></p>
                <p class="">ISBN : <?php echo $data['isbn']; ?></p>
                <p>Sinopsis :</p>
                <p>
                    <?php echo $data['sinopsis']; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Peminjam</h4>
                <hr>
                <div class="row mb-4">
                    <div class="d-flex align-items-center">
                        <img src="../img/siswa/<?php echo $data['foto_siswa']; ?>" alt="" style="width: 80px; height: 80px ; object-fit: cover;" class="rounded-circle shadow-sm" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1"><?php echo $data['nisn']; ?></p>
                            <p class="text-muted mb-0"><?php echo $data['nama_siswa']; ?></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <p>Tanggal Pinjam : <?php echo $data['tgl_pinjam']; ?></p>
                        <p>Tanggal Harus Kembali : <?php echo $data['tgl_harus_kembali']; ?></p>
                        <p>Jumlah Pinjam : <?php echo $data['jumlah_pinjam']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>