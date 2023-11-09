<?= $this->extend('template/dashboard-belajar') ?>
<?= $this->section('content') ?>

<iframe src="https://api.whatsapp.com/send?phone=62<<?=$hp?>&text=<?=$message?>" width="100%" height="500px"></iframe>
    
<?= $this->endSection() ?>