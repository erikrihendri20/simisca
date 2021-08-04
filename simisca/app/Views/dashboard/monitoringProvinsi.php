<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
            <div class="menu-content">
                <div id="history">
                    <p><span><a href="monitoring.html">Monitoring SMKB</a></span> / <span><a href="monitoringProvinsi.html">Provinsi</a></span></p>
                </div>
                <div>
                    <input type="hidden" id="kodesatker" value="<?= $satker['kodesatker']; ?>">
                    <p id="title1">Progress <?= substr($satker['namasatker'],4); ?></p>
                </div>
                <div id="provinsiPart">
                    <div>
                        <div id="provinsiTable" class="table py-2" style="height: 265px;">
                            <div>
                                <table id="detailMonitoringProvinsi">
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="cirBar">
                        <div class="percent">
                            <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70" id="persentaseProvinsi" style="stroke-dashoffset: calc(440 - (440 * 0)/100);"></circle>
                            </svg>
                            <div class="number">
                                <h2 id="valuePersentaseProvinsi"><span>%</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="kabupatenKotaPart">
                    <div>
                        <p>Progress Berdasarkan Kabupaten/Kota</p>
                    </div>
                    <div class="box" id="progressInProvinsi">
                    </div>            
                </div>
                <div id="satkerPart">
                    <div>
                        <p>Status Pengisian Berdasarkan Satuan Kerja</p>
                    </div>
                    <div class="satkerStatusBox">
                        <div id="satkerStatusTable">
                        </div>
                        <div class="footNote">
                            <span>Showing 1 to 1 of 517 entries <span class="lanjut">Previous</span> | <span class="lanjut">Next</span></span>
                        </div>
                    </div>
                </div>
            </div>
<?= $this->endSection(); ?>