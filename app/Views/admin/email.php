<?= $this->extend('template/email') ?>
<?= $this->section('content') ?>

<?php $db = \Config\Database::connect(); ?>

<?php
$to = $email;
$subject = "This is a test";
$message = "This is a PHP plain text email example.";
$headers = "From: contact@keperawatan.devinc.website" ."\r\n" ."Reply-To: contact@keperawatan.devinc.website" ."\r\n";
mail($to, $subject, $message, $headers);
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="mt-3">
        <hr>
    </div>
    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <h6 class="h6 mb-0 text-gray">Anda telah mendaftar Latihan Soal Kpeerawatan</h6>        
    </div>
    <div class="mt-2">email telah dikirim ke <h6><?= $email ?></h6></div>
    <div class="mt-2 mb-2"> <?= $headers; ?></div>
    <a class="btn btn-primary mt-3 mb-4" href="../login/fp">Done</a>
    <div class="mt-3">
        <hr>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>