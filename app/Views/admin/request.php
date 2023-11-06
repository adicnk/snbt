<?= $this->extend('template/member-mahasiswa') ?>
<?= $this->section('content') ?>

<?php $db = \Config\Database::connect(); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="mt-3">
        <hr>
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"> <?= $title; ?></h1>
    </div>

    <div>
        <div class="row">
            <div class="col"></div>
            <div class="col-4">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center">#</th>
                    <th scope="col" width="300px">Nama</th>
                    <th scope="col" width="150px">Paket</th>
                    <th scope="col" width="300px" style="text-align: center">Soal</th>
                    <th scope="col" style="text-align: center">Bayar</th>
                    <th scope="col" style="text-align: center">Permintaan</th>
                    <th scope="col" style="text-align: center">Pesan</th>                    
                    <th scope="col" style="text-align: center">Konfirmasi</th>                    
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $index = 1 + (5 * ($currentPage - 1));
                    foreach ($user_subcribe as $us) :
                    ?>
                <tr>
                    <td style="text-align: center"><?= $index ?></td>
                    <td><?= $us['user_id'] ?></td>
                    <td><?= $us['subcribe_id'] ?></td>
                    <td><?= $us['kategori_soal_id'] ?></td>
                    <td><?= $us['is_buy'] ? '<img src="../../icon/available.png" class="mr-2" />' : '<img src="../../icon/not_available.png" class="mr-2" />' ?></td>
                    <td><?= $us['is_request'] ? '<img src="../../icon/available.png" class="mr-2" />' : '<img src="../../icon/not_available.png" class="mr-2" />' ?></td>
                    <td><?= $us['is_message'] ? '<img src="../../icon/available.png" class="mr-2" />' : '<img src="../../icon/not_available.png" class="mr-2" />' ?></td>
                    <td><?= $us['is_confirm'] ? '<img src="../../icon/available.png" class="mr-2" />' : '<img src="../../icon/not_available.png" class="mr-2" />' ?></td>
                    <td>
                        <a href="/usersubcribe/pesan"><img src=" ../../icon/message.png" class="mr-2" /></a>
                        <a href="/usersubcribe/confirm"><img src="../../icon/confirm.png" /></a>
                    </td>
                </tr>
            <?php
                        $index++;
                    endforeach;
            ?>

            </tbody>
        </table>
    </div>
    <?= $pager->links('user', 'custom_pagination') ?>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>