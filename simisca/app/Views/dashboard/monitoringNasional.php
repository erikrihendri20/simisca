<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
            <div class="menu-content">
                <div id="history">
                    <p><span><a href="monitoring.html">Monitoring SMKB</a></span> / <span><a href="monitoringNasional.html">Nasional</a></span></p>
                </div>
                <div id="bigTitle">
                    <p id="title1">Progress Secara Nasional</p>
                </div>
                <div id="nasionalPart">
                    <div>
                        <div id="nasionalTable" class="table">
                            <div id="exportNasional">
                                <p id="tombolExportNasional">Export Data</p>
                            </div>
                            <div>
                                <table id="detailMonitoringNasional">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sudah Mengisi</td>
                                            <td><?= $detailProgressNasional['selesai mengisi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Belum mengisi</td>
                                            <td><?= $detailProgressNasional['belum mengisi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Belum Selesai</td>
                                            <td><?= $detailProgressNasional['sudah mengisi']; ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th><?= array_sum($detailProgressNasional); ?></th>
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
                                <circle cx="70" cy="70" r="70" id="persentaseNasional" style="stroke-dashoffset: calc(440 - (440 * <?= $persentaseNasional; ?>)/100);"></circle>
                            </svg>
                            <div class="number">
                                <h2><?= $persentaseNasional; ?><span>%</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="provinsiPart">
                    <div>
                        <p>Progress Berdasarkan Provinsi</p>
                    </div>
                    <div class="box">
                        <?php foreach ($progressPerProvinsi as $ppp) : ?>
                            <div class="section">
                                <div  class="prov">
                                    <span><?= $ppp['namasatker']; ?></span>
                                </div>
                                <div class="progressBar">
                                    <div class="progressBarFill" style="width: <?= $ppp['persentase']; ?>%;"></div>
                                </div>
                                <div class="percentage">
                                    <span class="changePercent"><?= $ppp['persentase']; ?>%</span>
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
                        
                    </div>
                </div>
            </div>
<?= $this->endSection(); ?>