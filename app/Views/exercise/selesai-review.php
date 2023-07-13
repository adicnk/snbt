<?= $this->extend('template/exercise-review') ?>
<?= $this->section('content') ?>

<?php $db = \Config\Database::connect(); ?>
<div class="row">

    <div class="row mt-3">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">check_circle</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Jawaban Benar</p>
                        <h4 class="mb-0"><?= session()->get('soalBenar'); ?></h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">highlight_off</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Jawaban Salah</p>
                        <h4 class="mb-0"><?= session()->get('soalSalah'); ?></h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">bookmark_added</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Soal Dijawab</p>
                        <h4 class="mb-0"> <?= session()->get('soalDiisi'); ?></h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">bookmark_border</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Jawaban Kosong</p>
                        <h4 class="mb-0"> <?= session()->get('soalKosong'); ?></h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
    </div>

    
    <?php $answer = session()->get('jawabanArr'); ?>

    <div class="card o-hidden border-0 shadow-lg mt-5">
       
        <div class="row mt-3 ml-3">
            <div class="col md-6">                
                    <form method="post" action="../submit/review">
                     <?php 
                        $totalSoal = session()->get('soalTotal');
                        for ($x = 1; $x <= $totalSoal; $x++) { 
                    ?>
                        <input type="submit" id="boxnumber" name="boxnumber" class="
                        <?php
                        $queryJawaban = $db->query("SELECT * FROM soal s INNER JOIN jawaban j ON s.id = j.soal_id WHERE s.idx=".$x);
                        foreach ($queryJawaban->getResult('array') as $s) : ?>
                        ?>
                        <?php if ($answer[$x-1]==$s['jawaban_benar']) {
                        echo "box-green";
                        } else {
                        echo "box-red";    
                        }
                    endforeach;
                        ?>
                        text-white font-weight-bold mr-2 mb-2" value="<?=$x?>"></input>
                        <?php if (fmod($x,10)==0) {
                            echo "<br/>";
                        } ?>                        
            <?php    } ?>
        </form>
            </div>
            <div class="col">
            <?php 
                if($boxNumber>0) 
                { 
                    $answer = session()->get('jawabanArr');
                    $queryJawaban = $db->query("SELECT * FROM soal s INNER JOIN jawaban j ON s.id = j.soal_id WHERE s.idx=".$boxNumber);
                    //dd($queryJawaban->getResult('array'));
                    foreach ($queryJawaban->getResult('array') as $s) : ?>
                        <div class="text-center">
                        <?php if ($s['is_picture'] == 1) : ?>
                            <img src="../img/<?= $s['picture_url'] ?>" class="rounded" width="50%" alt="gambar_soal">
                        <?php endif ?>
                    </div>
                    <br />
                    <?php if ($s['is_audio'] == 1) : ?>
                        <div class="mb-2 text-center">
                            <audio controls>
                                <source src="../aud/<?= $s['audio_url'] ?>" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    <?php endif ?>
                    <div class="card-body">
                        <form method="post" action="/latihan?id=<?= $s['idx']?>">
                        <h5 class="card-title">Soal No. <?= $s['idx'] ?></h5><hr/>
                            <?php
                                if ($answer[strval($boxNumber)-1]==$s['jawaban_benar']) {
                            ?>
                            <h5 style="color:Green;">Jawaban Anda BENAR</h5>
                            <?php } else { ?>

                            <h5 style="color:Red;">Jawaban Anda SALAH</h5>
                            <h6>Jawaban anda : <?php
                                switch($answer[strval($boxNumber)-1]) {
                                    case 1: echo "A"; break;
                                    case 2: echo "B"; break;
                                    case 3: echo "C"; break;
                                    case 4: echo "D"; break;
                                    case 5: echo "E"; break;
                                } ?><br/><?php } ?>
                                Jawaban yang benar adalah <?php                                 
                                switch($s['jawaban_benar']) {
                                    case 1: echo "A"; break;
                                    case 2: echo "B"; break;
                                    case 3: echo "C"; break;
                                    case 4: echo "D"; break;
                                    case 5: echo "E"; break;
                                }?><hr/>
                                </h6>
                            <p class="card-text"> <?= $s['name']; ?></p>
                            
                            <?php if ($s['name']=="") { ?>
                                
                                

                                
                                <?php } else { ?>
                                    
                                    <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>A. </b>
                                    <label>
                                        <span><?= $s['jawabanA']; ?></span>
                                    </label>
                                </li>
                                <li class="list-group-item"><b>B. </b>
                                    <label>
                                        <span><?= $s['jawabanB']; ?></span>
                                    </label>
                                </li>
                                <li class="list-group-item"><b>C. </b>
                                    <label>
                                        <span><?= $s['jawabanC']; ?></span>
                                    </label>
                                </li>
                                <li class="list-group-item"><b>D. </b>
                                    <label>
                                        <span><?= $s['jawabanD']; ?></span>
                                    </label>
                                </li>
                                <li class="list-group-item"><b>E. </b>
                                    <label>
                                        <span><?= $s['jawabanE']; ?></span>
                                    </label>
                                </li>
                                
                                <?php } ?>
                            </ul>
                <?php
                    endforeach;
                ?>
            </div>
            <?php } ?>
        
        </div>
        <div class="row mt-3 mb-3">
            <div class="col md-6">
                    <a href="../../dashboard" class="btn btn-success mt-3 ml-4 font-weight-bolder">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>