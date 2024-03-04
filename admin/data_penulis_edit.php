<?php
include "../db/koneksi.php";
$id = $_GET['id'];

$pilih = mysqli_query($koneksi, " SELECT * FROM  penulis WHERE id_penulis='$id'");
$data = mysqli_fetch_assoc($pilih);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_penulis = $_POST['nama_penulis'];

    $query = mysqli_query($koneksi, "UPDATE penulis SET nama_penulis='$nama_penulis' WHERE id_penulis='$id'");

    if ($query) {
        echo "<script>
        window.location = 'index.php?dashboard=data-penulis&aksi=tambah-data-berhasil';
    </script>";
    }
}
?>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-10">
                        <h4 class="card-title">penulis</h4>
                    </div>
                    <div class="col-2">
                        <a href="index.php?dashboard=data-penulis"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">back</button></a>

                    </div>
                </div>

                <div class="table-responsive">
                    <form action="" method="post">

                        <div class="mb-3">
                            <label for="nama_penulis" class="form-label">Nama Penulis</label>
                            <input type="text" id="nama_penulis" name="nama_penulis" class="form-control" required value="<?php echo $data['nama_penulis'] ?>">
                        </div>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
<form action="" method="post">
    <?php
    while ($data = mysqli_fetch_array($pilih)) {
    ?>
        <div class="mb-3">
            <label for="nama_penulis" class="form-label">nama_penulis</label>
            <input type="text" id="nama_penulis" name="nama_penulis" class="form-control" value="<?php echo $data['nama_penulis'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    <?php } ?>
</form>
</div>