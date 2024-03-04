<?php
include "../db/koneksi.php";

$id_penulis = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM penulis WHERE id_penulis='$id_penulis'");

if ($query) {
    echo "<script>
    window.location = 'index.php?dashboard=data-penulis&aksi=tambah-data-berhasil';
    </script>";
}
