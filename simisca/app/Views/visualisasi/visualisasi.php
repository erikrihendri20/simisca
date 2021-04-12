<?= $this->extend('template/visualisasiTemplate'); ?>

<?= $this->section('content'); ?>

<div class="body-content">
    <button class="tablink satker" onclick="openPage('Satker', this, '#072438')" id="defaultOpen">Satuan Kerja</button>
    <button class="tablink pegawai" onclick="openPage('Pegawai', this, '#F4C58F')">Pegawai BPS</button>

    <div id="Satker" class="tabcontent">
        <form action="">
            <div class="form-group row tahun">
                <label for="tahun" class="col-md-2 col-form-label">Tahun</label>
                <div class="col-md-10">
                    <select onchange="pilihTahun()" class="form-control isi-tahun" id="tahun">
                        <option>2020</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="col-md-12">
            <div class="row">
                <div class="col mb-4">
                    <div class="card-title title">
                        Jenis Daerah Administratif Tingkat II
                    </div>
                    <div class="">
                        <div class="card-body box" style="height:auto">
                            <canvas id="daerahAdministratif"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col mb-4">
                    <div class="card-title title">
                        Kerentanan Secara Agregat
                    </div>
                    <div class="">
                        <div class="card-body box">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card-title title">
                        Indeks Level Kabupaten/Kota
                    </div>
                    <select class="form-control mb-2" id="filterIndeksProvinsi" style="width: 200px; ">
                        <?php foreach ($provinsi as $p) : ?>
                            <option value="<?= $p['kodesatker']; ?>"><?= $p['namasatker']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="">
                        <div class="card-body  box">
                        </div>
                    </div>
                </div>

                <div class="col mb-4">
                    <div class="card-title title">
                        Kerentanan per Provinsi
                    </div>
                    <select class="form-control mb-2" id="filterKerentananProvinsi" style="width: 200px; ">
                        <?php foreach ($provinsi as $p) : ?>
                            <option value="<?= $p['kodesatker']; ?>"><?= $p['namasatker']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="">
                        <div class="card-body box">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                </div>

                <div class="col mb-4">
                    <div class="card-title title">
                        Spider Chart
                    </div>
                    <div class="row">
                        <div class="col">
                            <select class="form-control mb-2" id="filterSpiderProvinsi" style="width: 200px;">
                                <?php foreach ($provinsi as $p) : ?>
                                    <option value="<?= $p['kodesatker']; ?>"><?= $p['namasatker']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control mb-2" id="filterSpiderKabupaten" style="width: 200px;">

                            </select>
                        </div>
                    </div>
                    <div class="">
                        <div class="card-body  box" style="height:auto">
                            <canvas id="spiderChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="Pegawai" class="tabcontent">
        <div class="col-md-12 judul-tab-pegawai mb-2">
            *Hasil Diseminasi PKL Polstat STIS T.A. 2020/2021
        </div>
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-4">
                <div class="card-title title-pegawai">
                    Komposisi Jabatan Pegawai
                </div>
                <div class="">
                    <div class="card-body  box">
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card-title title-pegawai">
                    Jenis Kelamin Pegawai
                </div>
                <div class="">
                    <div class="card-body  box">
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2" style="width: 70%; margin: auto;">
            <div class="col mb-4">
                <div class="card-title title-pegawai">
                    Tingkat Pendidikan Pegawai
                </div>
                <div class="">
                    <div class="card-body box">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>