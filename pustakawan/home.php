<?php include "../db/koneksi.php" ?>
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> Home
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">Pengunjung hari ini <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">$ 15,0000</h2>
                <h6 class="card-text">Increased by 60%</h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">Jumlah buku <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">45,6334</h2>
                <h6 class="card-text">Decreased by 10%</h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">Buku Kembali hari ini <i class="mdi mdi-diamond mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">95,5741</h2>
                <h6 class="card-text">Increased by 5%</h6>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">peminjaman detail</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>siswa id</th>
                                <th>tanggal pinjam</th>
                                <th>tanggal kembali</th>
                                <th>admin id</th>
                                <th>setatus pinjam</th>
                            </tr>
                        </thead>
                        <?php
                        $queri = mysqli_query($koneksi, "SELECT * FROM peminjaman");
                        while ($row = $queri->fetch_assoc()) {
                        ?>
                            <tbody>

                                <tr>
                                    <td><?php echo $row['id_peminjaman'] ?></td>
                                    <td><?php echo $row['siswa_id'] ?></td>
                                    <td><?php echo $row['tgl_pinjam'] ?></td>
                                    <td><?php echo $row['tgl_harus_kembali'] ?></td>
                                    <td><?php echo $row['admin_id'] ?></td>
                                    <td><?php echo $row['status_pinjam'] ?></td>
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
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Buku</h4>
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $queri = mysqli_query($koneksi, "SELECT * FROM buku");
                            while ($row = $queri->fetch_assoc()) {
                            ?>
                                <tbody>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="../img/buku/<?php echo $row['foto_sampul']; ?>" alt="" style="width: 40px; height: 40px ; object-fit: cover;" class="rounded-circle shadow-sm" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1"><?php echo $row['judul']; ?></p>
                                                    <p class="text-muted mb-0"><?php echo $row['isbn']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="index.php?dashboard=data-buku-detail&id_buku=<?php echo $row['id_buku'] ?>">
                                                <button class="btn btn-info btn-rounded btn-icon text-decoration-none">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
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
</div>