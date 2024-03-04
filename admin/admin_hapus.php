<?php
session_start();
include "../db/koneksi.php";

$id_admin = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin='$id_admin' ");

if ($query) {
    $_SESSION['success'] = "Data Berhasil Dihapus";
    header('location: index.php?dashboard=admin');
}
