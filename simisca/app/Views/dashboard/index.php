<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
<!-- Sidebar Holder -->

            <div class="menu-content">
                <div class="row rate">
                    <div class="col jumlah mr-2 w-30">
                        <div class="col">
                            <div class="row ket">Jumlah Satker BPS</div>
                            <div class="row ket" style="font-size: 50px; font-weight: bold;">517</div>
                        </div>
                        <div class="col bangunan"><i class="fa fa-building fa-6x"></i></div>
                        <div class="col bangunan"><i class="fa fa-building fa-6x"></i></div>
                    </div>

                    <div class="row respon ml-1">
                        <div class="col-md-4 mr-2 responRate">
                            <div>
                                <span class="ket">Respon Rate</span><br>
                                <span class="ket"style="font-size:12px;">Pengisian SMKB Satker BPS</span>
                                <div>
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Tahun
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">2020</a>
                                            <a class="dropdown-item" href="#">2021</a>
                                            <a class="dropdown-item" href="#">2022</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 box">
                            <div class="section">
                                <div  class="wilayah mr-3">
                                    <span>Kab/Kota</span>
                                </div>
                                <div class="progressBar w-100">
                                    <div class="progressBarFill" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="percentage">
                                    <span class="changePercent mr-1 ml-3" >100%</span>
                                </div>
                            </div>
                            <div class="section">
                                <div  class="wilayah mr-3">
                                    <span>Provinsi</span>
                                </div>
                                <div class="progressBar w-100">
                                    <div class="progressBarFill" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="percentage">
                                    <span class="changePercent mr-1 ml-3">80%</span>
                                </div>
                            </div>
                            <div class="section">
                                <div  class="wilayah mr-3">
                                    <span>Nasional</span>
                                </div>
                                <div class="progressBar w-100">
                                    <div class="progressBarFill" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="percentage">
                                    <span class="changePercent mr-1 ml-3">90%</span>
                                </div>
                            </div>
                        </div> 
                    </div>>
                </div>

                <div class="row visualisasi mt-4">
                    <div class="col container mt-2 mr-3">
                        <div class="card w-100" style="width: 18rem;">
                            <div class="row card-body">
                                <p class="col card-text ket"><b>Jumlah Bencana per Tahun<br>di Area SatKer BPS</b></p>
                                <div class="col tahun">
                                    <div class="button">
                                        <div class="col btn-group">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tahun
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">2020</a>                                        
                                                <a class="dropdown-item" href="#">2021</a>
                                                <a class="dropdown-item" href="#">2022</a>
                                            </div>
                                        </div>
                                    </div>                      
                                    <div class="col mt-2 ml-2">
                                        <a href=#><i class="fas fa-download" style="color: var(--merah);"></i></a>
                                    </div> 
                                </div>
                            </div>
                    </div>
                </div>       

                    <div class="col publikasi mt-2">
                        <p class="text-center ket mt-4"><b>Publikasi Hasil Sensus Mitigasi Kesiapsiagaan Bencana BPS</b></p>
                        <div class="list-group">
                            <div class="list ml-2"><a href=# class="list-group-item list-group-item-action ket"><i class="fas fa-map fa-2x"></i><span class="pub ml-2">Peta Tematik</span></a></div>
                            <div class="list ml-2"><a href=# class="list-group-item list-group-item-action ket"><i class="fas fa-chart-line fa-2x"></i><span class="pub ml-2">Visualisasi</span></a></div>
                            <div class="list ml-2"><a href=# class="list-group-item list-group-item-action ket"><i class="fas fa-table fa-2x"></i><span class="pub ml-2">Tabel Dinamis</span></a></div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row ket" style="background-color: none">
                    <h4><b>Tinjauan Satuan Kerja Anda</b></h4>
                </div>
                <div class="row form">
                    <div class="row building">
                        <div class="col satker w-30"><i class="fa fa-building fa-8x" style="color:white;"></i></div>
                        <div class="col profil">
                            <div class="row ket ml-0"><b>Profil Satker</b></div>
                            <div class="row prof">
                                <div class="col ketprof" style="color: white;">Nama Satker</div>
                                <input class="col form-control" type="text" placeholder="Nama Satker" aria-label="readonly input example" readonly>
                            </div>
                            <div class="row prof">
                                <div class="col ketprof" style="color: white;">Alamat Satker</div>
                                <textarea class="col form-control" type="text" placeholder="Nama Satker" aria-label="readonly input example" readonly></textarea>
                            </div>
                            <div class="row prof">
                                <div class="col ketprof" style="color: white;">Telepon</div>
                                <input class="col form-control" type="text" placeholder="Nama Satker" aria-label="readonly input example" readonly>
                            </div>
                            <div class="row prof">
                                <div class="col ketprof" style="color: white;">Email</div>
                                <input class="col form-control" type="text" placeholder="Nama Satker" aria-label="readonly input example" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row lokasi">
                    <div class="col satker w-30"><i class="fa fa-podcast fa-8x" style="color:white;"></i></div>
                    <div class="col mr-5">
                        <div class="row ket"><b>Lokasi Geografis</b></div>
                        <table class="row tabel">
                            <tbody>
                                <tr class="putih">
                                    <td class="tul">Wilayah pesisir</td>
                                    <td class="tul pr-3">Ya/Tidak</td>
                                </tr>
                                <tr class="kuning">
                                    <td class="tul">Wilayah dekat dengan sungai</td>
                                    <td class="tul pr-3">Ya/Tidak</td>
                                </tr>
                                <tr class="putih">
                                    <td class="tul">Wilayah dataran tinggi</td>
                                    <td class="tul pr-3">Ya/Tidak</td>
                                </tr>
                                <tr class="kuning">
                                    <td class="tul">Wilayah dekat gunung api</td>
                                    <td class="tul pr-3">Ya/Tidak</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row indeks">
                    <div class="col satker w-30"><i class="fa fa-server fa-8x" style="color:white;"></i></div>
                    <div class="col mr-5">
                        <div class="row ket"><b>Indeks Mitigasi Kesiapsiagaan Bencana (IMKB) Satuan Kerja</b></div>
                            <div class="row row-cols-auto">
                                <div class="col btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tahun
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">2020</a>                                        
                                        <a class="dropdown-item" href="#">2021</a>
                                        <a class="dropdown-item" href="#">2022</a>
                                    </div>
                                </div>                                 
                                <div class="col mt-2">
                                    <a href=#><i class="fas fa-download" style="color: var(--merah);"></i></a>
                                </div>
                            </div> 
                        <table class="row tabel mr-8">
                            <tbody>
                                <tr class="putih">
                                    <td class="tul">IMKB Satker</td>
                                    <td class="tul pr-3">00.00</td>
                                </tr>
                                <tr class="kuning">
                                    <td class="tul">Sub Bencana Alam</td>
                                    <td class="tul pr-3">00.00</td>
                                </tr>
                                <tr class="putih">
                                    <td class="tul">Sub Kebakaran</td>
                                    <td class="tul pr-3">00.00</td>
                                </tr>
                                <tr class="kuning">
                                    <td class="tul">Sub Pandemi COVID-19</td>
                                    <td class="tul pr-3">00.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row rekomendasi">
                    <div class="col satker w-30"><i class="fa fa-receipt fa-8x" style="color:white;"></i></div>
                    <div class="col hasil">
                        <div class="row ket rekomHasil"><b>Rekomendasi Hasil IMKB</b></div>
                        <textarea class="row form-control area ml-0" type="text" placeholder="Nama Satker" aria-label="readonly input example" readonly></textarea>
                    </div>
                </div>

            </div>

    
<?= $this->endSection(); ?>