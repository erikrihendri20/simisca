<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
            <div class="menu-content">
                <div id="history">
                    <p><span><a href="monitoring.html">Monitoring SMKB</a></span> / <span><a href="monitoringProvinsi.html">Provinsi</a></span></p>
                </div>
                <div>
                    <p id="title1">Progress <?= $satker['namasatker']; ?></p>
                </div>
                <div id="provinsiPart">
                    <div>
                        <div id="provinsiTable" class="table">
                            <div id="exportProvinsi">
                                <p id="tombolExportProvinsi">Export Data</p>
                            </div>
                            <div>
                                <table id="detailMonitoringProvinsi">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sudah Mengisi</td>
                                            <td><?= $detailProgressProvinsi['selesai mengisi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Belum mengisi</td>
                                            <td><?= $detailProgressProvinsi['belum mengisi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Belum Selesai</td>
                                            <td><?= $detailProgressProvinsi['sudah mengisi']; ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th><?= array_sum($detailProgressProvinsi); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="cirBar">
                        <div class="percent">
                            <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70" id="edit" style="stroke-dashoffset: calc(440 - (440 * <?= $persentaseProvinsi; ?>)/100);"></circle>
                            </svg>
                            <div class="number">
                                <h2><?= $persentaseProvinsi; ?><span>%</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="kabupatenKotaPart">
                    <div>
                        <p>Progress Berdasarkan Kabupaten/Kota</p>
                    </div>
                    <div class="box">
                        <?php foreach ($progressPerkabupaten as $kab) :?>
                            <div class="section">
                                <div  class="prov">
                                    <span><?= $kab['namasatker']; ?></span>
                                </div>
                                <div class="progressBar">
                                    <div class="progressBarFill" style="width: <?= $kab['persentase']; ?>%;"></div>
                                </div>
                                <div class="percentage">
                                    <span class="changePercent"><?= $kab['persentase']; ?>%</span>
                                </div>
                                <div class="greater">
                                    <span class="greaterIn">></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>            
                </div>
                <div id="satkerPart">
                    <div>
                        <p>Status Pengisian Berdasarkan Satuan Kerja</p>
                    </div>
                    <div class="satkerStatusBox">
                        <div>
                            <table id="statusPengisian">
                                <thead>
                                    <tr>
                                        <th>Nama Satker</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($statusPengisian as $s) :?>
                                        <tr>
                                            <td><?= $s['namasatker']; ?></td>
                                            <td><?= $s['status']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <th>Total</th>
                                    <th><?= count($statusPengisian); ?></th>
                                </tfoot>
                            </table>
                        </div>
                        <div class="footNote">
                            <span>Showing 1 to 1 of 517 entries <span class="lanjut">Previous</span> | <span class="lanjut">Next</span></span>
                        </div>
                    </div>
                </div>
            </div>
<?= $this->endSection(); ?>