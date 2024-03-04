<?php
include "../db/koneksi.php";

$id_kembali = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM pengembalian WHERE id_kembali='$id_kembali'");

if ($query) {
    echo "<script>
    window.location = 'index.php?dashboard=pengembalian&aksi=tambah-data-berhasil';
</script>";
}
