<?php
include "../db/koneksi.php";
$id = $_GET['id'];

$pilih = mysqli_query($koneksi, " SELECT * FROM penerbit WHERE id_penerbit='$id'");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_penerbit = $_POST['nama_penerbit'];
    $kota = $_POST['kota'];


    $query = mysqli_query($koneksi, "UPDATE penerbit SET nama_penerbit='$nama_penerbit', kota='$kota' WHERE id_penerbit='$id'");
    if ($query) {
        echo "<script>window.location = 'index.php?dashboard=data-penerbit&aksi=tambah-data-berhasil';</script>";
    }
}
?>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-10">
                        <h4 class="card-title">penerbit</h4>
                    </div>
                    <div class="col-2">
                        <a href="index.php?dashboard=data-penulis"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">back</button></a>

                    </div>
                </div>

                <div class="table-responsive">
                    <form action="" method="post">

                        <h1>Edit penerbit</h1>
                        <form action="" method="post">
                            <?php
                            while ($data = mysqli_fetch_array($pilih)) {
                            ?>
                                <div class="mb-3">
                                    <label for="nama_penerbit" class="form-label">nama_penerbit</label>
                                    <input type="text" id="nama_penerbit" name="nama_penerbit" class="form-control" value="<?php echo $data['nama_penerbit'] ?>">
                                    <label for="kota" class="form-label">kota</label>
                                    <input type="text" id="kota" name="kota" class="form-control" value="<?php echo $data['kota'] ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            <?php } ?>
                        </form>
                </div>