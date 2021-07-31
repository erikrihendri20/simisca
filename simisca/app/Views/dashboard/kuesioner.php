<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
            <div class="menu-content">
                <?php if(isset($token)): ?>
                    <iframe src="http://localhost/limesurvey/index.php/423492?token=<?= $token; ?>" title="Survey" width="1000" height="500"></iframe>
                <?php else: ?>
                    tidak ada survey
                <?php endif; ?>
            </div>
<?= $this->endSection(); ?>