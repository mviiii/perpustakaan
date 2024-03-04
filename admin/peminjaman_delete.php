<?php
include "../db/koneksi.php";

$id_peminjaman = $_GET['id_peminjaman'];

$query = mysqli_query($koneksi, "DELETE FROM detail_peminjaman WHERE peminjaman_id='$id_peminjaman'");

if ($query) {
  mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_peminjaman='$id_peminjaman'");
  $_SESSION['success'] = "Data Berhasil Dihapus";
  header('location: index.php?dashboard=peminjaman-list&notif=delete-berhasil');
}
