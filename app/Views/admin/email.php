<?= $this->extend('template/email') ?>
<?= $this->section('content') ?>

<?php $db = \Config\Database::connect();

//Import the PHPMailer class into the global namespace
require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Set the hostname of the mail server
$mail->Host = 'keperawatan.devinc.website';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'contact@keperawatan.devinc.website';
//Password to use for SMTP authentication
$mail->Password = 'kprwt2023';
//Set who the message is to be sent from
$mail->setFrom('contact@keperawatan.devinc.website', 'Daftar Latihan Soal');
//Set an alternative reply-to address
$mail->addReplyTo('contact@keperawatan.devinc.website', 'Daftar Latihan Soal');
//Set who the message is to be sent to
$mail->addAddress($email, $nama);
//Set the subject line
$mail->Subject = 'Daftar Latihan Soal';

$mail->msgHTML(' ?>

<div>Anda telah mendaftar Latihan Soal Keperawatan, dengan detail sebagai berikut :</div>
<p>Nama    :<?= $nama ?></p>
<p>Sekolah    :<?= $asal ?></p>
<p>Jurusan    :<?= $jurusan ?></p>

<p>Username    :<?= $username ?></p>
<p>Password    :<?= $password ?></p>

<?php
');

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('logo/logo.png');

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="mt-3">
        <hr>
    </div>
    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <h6 class="h6 mb-0 text-gray my-2">Anda telah mendaftar Latihan Soal Keperawatan</h6>        
    </div>
    <div>email telah dikirim ke <?= $email ?></div>
    <a class="btn btn-primary mt-3 mb-4" href="../login/fp">Done</a>
    <div class="mt-3">
        <hr>
    </div>
</div>
<!-- /.container-fluid -->
<?php }?>




<?= $this->endSection() ?>