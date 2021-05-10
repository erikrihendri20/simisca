<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
            <div class="menu-content">
                <div id="history">
                    <p><span><a href="monitoring.html">Monitoring SMKB</a></span> / <span><a href="monitoringProvinsi.html">Provinsi</a></span></p>
                </div>
                <div>
                    <p id="title1">Progress Provinsi <span>Sumatera Barat</span></p>
                </div>
                <div id="provinsiPart">
                    <div>
                        <div id="provinsiTable" class="table">
                            <div id="exportProvinsi">
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
                                            <td>14</td>
                                        </tr>
                                        <tr>
                                            <td>Belum mengisi</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>Belum Selesai</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th>19</th>
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
                                <circle cx="70" cy="70" r="70" id="edit"></circle>
                            </svg>
                            <div class="number">
                                <h2>87<span>%</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="kabupatenKotaPart">
                    <div>
                        <p>Progress Berdasarkan Kabupaten/Kota</p>
                    </div>
                    <div class="box">
                        <div class="section">
                            <div  class="prov">
                                <span>Kota Padang</span>
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
                            <div  class="prov">
                                <span>Kota Bukittinggi</span>
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
                            <div  class="prov">
                                <span>Kab. Tanah Datar</span>
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
                                <div id="desc">
                                    <input name="num" id="satkerSearch">
                                </div>
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
                                        <td>BPS Provinsi Sumatera Barat</td>
                                        <td>Sudah Mengisi</td>
                                    </tr>
                                    <tr>
                                        <td>BPS Kabupaten Agam</td>
                                        <td>Belum Mengisi</td>
                                    </tr>
                                    <tr>
                                        <td>BPS Kota Padang</td>
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
<?= $this->endSection(); ?>