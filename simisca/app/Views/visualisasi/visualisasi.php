<?= $this->extend('template/visualisasiTemplate'); ?>

<?= $this->section('content'); ?>

<div class="body-content container">
    <button class="tablink satker" onclick="openPage('Satker', this, '#072438')" id="defaultOpen">Satuan Kerja</button>
    <button class="tablink pegawai" onclick="openPage('Pegawai', this, '#F4C58F')">Pegawai BPS</button>

    <div id="Satker" class="tabcontent">
        <form action="">
            <div class="form-group row">
                <label for="grafik" class="col-md-2 col-form-label">Pilih Kategori</label>
                <div class="col-md-10">
                    <select class="form-control option mb-3" id="grafik">
                        <option value="0">Pilih Indeks</option>
                        <option value="1">Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi</option>
                        <option value="2">Proporsi Karakteristik Wilayah Satuan Kerja BPS</option>
                        <option value="3">Pengalaman Terdampak Bencana Alam dan Non Alam Satuan Kerja BPS</option>
                        <option value="4">Indikator Dimensi Sumber Daya Pendukung Menurut Kategori</option>
                        <option value="5">Indikator Dimensi Perlindungan Aset Menurut Kategori</option>
                        <option value="6">IMKB Satuan Kerja BPS Menurut Tingkatan Satuan Kerja</option>
                        <option value="7">IMKB Satuan Kerja BPS Menurut Kategori (%)</option>
                        <option value="8">Indeks Masing-Masing Dimensi Satuan Kerja Menurut Dimensi Berdasarkan Tingkatan Satuan Kerja</option>
                        <option value="9">IMKB Satuan Kerja BPS Suv Covid-19 Menurut Pulau</option>

                    </select>
                </div>
                <label for="tahun" class="col-md-2 col-form-label">Pilih Tahun</label>
                <div class="col-md-10">
                    <select onchange="pilihTahun()" class="form-control option mb-3" id="tahun">
                        <option>2020</option>
                    </select>
                </div>
                <div class="col-md-11"></div>
                <button onclick="pilihGrafik()" type="submit" id="tombol" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <div class="col-md-12">
            <div class="card" style="background-color: white;">
                <h5 class="card-header my-3" style="text-align: center;"></h5>
                <div class="card-body">
                    <canvas id="chart"></canvas>
                </div>
                <script class="skrip" src=""></script>
            </div>
        </div>
        <!-- <script>
            // var x = document.getElementById("grafik").selectedIndex;
            // var opsi = document.getElementsByTagName("option")[x].value;
            var x = $("#grafik").val();
            var skrip = document.getElementsByClassName("skrip")[0];

            function pilihGrafik() {
                if ($("#grafik").val() != 0) {
                    skrip.getAttributeNode("src").value = "js/grafik/" + $("#grafik").val() + ".js";
                }
                console.log($("#grafik").val());
            }
            $("#grafik").change(
                function() {
                    pilihGrafik();
                }
            )
        </script> -->
    </div>

    <div id="Pegawai" class="tabcontent">
        <form action="">
            <div class="form-group row">
                <label for="grafik" class="col-md-2 col-form-label">Pilih Kategori</label>
                <div class="col-md-10">
                    <select onchange="pilihGrafik()" class="form-control option2 mb-3" id="grafik">
                        <option value="0">Pilih Indeks</option>
                        <option value="10">IMKB Pegawai Dalam Satuan Kerja BPS Menurut Kategori (%)</option>
                        <option value="11">Indeks Pegawai Satuan Kerja BPS
                            Pada Tingkatan Satuan Kerja Menurut Dimensi</option>

                    </select>
                </div>
                <div class="col-md-10"></div>
                <button onclick="pilihGrafik()" type="submit" id="tombol" class="btn btn-primary">Submit</button>
                <p>*Hasil Diseminasi PKL Polstat STIS T.A. 2020/2021</p>
            </div>
        </form>

        <div class="col-md-12">
            <div class="card" style="background-color: white;">
                <h5 class="card-header my-3" style="text-align: center;"></h5>
                <div class="card-body">
                    <canvas id="chart2"></canvas>
                </div>
                <script class="skrip2" src=""></script>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>