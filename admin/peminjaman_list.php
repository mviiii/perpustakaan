<?php
include '../db/koneksi.php';

?>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title">Data Peminjam Buku</h4>
                    </div>
                    <div class="col-2">
                        <a href="index.php?dashboard=peminjaman"><button class="decoration-none btn-gradient-primary px-4 py-2 mr-auto font-weight-bold ">add +</button></a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Buku</th>
                                <th>siswa</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        $queri = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN detail_peminjaman ON peminjaman.id_peminjaman = detail_peminjaman.peminjaman_id INNER JOIN buku ON detail_peminjaman.buku_id = buku.id_buku INNER JOIN siswa ON peminjaman.siswa_id = siswa.id_siswa WHERE peminjaman.status_pinjam = 'pinjam'");
                        while ($row = $queri->fetch_assoc()) {
                        ?>
                            <tbody>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../img/buku/<?php echo $row['foto_sampul']; ?>" alt="" style="width: 56px; height: 56px ; object-fit: cover;" class="rounded-circle shadow-sm" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1"><?php echo $row['judul']; ?></p>
                                                <p class="text-muted mb-0"><?php echo $row['isbn']; ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $row['nama_siswa']; ?></td>
                                    <td><?php echo $row['tgl_pinjam']; ?></td>
                                    <td><?php echo $row['tgl_harus_kembali']; ?></td>
                                    <td><?php echo $row['jumlah_pinjam']; ?></td>
                                    <td><?php echo $row['status_pinjam']; ?></td>
                                    <td>
                                        <a href="?dashboard=peminjaman-detail&id=<?php echo $row['id_peminjaman']; ?>">
                                            <button class="btn btn-warning btn-icon text-decoration-none">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        <button id="hapusbutton" class="btn btn-danger btn-icon" onclick="hapus()" value="peminjaman_delete.php?id_peminjaman=<?php echo $row['id_peminjaman'] ?>">
                                            <i class="mdi mdi-delete-variant"></i>
                                        </button>
                                        <a id="myLink" href="pengembalian_add.php?id_peminjaman=<?php echo $row['id_peminjaman'] ?>" onclick="confirmation(event)" class="btn btn-social-icon-text btn-linkedin">
                                            <i class="mdi mdi-redo-variant"></i>Kembalikan
                                        </a>


                                    </td>
                                </tr>

                            </tbody>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ALERT HAPUS -->
<script type="text/javascript">
    function hapus_admin() {
        var link = document.getElementById('hapusbutton').value
        const swalButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success m-2",
                cancelButton: "btn btn-danger m-2"
            },
            buttonsStyling: false
        });
        swalButtons.fire({
            title: "Apakah Kamu yakin akan menghapusnya?",
            text: "Data yang terhapus tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yaa, hapus saja!",
            cancelButtonText: "Gak jadi deh hehe ",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = link
            }
        });
    }
</script>
<!-- ALERT HAPUS -->

<!-- ALERT KEMBALIKAN -->
<script type="text/javascript">
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
        console.log(urlToRedirect);
        const swalButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-2',
                cancelButton: 'btn btn-danger m-2'
            },
            buttonsStyling: false
        });
        swalButtons.fire({
            title: "Apakah Kamu yakin akan mengembalikannya?",
            text: "Data akan tersimpan ke table pengembalian",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yaa, Kembalikan saja!",
            cancelButtonText: "Gak jadi deh hehe ",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = urlToRedirect
            }
        });
    }
</script>
<!-- ALERT KEMBALIKAN -->