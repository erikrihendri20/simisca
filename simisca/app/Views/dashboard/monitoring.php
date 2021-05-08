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
                        <option value="">DKI Jakarta</option>
                        <option value="1">Jawa Barat</option>
                        <option value="2">Papua Barat</option>
                        <option value="3">Bali</option>
                        <option value="4">Sumatera Barat</option>
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