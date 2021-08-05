<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>

<div class="menu-content">
    <div class="rate">
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
                    <span class="ket" style="font-size:12px;">Pengisian SMKB Satker BPS</span>
                    <div>
                        <select name="tahun" id="response-rate">
                            <?php foreach ($tahun as $t) :?>
                            <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                            <?php endforeach ?>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>
            </div>
            


            <div class="col-md-7 box">
                <div class="section">
                    <div class="wilayah mr-3">
                        <span>Kab/Kota</span>
                    </div>
                    <div class="progressBar w-100">
                        <div class="progressBarFill" id="response-rate-kabupaten"  role="progressbar" style="width: 0%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="percentage">
                        <span class="changePercent mr-1 ml-3" id="response-rate-kabupaten-value">0%</span>
                    </div>
                </div>
                <div class="section">
                    <div class="wilayah mr-3">
                        <span>Provinsi</span>
                    </div>
                    <div class="progressBar w-100">
                        <div class="progressBarFill" id="response-rate-provinsi" role="progressbar" style="width: 0%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="percentage">
                        <span class="changePercent mr-1 ml-3" id="response-rate-provinsi-value">0%</span>
                    </div>
                </div>
                <div class="section">
                    <div class="wilayah mr-3">
                        <span>Nasional</span>
                    </div>
                    <div class="progressBar w-100">
                        <div class="progressBarFill" id="response-rate-pusat" role="progressbar" style="width: 0%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="percentage">
                        <span class="changePercent mr-1 ml-3" id="response-rate-pusat-value">0%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row visualisasi mt-4">
        <div class="container mt-2">
            <div class="card w-100" style="width: 18rem; max-height: 100px;">
                <p class="text-center ket mt-4"><b>Publikasi Hasil Sensus Mitigasi Kesiapsiagaan Bencana BPS</b></p>
                <div class="row card-body">
                    <table>
                        <tr>
                            <th>sdadsad</th>
                            <th>sdadsad</th>
                            <th>sdadsad</th>
                            <th>sdadsad</th>
                        </tr>
                        <tr>
                            <td>sadsad</td>
                            <td>sadsad</td>
                            <td>sadsad</td>
                            <td>sadsad</td>
                        </tr>
                        <tr>
                            <td>sadsad</td>
                            <td>sadsad</td>
                            <td>sadsad</td>
                            <td>sadsad</td>
                        </tr>
                        <tr>
                            <td>sadsad</td>
                            <td>sadsad</td>
                            <td>sadsad</td>
                            <td>sadsad</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="publikasi mt-2">
            <p class="text-center ket mt-4"><b>Publikasi Hasil Sensus Mitigasi Kesiapsiagaan Bencana BPS</b></p>
            <div class="list-group">
                <div class="list ml-2"><a href="<?= base_url('petaTematik'); ?>" class="list-group-item list-group-item-action ket"><i class="fas fa-map fa-2x"></i><span class="pub ml-2">Peta Tematik</span></a></div>
                <div class="list ml-2"><a href="<?= base_url('visualisasi'); ?>" class="list-group-item list-group-item-action ket"><i class="fas fa-chart-line fa-2x"></i><span class="pub ml-2">Visualisasi</span></a></div>
                <div class="list ml-2"><a href=""<?= base_url('tabelDinamis'); ?>"" class="list-group-item list-group-item-action ket"><i class="fas fa-table fa-2x"></i><span class="pub ml-2">Tabel Dinamis</span></a></div>
            </div>
        </div>
    </div>

    <br>

    <div class="ket tinjau">
        <div class="text-center">
            <p>
            <h3><b>Tinjauan Satuan Kerja Anda</b></h3>
            </p>
        </div>
    </div>

    <div class="row building">
        <div class="col satker w-30"><i class="fa fa-building fa-8x" style="color:white;"></i></div>
        <div class="col profil">
            <div class="row ket ml-0"><b>Profil Satker</b></div>
            <div class="row prof">
                <div class="col ketprof" style="color: white;">Nama Satker</div>
                <input class="col form-control" type="text" aria-label="readonly input example" readonly value="<?= $profil['namasatker']; ?>">
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


    <div class="row lokasi">
        <div class="col satker w-30"><i class="fa fa-podcast fa-8x" style="color:white;"></i></div>
        <div class="col mr-5">
            <div class="row ket"><b>Lokasi Geografis</b></div>
            <table class="row tabel">
                <tbody>
                    <?php $no=1; foreach ($lokasi as $key => $value) : ?>
                    <tr class="<?= ($no % 2 == 0) ? 'kuning' : 'putih'; ?>">
                        <td class="tul">wilayah <?= $key; ?></td>
                        <td class="tul pr-3"><?= ($value == 1) ? 'Ya' : 'Tidak'; ?></td>
                    </tr>
                    <?php $no++; endforeach; ?>
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
                    <input type="hidden" id="kodesatker" value="<?= $kodesatker; ?>">
                    <select name="tahun" id="tahun-imkb">
                        <?php foreach ($tahun as $t) :?>
                        <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <table class="row tabel mr-8" id="imkb">
                <!-- <tbody>
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
                </tbody> -->
            </table>
        </div>
    </div>

    <div class="row rekomendasi">
        <div class="col satker w-30"><i class="fa fa-receipt fa-8x" style="color:white;"></i></div>
        <div class="col hasil">
            <div class="row ket rekomHasil"><b>Rekomendasi Hasil IMKB</b></div>
                <ul class="list-group">        
                    <?php $val=[]; foreach ($lokasi as $key => $value) : ?>
                        <?= ($value == 1) ? '<li class="list-group-item bg-light">jauhi '.$key.'</li>' :  ''; ?>
                    <?php $val[]=$value; endforeach; ?>
                    <?= (array_sum($val) == 0) ? '<li class="list-group-item bg-light">wilayah anda jauh dari ancaman bahaya</li>' : '' ?>
                </ul>
        </div>
    </div>

</div>
</div>


<?= $this->endSection(); ?>