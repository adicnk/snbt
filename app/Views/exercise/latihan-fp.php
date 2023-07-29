<?= $this->extend('template/dashboard-belajar') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <!-- <div class="card-header">
                <h4 class="text-center">Pembelajaran tentang Tubuh Manusia</h4>
            </div> -->
            <div class="card-body">
                
                <form method="post" action="/latihanpaket">
                    <?= csrf_field() ?>
                    
                    <?php foreach ($paket as $pkt) {
                        switch ($pkt['paket']) {
                            case "demo": 
                                ?>
            <h3>Account Demo</h3><hr/>
            <button type="submit" onclick="setSoalClass(1)"  class="btn btn-warning">Latihan Soal dengan Jawaban tanpa pembahasannya</button><br/>
            <button type="submit" onclick="setSoalClass(0)"  class="btn btn-secondary">Latihan Soal dengan Jawaban serta pembahasannya</button><br/>
                
        <?php break;
        case "bronze": ?>
                
        <?php break;
        case "silver": ?>
            
    <?php break;
        case "paket": ?>
            
            <?php break;
}} ?>
            <input type="hidden" id="soalClass" name="soalClass">
            </form>
            </div>
            <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>