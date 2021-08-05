<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
            <div class="menu-content">
                <?php if(isset($token)): ?>
                    <iframe src="http://localhost/limesurvey/index.php/423492?token=<?= $token; ?>" title="Survey" width="1000" height="500"></iframe>
                    Anda dapat langsung mengisi kuesioner di atas atau anda dapat mengunjungi <a id="link-kuesioner" href="http://localhost/limesurvey/index.php/423492?token=<?= $token; ?>" class="m-0 p-0 font-italic" style="bg-transparent">kuesioner SMKB</a>
                <?php else: ?>
                    tidak ada survey
                <?php endif; ?>
            </div>
<?= $this->endSection(); ?>