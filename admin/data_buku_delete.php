<?php
include "../db/koneksi.php";

$id_buku = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$id_buku'");

if ($query) {
    echo "<script>
    window.location = 'index.php?dashboard=data-buku&aksi=tambah-data-berhasil';
</script>";
}
