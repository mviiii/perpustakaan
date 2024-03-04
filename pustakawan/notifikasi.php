<?php if (isset($_GET['error']) and $_GET['error'] != '') : ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="mdi mdi-alert-box"></i>
        <div>
            Stok Buku Tidak Cukup !!!
        </div>
    </div>
<?php endif ?>

<!-- NOTIFIKASI -->
<?php if (isset($_GET['notif'])) : ?>
    <?php if ($_GET['notif'] == "add-berhasil") : ?>
        <div class="alert alert-success my-3">
            <span><b> Success - </b> Data Berhasil Ditambahkan !</span>
        </div>
    <?php endif; ?>
    <?php if ($_GET['notif'] == "kembalikan-berhasil") : ?>
        <div class="alert alert-success my-3">
            <span><b> Success - </b> Buku Berhasil Dikembalikan !</span>
        </div>
    <?php endif; ?>
    <?php if ($_GET['notif'] == "edit-berhasil") : ?>
        <div class="alert alert-success">
            <span><b> Success - </b> Data Berhasil Diedit !</span>
        </div>
    <?php endif; ?>
    <?php if ($_GET['notif'] == "delete-berhasil") : ?>
        <div class="alert alert-success">
            <span><b> Success - </b> Data Berhasil Dihapus !</span>
        </div>
    <?php endif; ?>
<?php endif; ?>
<!-- NOTIFIKASI -->