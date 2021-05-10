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
        <div class="tableBox">
            <div id="nasionalTable" class="table">
                <div id="exportNasional">
                    <p>Export Data</p>
                </div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sudah Mengisi</td>
                                <td>465</td>
                            </tr>
                            <tr>
                                <td>Belum mengisi</td>
                                <td>30</td>
                            </tr>
                            <tr>
                                <td>Belum Selesai</td>
                                <td>22</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th>517</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="progressBox">
            <div class="cirBar">
                <div class="percent">
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70" id="edit"></circle>
                    </svg>
                    <div class="number">
                        <h2>87<span>%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="provinsiPart">
        <div>
            <p>Progress Berdasarkan Provinsi</p>
        </div>
        <div class="box">
            <div class="section">
                <div class="prov">
                    <span>Aceh</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
            <div class="section">
                <div class="prov">
                    <span>Sumatera Utara</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
            <div class="section">
                <div class="prov">
                    <span>Sumatera Barat</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
            <div class="section">
                <div class="prov">
                    <span>Sumatera Selatan</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
            <div class="section">
                <div class="prov">
                    <span>Riau</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
            <div class="section">
                <div class="prov">
                    <span>Jambi</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
            <div class="section">
                <div class="prov">
                    <span>Jawa Timur</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
            <div class="section">
                <div class="prov">
                    <span>Jawa Barat</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
            <div class="section">
                <div class="prov">
                    <span>Kalimantan Barat</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
            <div class="section">
                <div class="prov">
                    <span>Kalimantan Timur</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
            <div class="section">
                <div class="prov">
                    <span>Kalimantan Selatan</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
            <div class="section">
                <div class="prov">
                    <span>Bali</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">80%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn">></span>
                </div>
            </div>
        </div>
    </div>
    <div id="satkerPart">
        <div>
            <p>Status Pengisian Berdasarkan Satuan Kerja</p>
        </div>
        <div class="satkerStatusBox">
            <div id="tableSetting">
                <div class="nRows">
                    <span>Show</span>
                    <select name="nrow" id="rowChoose">
                        <option value="5">5</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div>
                    <input name="num" id="satkerSearch">
                </div>
                <div>
                    <button id="buttonExport">Export</button>
                </div>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Satker</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BPS Provinsi Aceh</td>
                            <td>Sudah Mengisi</td>
                        </tr>
                        <tr>
                            <td>BPS Kabupaten Aceh Barat</td>
                            <td>Belum Mengisi</td>
                        </tr>
                        <tr>
                            <td>BPS Kabupaten Aceh Barat Daya</td>
                            <td>Belum Mengisi</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <th>Total</th>
                        <th>517</th>
                    </tfoot>
                </table>
            </div>
            <div class="footNote">
                <span>Showing 1 to 1 of 517 entries <span class="lanjut">Previous</span> | <span class="lanjut">Next</span></span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>