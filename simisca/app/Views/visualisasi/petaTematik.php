<?= $this->extend('template/visualisasiTemplate'); ?>

<?= $this->section('content'); ?>

<div class="container menu">

    <button class="tablink col-md-6 pegawai" onclick="openPage('Home', this, '#F4C58F','#072438')">Pegawai</button>
    <button class="tablink col-md-6 satker" onclick="openPage('News', this, '#072438','#F4C58F')" id="defaultOpen">Satuan
        Kerja</button>

    <div id="Home" class="tabcontent">
        <div class="filter1">
            <p>Filter Wilayah</p>
        </div>
        <div class="form row satker2">
            <div class="form-group col-md-6 bar1">
                <div class="label">
                    <label for="indeks" , style="color: #f4c58f;">Sub IMKB</label>
                </div>
                <select style="background-color: #f4c58f;" class="form-control" id="indeks-pegawai">
                    <option value=1>Sub IMKB Gempa dan Tsunami</option>
                    <option value=2>Sub IMKB Banjir </option>
                </select>
            </div>
            <div class="form-group col-md-6 bar1">
                <div class="label">
                    <label for="prov" , style="color: #f4c58f;">Provinsi</label>
                </div>
                <select style="background-color: #f4c58f;" class="form-control" id="prov-pegawai">
                    <option value="1">Semua Provinsi</option>
                    <?php foreach ($satker as $s) : ?>
                        <option value="<?= $s['kodesatker']; ?>"><?= substr($s['namasatker'], 4); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- <div class="form-group col-md-4 bar2">
                <div class="label">
                    <label for="kabkota" , style="color: #f4c58f;">Kabupaten/Kota</label>
                </div>
                <select style="background-color: #f4c58f;" class="form-control" id="kabkota">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div> -->
            <div>
                <p></p>
            </div>

        </div>
        <div id="keterangan-pegawai">
            <p class="ket">*Hasil Diseminasi PKL Polstat STIS</p>
        </div>
        
    </div>

    <div id="News" class="tabcontent">
        <div class="filter">
            <p>Filter Sub Indeks dan Wilayah</p>
        </div>
        <div class="form row satker1">
            <div class="form-group col-md-4 bar1">
                <div class="label">
                    <label for="indeks">Tahun</label>
                </div>
                <select class="form-control" id="tahun-satker" style="color: #f4c58f; background-color:#072438">
                    <?php foreach ($tahun as $t) : ?>
                        <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-4 bar1">
                <div class="label">
                    <label for="indeks">Indeks</label>
                </div>
                <select class="form-control" id="indeks-satker" style="color: #f4c58f; background-color:#072438">
                    <!-- <option value="1">Sub IMKB Kebakaran Per Provinsi</option> -->
                    <option value="2">Sub IMKB Covid-19 Per Provinsi</option>
                    <option value="3">Sub IMKB Gempa Tsunami</option>
                    <option value="4">Sub IMKB Banjir</option>
                </select>
            </div>
            <div class="form-group col-md-4 bar1" id="form-prov-satker">
                <div class="label">
                    <label for="prov">Provinsi</label>
                </div>
                <select class="form-control" id="prov-satker" style="color: #f4c58f; background-color:#072438">
                    <option value="1">Semua Provinsi</option>
                    <?php foreach ($satker as $s) : ?>
                        <option value="<?= $s['kodesatker']; ?>"><?= substr($s['namasatker'], 4); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- <div class="form-group col-md-4 bar2">
                <div class="label">
                    <label for="provinsi">Provinsi</label>
                </div>
                <select class="form-control" id="subjek">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
            <div class="form-group col-md-4 bar3">
                <div class="label">
                    <label for="kabkot">Kabupaten/Kota</label>
                </div>
                <select class="form-control" id="subjek">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div> -->
        </div>
        <div id="keterangan-satker">
            <p class="ket">*Hasil Diseminasi PKL Polstat STIS</p>
        </div>
    </div>
    <div class="top">
        <div class="content row">
            <div class="pet col-md-12">
                <div id="mapSatker">
                </div>
            </div>

            <!-- <div class="stat col-md-2">
                <div class="label1">
                    <p>Statistik Indeks Satker</p>
                </div>
                <div class="prov row">
                    PROVINSI
                </div>
                <div class="kota row">
                    KOTA
                </div>
                <div class="label1">
                    <p>Statistik Kerentanan</p>
                </div>
                <div class="tertinggi row">
                    <p>Sangat rentan</p>
                    <p>Sangat tidak rentan</p>
                </div>
            </div> -->
        </div>
    </div>
</div>

<?= $this->endSection(); ?>