<?= $this->extend('template/dashboard-belajar') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <!-- <div class="card-header">
                <h4 class="text-center">Pembelajaran tentang Tubuh Manusia</h4>
            </div> -->
            <div class="card-body">
<?php foreach ($paket as $pkt) {
    switch ($pkt['paket']) {
        case "demo": 
            ?>
            <h3>Account Demo</h3><hr/>
            <a href="/latihan?tp=1" type="button" class="btn btn-warning">Latihan Soal dengan Jawaban tanpa pembahasannya</a><br/>
            <a href="/latihan?tp=0" type="button" class="btn btn-secondary">Latihan Soal dengan Jawaban serta pembahasannya</a>
                
        <?php break;
        case "bronze": ?>
                
        <?php break;
        case "silver": ?>
            
    <?php break;
        case "paket": ?>
            
    <?php break;
}} ?>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>