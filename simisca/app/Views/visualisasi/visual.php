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
                        <div class="card-body box">
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
                    <select class="form-control mb-2" id="wilayah" style="width: 200px; ">
                        <option>Aceh</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
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
                    <select class="form-control mb-2" id="wilayah" style="width: 200px;">
                        <option>Aceh</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                    <div class="">
                        <div class="card-body  box">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                </div>

                <div class="col mb-4">
                    <div class="card-title title">
                        Judul
                    </div>
                    <div class="">
                        <div class="card-body  box">
                            <canvas id="myChart"></canvas>
                            <script>
                                var dat;
                                $(document).ready(function() {
                                    $.get("http://localhost/db/data.php", function(data) {
                                        console.log(typeof(data));
                                        var dat = JSON.parse(data);
                                        console.log(typeof(dat));

                                        var label = [];
                                        var dim1 = [];
                                        var dim2 = [];
                                        var dim3 = [];
                                        var dim4 = [];

                                        Object.keys(dat).forEach(function(key) {
                                            //console.log(dat[key][0]);
                                            label.push(dat[key][0]);
                                            dim1.push(dat[key][1]);
                                            dim2.push(dat[key][2]);
                                            dim3.push(dat[key][3]);
                                            dim4.push(dat[key][4]);
                                        });

                                        //console.log(typeof(dim1));
                                        var ctx = document.getElementById('myChart').getContext('2d');
                                        // var chart = new Chart(ctx, {
                                        //     // The type of chart we want to create
                                        //     type: 'line',

                                        //     // The data for our dataset
                                        //     data: {
                                        //         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                        //         datasets: [{
                                        //             label: 'My First dataset',
                                        //             backgroundColor: 'rgb(255, 99, 132)',
                                        //             borderColor: 'rgb(255, 99, 132)',
                                        //             data: [0, 10, 5, 2, 20, 30, 45]
                                        //         }]
                                        //     },

                                        //     // Configuration options go here
                                        //     options: {}
                                        // });
                                        options = {
                                            scale: {
                                                angleLines: {
                                                    display: false
                                                },
                                                ticks: {
                                                    suggestedMin: 0,
                                                    suggestedMax: 10
                                                }
                                            }
                                        };


                                        var myRadarChart = new Chart(ctx, {
                                            type: 'radar',
                                            data: {
                                                labels: ['Dimensi 1', 'Dimensi 2', 'Dimensi 3', 'Dimensi 4'],
                                                datasets: [{
                                                    label: label[0],
                                                    backgroundColor: 'rgb(255, 99, 132, 0.4)',
                                                    borderColor: 'rgb(255, 99, 132)',
                                                    data: [dim1[0], dim2[0], dim3[0], dim4[0]]
                                                }, {
                                                    label: 'BPS Kab. Kuantan Singingi',
                                                    backgroundColor: 'rgb(102, 102, 255,0.4)',
                                                    borderColor: 'rgb(102, 102, 255)',
                                                    data: [40, 86, 55, 75]
                                                }]
                                            },
                                            options: options
                                        });
                                    });
                                });
                            </script>
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