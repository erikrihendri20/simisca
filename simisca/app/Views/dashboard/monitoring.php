<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
            <div class="menu-content">
                <div class="cards">
                    <h2 class="title" id="nasional">Nasional</h2>
                    <div class="percent">
                        <svg>
                            <circle cx="70" cy="70" r="70"></circle>
                            <circle cx="70" cy="70" r="70" id="persentaseNasional" style="stroke-dashoffset: calc(440 - (440 * <?= $persentaseNasional; ?>)/100);"></circle>
                        </svg>
                        <div class="number">
                            <h2><?= $persentaseNasional; ?><span>%</span></h2>
                        </div>
                    </div>
                    <a href="<?= base_url('dashboard/monitoringNasional'); ?>"class="text">Lihat detail</a>
                </div>
                <div class="cards">
                    <h2 class="title" id="provText">Provinsi</h2>
                    <select name="num" id="provinsiChoose">
                        <?php foreach ($provinsi as $prov) :?>
                            <option value="<?= $prov['kodesatker']; ?>"><?= $prov['namasatker']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="percent">
                        <svg>
                            <circle cx="70" cy="70" r="70"></circle>
                            <circle cx="70" cy="70" r="70" id="persentaseProvinsi"></circle>
                        </svg>
                        <div class="number">
                            <h2 id="persentaseNumberProvinsi">0<span>%</span></h2>
                        </div>
                    </div>
                    <a href="<?= base_url('dashboard/monitoringProvinsi'); ?>"class="text">Lihat detail</a>
                </div>
            </div>
<?= $this->endSection(); ?>