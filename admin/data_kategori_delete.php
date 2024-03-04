<?php
include "../db/koneksi.php";

$id_kategori = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");

if ($query) {
  echo "<script>
    window.location = 'index.php?dashboard=data-kategori&aksi=tambah-data-berhasil';
</script>";
}
