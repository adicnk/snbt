<?= $this->extend('template/dashboard-belajar') ?>
<?= $this->section('content') ?>

<?php $db = \Config\Database::connect(); ?>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <!-- <div class="card-header">
                <h4 class="text-center">Pembelajaran tentang Tubuh Manusia</h4>
            </div> -->
            <div class="card-body">                
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>