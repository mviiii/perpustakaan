<?php
include "../db/koneksi.php";

$id_siswa = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");

if ($query) {
    echo "<script>
    window.location = 'index.php?dashboard=data-siswa&aksi=tambah-data-berhasil';
</script>";
}
