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
                        <div id="nasionalTable" class="table py-2" style="height: 265px;">
                            <div>
                                <table id="detailMonitoringNasional">
                                    <!-- <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sudah Mengisi</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Belum mengisi</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Belum Selesai</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </tfoot> -->
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cirBar">
                        <div class="percent">
                            <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70" id="persentaseNasional" style="stroke-dashoffset: calc(440 - (440 * 0)/100);"></circle>
                            </svg>
                            <div class="number">
                                <h2 id="valuePersentaseNasional">0<span>%</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="provinsiPart">
                    <div>
                        <p>Progress Berdasarkan Provinsi</p>
                    </div>
                    <div class="box"  id="progressPerProvinsi">   
                    </div>            
                </div>
                <div id="satkerPart">
                    <div>
                        <p>Status Pengisian Berdasarkan Satuan Kerja</p>
                    </div>
                    <div class="satkerStatusBox">
                        <div id="satkerStatusTable">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
<?= $this->endSection(); ?>