<?= $this->extend('template/dashboard-confirm') ?>
<?= $this->section('content') ?>

<?php $db = \Config\Database::connect(); ?>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <!-- <div class="card-header">
                <h4 class="text-center">Pembelajaran tentang Tubuh Manusia</h4>
            </div> -->
            <div class="card-body">
                
                <form method="post" action="/bayar" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    
            <h4>Konfirmasi Pembayaran Pembelian Paket Soal</h4><hr/>
            <?php $queryClass = $db->table('kategori_soal')->getWhere(['is_tp' => 1]);
            foreach ($queryClass->getResult('array') as $k) :
                $queryUS = $db->table('user_subcribe')->getWhere(['subcribe_id' => 1]);
            ?>
            <a class="btn btn-primary">
            <span><?=$k['kname']?></span>
            <span class="badge badge-sm badge-circle badge-danger border border-white border-2">50</span>
            </a>
            <h6>  <?= ($k['price']) ? 'Harga: Rp ' :'' ?><?= number_format($k['price']); ?>
                
            <div class="form-row align-items-right mt-3">
                <div class="col-7">                    
                    <div><em>Unggah bukti transfer anda</em></div>
                    <div>
                        <input type="file" name="fileGambar" id="fileGambar">
                        <button type="submit" onclick="setSoalClass(<?=$k['id']?>)"  class="btn btn-secondary">Konfirmasi</button>
                    </div>
                </div>
            </div>

            <hr/><?php endforeach ?>
                
            <input type="hidden" id="soalClass" name="soalClass">
            </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>