<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
<div class="menu-content">
    <div id="notfound">
        <div class="notfound">
            <div class="icon">
                <h1><i class="fas fa-bomb" data-aos="fade-down"></i></h1>
            </div>
            <h2>Mohon maaf. Tidak sedang dalam masa survei.</h2>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>