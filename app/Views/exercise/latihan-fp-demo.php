<?= $this->extend('template/dashboard-about') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Jenis Latihan</h3>
                <hr />
                <div class="subheading mb-3">bermacam-macam jenis latihan</div>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                    <button name="latihan-paket" value="Soal No. <?= $noID - 1 ?>" type="submit" class="btn btn-primary mt-3"><i class="material-icons opacity-10">chevron_left</i>Latihan dengan jawaban tanpa pembahasan</button>
                        <div>Mendapatkan latihan soal berstandar UTBK dengan kunci jawaban tanpa pembahasan.</div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="/dashboard" class="btn btn-primary">DASHBOARD</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>