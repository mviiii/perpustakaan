<?php
include "../db/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_penulis = $_POST['nama_penulis'];

    $query = mysqli_query($koneksi, "INSERT INTO penulis (nama_penulis) VALUES ('$nama_penulis')");

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
                            <input type="text" id="nama_penulis" name="nama_penulis" class="form-control" required>
                        </div>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>