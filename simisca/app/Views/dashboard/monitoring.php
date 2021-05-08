<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
            <div class="menu-content">
                <div class="cards">
                    <h2 class="title" id="nasional">Nasional</h2>
                    <div class="percent">
                        <svg>
                            <circle cx="70" cy="70" r="70"></circle>
                            <circle cx="70" cy="70" r="70" id="edit"></circle>
                        </svg>
                        <div class="number">
                            <h2>87<span>%</span></h2>
                        </div>
                    </div>
                    <a href="monitoringNasional.html"class="text">Lihat detail</a>
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
                            <circle cx="70" cy="70" r="70" id="edit"></circle>
                        </svg>
                        <div class="number">
                            <h2>87<span>%</span></h2>
                        </div>
                    </div>
                    <a href="monitoringProvinsi.html"class="text">Lihat detail</a>
                </div>
            </div>
<?= $this->endSection(); ?>