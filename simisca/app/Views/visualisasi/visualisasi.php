<?= $this->extend('template/visualisasiTemplate'); ?>

<?= $this->section('content'); ?>

<div class="body-content container">
    <button class="tablink satker" onclick="openPage('Satker', this, '#072438')" id="defaultOpen">Satuan Kerja</button>
    <button class="tablink pegawai" onclick="openPage('Pegawai', this, '#F4C58F')">Pegawai BPS</button>

    <div id="Satker" class="tabcontent">
            <div class="form-group row">
                <label for="grafik" class="col-md-2 col-form-label">Pilih Kategori</label>
                <div class="col-md-10">
                    <select class="form-control option mb-3" id="grafik-satker">
                        <!-- <option value="0">Pilih Indeks</option> -->
                        <option value="1">Proporsi Karakteristik Wilayah Satuan Kerja BPS</option>
                        <option value="2">Pengalaman Terdampak Bencana Alam dan Non Alam Satuan Kerja BPS</option>
                        <option value="3">Indikator Dimensi Perlindungan Aset Menurut Kategori</option>
                        <option value="4">Tingkat Mitigasi dan Kesiapsiagaan Bencana Berdasarkan Potensi Gunung meletus</option>
                        <!-- <option value="1">Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi</option>
                        <option value="4">Indikator Dimensi Sumber Daya Pendukung Menurut Kategori</option>
                        <option value="6">IMKB Satuan Kerja BPS Menurut Tingkatan Satuan Kerja</option>
                        <option value="8">Indeks Masing-Masing Dimensi Satuan Kerja Menurut Dimensi Berdasarkan Tingkatan Satuan Kerja</option> -->
                    </select>
                </div>
                <label for="tahun" class="col-md-2 col-form-label">Pilih Tahun</label>
                <div class="col-md-10">
                    <select class="form-control option mb-3" id="tahun">
                        <?php foreach ($tahun as $t) : ?>
                            <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn btn-dark" id="download">Download Chart</button>
                <div class="col-md-11"></div>
            </div>
        <div class="col-md-12">
            <div class="card" style="background-color: white;">
                <h5 class="card-header my-3" style="text-align: center;"></h5>
                <div class="card-body">
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div id="Pegawai" class="tabcontent">
            <div class="form-group row">
                <label for="grafik" class="col-md-2 col-form-label">Pilih Kategori</label>
                <div class="col-md-10">
                    <select class="form-control option2 mb-3" id="grafik-pegawai">
                        <option value="11">Indeks Pegawai Satuan Kerja BPS
                            Pada Tingkatan Satuan Kerja Menurut Dimensi</option>

                    </select>
                </div>
                <div class="col-md-10">
                    <p>*Hasil Diseminasi PKL Polstat STIS T.A. 2020/2021</p>
                </div>
                <div class="col-md-10">
                    <button id="download2" class="btn btn-light" style="display: block;">Download Chart</button>
                </div>
            </div>
        

        <div class="col-md-12">
            <div class="card" style="background-color: white;">
                <h5 class="card-header my-3" style="text-align: center;"></h5>
                <div class="card-body">
                    <canvas id="chart2"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>