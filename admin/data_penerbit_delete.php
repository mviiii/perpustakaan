<?php
include "../db/koneksi.php";

$id_penerbit = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM penerbit WHERE id_penerbit='$id_penerbit'");

if ($query) {
    echo "<script>
    window.location = 'index.php?dashboard=data-penerbit&aksi=tambah-data-berhasil';
</script>";
}
