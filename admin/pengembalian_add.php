<?php
session_start();
include "../db/koneksi.php";
if (isset($_GET['id_peminjaman'])) {
    $id_peminjaman = $_GET['id_peminjaman'];
    $admin_id = $_SESSION['id_admin'];
    // ambil data peminjaman
    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN detail_peminjaman ON peminjaman.id_peminjaman = detail_peminjaman.peminjaman_id INNER JOIN buku ON detail_peminjaman.buku_id = buku.id_buku WHERE id_peminjaman = '$id_peminjaman'");
    $data = mysqli_fetch_assoc($query);
    $tgl_kembali = date_create();
    $tanggal_kembali_buku = date('Y-m-d');
    $tgl_harus_kembali = date_create($data['tgl_harus_kembali']);
    $status_pinjam = 'kembali';
    $banyakhari = 0;
    if ($tgl_kembali > $tgl_harus_kembali) {
        $selisih_tanggal_kembali = date_diff($tgl_kembali, $tgl_harus_kembali);
        $banyakhari = $selisih_tanggal_kembali->days;
    }
    $denda = $banyakhari * 1000;
    // insert ke table pengembalian
    $tambah_pengembalian = mysqli_query($koneksi, "INSERT INTO pengembalian (peminjaman_id, tgl_kembali, admin_id, denda) VALUES ('$id_peminjaman', '$tanggal_kembali_buku', '$admin_id', '$denda')");
    if ($tambah_pengembalian) {
        // update jumlah buku
        $update_jumlah_buku = $data['jumlah_pinjam'] + $data['jumlah'];
        $update_buku = mysqli_query($koneksi, "UPDATE buku SET jumlah = '$update_jumlah_buku' WHERE id_buku = '$data[buku_id]'");

        // update status peminjaman
        $update_status = mysqli_query($koneksi, "UPDATE peminjaman SET status_pinjam = '$status_pinjam' WHERE id_peminjaman = '$id_peminjaman'");

        echo "<script>window.location ='index.php?dashboard=peminjaman-list&notif=kembalikan-berhasil';</script>";
    }
}
