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
                    <div class="card" style="background-color: white;">
                        <h5 class="card-header my-3" style="text-align: center;">Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi</h5>
                        <div class="card-body">
                            <canvas id="chart1"></canvas>
                        </div>
                    </div>

                    <script>
                        const labels = ["Sumatera", "Jawa-Bali", "Nusa Tenggara", "Kalimantan", "Sulawesi", "Maluku", "Papua"];
                        const data = {
                            labels: labels,
                            datasets: [{
                                    label: 'Sumber Daya Pendukung',
                                    data: [36, 46, 33, 38, 39, 34, 30],
                                    borderColor: 'rgb(255, 0, 0)',
                                    backgroundColor: 'rgba(255, 0, 0,0.5)',
                                    borderWidth: 2,
                                    borderRadius: 2,
                                    borderSkipped: false,
                                },
                                {
                                    label: 'Pemulihan dan Penanggulangan Darurat',
                                    data: [28, 38, 26, 32, 30, 25, 24],
                                    borderColor: 'rgb(0, 0, 255)',
                                    backgroundColor: 'rgba(0, 0, 255,0.5)',
                                    borderWidth: 2,
                                    borderRadius: 2,
                                    borderSkipped: false,
                                },
                                {
                                    label: 'Rencana Tanggap Darurat',
                                    data: [30, 34, 26, 30, 33, 30, 33],
                                    borderColor: 'rgb(255, 255, 0)',
                                    backgroundColor: 'rgba(255, 255, 0,0.5)',
                                    borderWidth: 2,
                                    borderRadius: 2,
                                    borderSkipped: false,
                                },
                                {
                                    label: 'Perlindungan Aset',
                                    data: [71, 75, 62, 72, 78, 59, 61],
                                    borderColor: 'rgb(0, 255, 0)',
                                    backgroundColor: 'rgba(0, 255, 0,0.5)',
                                    borderWidth: 2,
                                    borderRadius: 2,
                                    borderSkipped: false,
                                }
                            ]
                        };

                        const config = {
                            type: 'bar',
                            data: data,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                    },
                                    title: {
                                        display: false,
                                        font: {
                                            size: 14,
                                        },
                                        text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                                    }
                                }
                            },
                        };

                        // === include 'setup' then 'config' above ===

                        var chart1 = new Chart(
                            document.getElementById('chart1'),
                            config
                        );
                    </script>
                </div>

                <div class="col mb-4">
                    <div class="card">
                        <h5 class="card-header my-3" style="text-align: center;">Proporsi Karakteristik Wilayah Satuan Kerja BPS</h5>
                        <div class="card-body">
                            <canvas id="chart2"></canvas>
                        </div>
                    </div>
                    <script>
                        const labels2 = ["Dekat Gunung Berapi", "Dataran Tinggi", "Dekat Dengan Sungai", "Daerah Pesisir"];
                        const data2 = {
                            labels: labels2,
                            datasets: [{
                                label: 'Karakteristik Wilayah',
                                data: [7.74, 18.38, 32.50, 42.55],
                                borderColor: 'rgb(255, 0, 0)',
                                backgroundColor: 'rgba(255, 0, 0,0.5)',
                                borderWidth: 2,
                                borderRadius: 2,
                                borderSkipped: false,
                            }]
                        };

                        const config2 = {
                            type: 'bar',
                            data: data2,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'bottom',

                                    },
                                    title: {
                                        display: false,
                                        font: {
                                            size: 14,
                                        },
                                        text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                                    }
                                }
                            },
                        };

                        // === include 'setup' then 'config' above ===

                        var chart2 = new Chart(
                            document.getElementById('chart2'),
                            config2
                        );
                    </script>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <!-- <div class="card-title title">
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
                    </div> -->
                    <div class="card">
                        <h5 class="card-header my-3" style="text-align: center;">Pengalaman Terdampak Bencana Alam dan Non Alam Satuan Kerja BPS</h5>
                        <div class="card-body">
                            <canvas id="chart3"></canvas>
                        </div>
                        <script>
                            const labels3 = ["Zona Merah Covid-19", "Gempa Bumi", "Banjir", "Angin Puting Beliung", "Kebakaran", "Gunung Berapi", "Tanah Longsor", "Tsunami"];
                            const data3 = {
                                labels: labels3,
                                datasets: [{
                                    label: 'Persentase',
                                    data: [27.85, 17.60, 8.12, 3.87, 3.48, 2.13, 1.74, 1.35],
                                    borderColor: 'rgb(255, 99, 0)',
                                    backgroundColor: 'rgba(255, 99, 0,0.5)',
                                    borderWidth: 2,
                                    borderRadius: 2,
                                    borderSkipped: false,
                                }]
                            };

                            const config3 = {
                                type: 'bar',
                                data: data3,
                                options: {
                                    indexAxis: 'y',
                                    // Elements options apply to all of the options unless overridden in a dataset
                                    // In this case, we are setting the border of each horizontal bar to be 2px wide
                                    elements: {
                                        bar: {
                                            borderWidth: 2,
                                        }
                                    },
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            display: false,
                                            position: 'bottom',
                                        },
                                        title: {
                                            display: false,
                                            font: {
                                                size: 14,
                                            },
                                            text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                                        }
                                    }
                                },
                            };

                            // === include 'setup' then 'config' above ===

                            var chart3 = new Chart(
                                document.getElementById('chart3'),
                                config3
                            );
                        </script>
                    </div>

                </div>

                <div class="col mb-4">
                    <!-- <div class="card-title title">
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
                    </div> -->
                    <div class="card">
                        <h5 class="card-header my-3" style="text-align: center;">Indikator Dimensi Sumber Daya Pendukung Menurut Kategori</h5>
                        <div class="card-body">
                            <canvas id="chart4"></canvas>
                        </div>
                        <script>
                            const labels4 = ["Sistem Peringatan Dini", "Mobilisasi Sumber Daya", "Perlengkapan Kebutuhan Dasar"];
                            const data4 = {
                                labels: labels4,
                                datasets: [{
                                        label: 'Kurang Memadai',
                                        data: [60.15, 68.47, 14.89],
                                        borderColor: 'rgb(255, 0, 0)',
                                        backgroundColor: 'rgba(255, 0, 0,0.5)',
                                        borderWidth: 2,
                                        borderRadius: 2,
                                        borderSkipped: false,
                                    },
                                    {
                                        label: 'Memadai',
                                        data: [21.08, 23.60, 65.76],
                                        borderColor: 'rgb(255, 255, 0)',
                                        backgroundColor: 'rgba(255, 255, 0,0.5)',
                                        borderWidth: 2,
                                        borderRadius: 2,
                                        borderSkipped: false,
                                    },
                                    {
                                        label: 'Sangat Memadai',
                                        data: [18.76, 7.93, 19.34],
                                        borderColor: 'rgb(0, 255, 0)',
                                        backgroundColor: 'rgba(0, 255, 0,0.5)',
                                        borderWidth: 2,
                                        borderRadius: 2,
                                        borderSkipped: false,
                                    }
                                ]
                            };

                            const config4 = {
                                type: 'bar',
                                data: data4,
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'bottom',
                                        },
                                        title: {
                                            display: false,
                                            font: {
                                                size: 14,
                                            },
                                            text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                                        },
                                    },
                                    scales: {
                                        x: {
                                            stacked: true,
                                        },
                                        y: {
                                            stacked: true
                                        }
                                    }
                                },
                            };

                            // === include 'setup' then 'config' above ===

                            var chart4 = new Chart(
                                document.getElementById('chart4'),
                                config4
                            );
                        </script>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card">
                        <h5 class="card-header my-3">Indikator Dimensi Perlindungan Aset Menurut Kategori</h5>
                        <div class="card-body">
                            <canvas id="chart5"></canvas>
                        </div>
                        <script>
                            const labels5 = ["Perlindungan Data dan Dokumen", "Perlindungan Properti dan Fasilitas"];
                            const data5 = {
                                labels: labels5,
                                datasets: [{
                                        label: 'Kurang Baik',
                                        data: [4.45, 6.19],
                                        borderColor: 'rgb(255, 0, 0)',
                                        backgroundColor: 'rgba(255, 0, 0,0.5)',
                                        borderWidth: 2,
                                        borderRadius: 2,
                                        borderSkipped: false,
                                    },
                                    {
                                        label: 'Baik',
                                        data: [13.35, 20.12],
                                        borderColor: 'rgb(255, 255, 0)',
                                        backgroundColor: 'rgba(255, 255, 0,0.5)',
                                        borderWidth: 2,
                                        borderRadius: 2,
                                        borderSkipped: false,
                                    },
                                    {
                                        label: 'Sangat Baik',
                                        data: [82.21, 73.69],
                                        borderColor: 'rgb(0, 255, 0)',
                                        backgroundColor: 'rgba(0, 255, 0,0.5)',
                                        borderWidth: 2,
                                        borderRadius: 2,
                                        borderSkipped: false,
                                    }
                                ]
                            };

                            const config5 = {
                                type: 'bar',
                                data: data5,
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'bottom',
                                        },
                                        title: {
                                            display: false,
                                            font: {
                                                size: 14,
                                            },
                                            text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                                        },
                                    },
                                    scales: {
                                        x: {
                                            stacked: true,
                                        },
                                        y: {
                                            stacked: true
                                        }
                                    }
                                },
                            };

                            // === include 'setup' then 'config' above ===

                            var chart5 = new Chart(
                                document.getElementById('chart5'),
                                config5
                            );
                        </script>
                    </div>
                </div>

                <div class="col mb-4">
                    <!-- <div class="card-title title">
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
                    </div> -->
                    <div class="card">
                        <h5 class="card-header my-3" style="text-align: center;">IMKB Satuan Kerja BPS Menurut Tingkatan Satuan Kerja</h5>
                        <div class="card-body">
                            <canvas id="chart6"></canvas>
                        </div>
                    </div>
                    <script>
                        const labels6 = ["Kabupaten/Kota", "Provinsi", "Pusat"];
                        const data6 = {
                            labels: labels6,
                            datasets: [{
                                label: 'IMKB',
                                data: [42.29, 61.84, 71.55],
                                borderColor: 'rgb(25, 74, 0)',
                                backgroundColor: 'rgba(25, 74, 0,0.5)',
                                borderWidth: 2,
                                borderRadius: 2,
                                borderSkipped: false,
                            }]
                        };

                        const config6 = {
                            type: 'bar',
                            data: data6,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                    },
                                    title: {
                                        display: false,
                                        font: {
                                            size: 14,
                                        },
                                        text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                                    }
                                }
                            },
                        };

                        // === include 'setup' then 'config' above ===

                        var chart6 = new Chart(
                            document.getElementById('chart6'),
                            config6
                        );
                    </script>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card">
                        <h5 class="card-header my-3" style="text-align: center;">IMKB Satuan Kerja BPS Menurut Kategori (%)</h5>
                        <div class="card-body">
                            <canvas id="chart7"></canvas>
                        </div>
                    </div>
                    <script>
                        const labels7 = ["Sangat Siap", "Siap", "Hampir Siap", "Kurang Siap", "Belum Siap"];
                        const data7 = {
                            labels: labels7,
                            datasets: [{
                                label: 'Persentase',
                                data: [2, 9, 13, 34, 42],
                                borderColor: 'rgb(51,51,51)',
                                backgroundColor: ['rgba(0, 0, 255,0.5)', 'rgba(51, 204, 51,0.5)', 'rgba(255, 255, 0,0.5)', 'rgba(255, 153, 0,0.5)', 'rgba(255, 0, 0,0.5)'],
                                borderWidth: 2,
                                borderRadius: 2,
                                borderSkipped: false,
                                radius: '60%'
                            }]
                        };

                        const config7 = {
                            type: 'pie',
                            data: data7,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                    },
                                    title: {
                                        display: false,
                                        font: {
                                            size: 14,
                                        },
                                        text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                                    }
                                }
                            },
                        };

                        // === include 'setup' then 'config' above ===

                        var chart7 = new Chart(
                            document.getElementById('chart7'),
                            config7
                        );
                    </script>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <h5 class="card-header my-3" style="text-align: center;">Indeks Masing-Masing Dimensi Satuan Kerja Menurut Dimensi Berdasarkan Tingkatan Satuan Kerja</h5>
                        <div class="card-body">
                            <canvas id="chart8"></canvas>
                        </div>
                    </div>
                    <script>
                        const labels8 = ["Sumber Daya Pendukung", "Rencana Tanggap Darurat", "Pemulihan dan Penanggulangan Darurat", "Perlindungan Aset"];
                        const data8 = {
                            labels: labels8,
                            datasets: [{
                                    label: 'Pusat',
                                    data: [20, 90, 13, 34],
                                    borderColor: 'rgb(255,0,0)',
                                    backgroundColor: 'rgba(0,0,255,0)',
                                    borderWidth: 2,
                                    borderRadius: 2,
                                    borderSkipped: false,
                                },
                                {
                                    label: 'Provinsi',
                                    data: [42, 59, 63, 80],
                                    borderColor: 'rgb(0,255,255)',
                                    backgroundColor: 'rgba(0,0,0,0)',
                                    borderWidth: 2,
                                    borderRadius: 2,
                                    borderSkipped: false,
                                },
                                {
                                    label: 'Kabupaten/Kota',
                                    data: [62, 79, 13, 40],
                                    borderColor: 'rgb(0,255,0)',
                                    backgroundColor: 'rgba(0,0,0,0)',
                                    borderWidth: 2,
                                    borderRadius: 2,
                                    borderSkipped: false,
                                }
                            ]
                        };

                        const config8 = {
                            type: 'radar',
                            data: data8,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                    },
                                    title: {
                                        display: false,
                                        font: {
                                            size: 14,
                                        },
                                        text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                                    }
                                }
                            },
                        };

                        // === include 'setup' then 'config' above ===

                        var chart8 = new Chart(
                            document.getElementById('chart8'),
                            config8
                        );
                    </script>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card">
                        <h5 class="card-header my-3" style="text-align: center;">IMKB Satuan Kerja BPS Suv Covid-19 Menurut Pulau</h5>
                        <div class="card-body">
                            <canvas id="chart9"></canvas>
                        </div>
                    </div>
                    <script>
                        const labels9 = ["Pulau Nusa Tenggara", "Kepulauan Maluku", "Pulau Papua", "Pulau Sumatera", "Pulau Kalimantan", "Pulau Sulawesi", "Pulau Jawa-Bali"];
                        const data9 = {
                            labels: labels9,
                            datasets: [{
                                label: 'Sub IMKB Covid-19',
                                data: [33.18, 34.25, 35.46, 38.04, 39.83, 40.69, 46.97],
                                borderColor: 'rgb(51,51,51)',
                                backgroundColor: 'rgba(0,0,255,0.5)',
                                borderWidth: 2,
                                borderRadius: 2,
                                borderSkipped: false,
                            }]
                        };

                        const config9 = {
                            type: 'bar',
                            data: data9,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                    },
                                    title: {
                                        display: false,
                                        font: {
                                            size: 14,
                                        },
                                        text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                                    }
                                }
                            },
                        };

                        // === include 'setup' then 'config' above ===

                        var chart9 = new Chart(
                            document.getElementById('chart9'),
                            config9
                        );
                    </script>
                </div>
                <div class="col mb-4">

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
                <div class="card">
                    <h5 class="card-header my-3" style="text-align: center;">IMKB Pegawai Dalam Satuan Kerja BPS Menurut Kategori (%)
                    </h5>
                    <div class="card-body">
                        <canvas id="chart10"></canvas>
                    </div>
                </div>
                <script>
                    const labels10 = ["Sangat Siap", "Siap", "Hampir Siap", "Kurang Siap", "Belum Siap"];
                    const data10 = {
                        labels: labels10,
                        datasets: [{
                            label: 'Persentase',
                            data: [27, 49, 18, 5, 1],
                            borderColor: 'rgb(51,51,51)',
                            backgroundColor: ['rgba(0, 0, 255,0.5)', 'rgba(51, 204, 51,0.5)', 'rgba(255, 255, 0,0.5)', 'rgba(255, 153, 0,0.5)', 'rgba(255, 0, 0,0.5)'],
                            borderWidth: 2,
                            borderRadius: 2,
                            borderSkipped: false,
                            radius: '60%'
                        }]
                    };

                    const config10 = {
                        type: 'pie',
                        data: data10,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                },
                                title: {
                                    display: false,
                                    font: {
                                        size: 14,
                                    },
                                    text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                                }
                            }
                        },
                    };

                    // === include 'setup' then 'config' above ===

                    var chart10 = new Chart(
                        document.getElementById('chart10'),
                        config10
                    );
                </script>
            </div>
            <div class="col mb-4">
                <div class="card" style="background-color: white;">
                    <h5 class="card-header my-3" style="text-align: center;">Indeks Pegawai Satuan Kerja BPS
                        Pada Tingkatan Satuan Kerja Menurut Dimensi
                    </h5>
                    <div class="card-body">
                        <canvas id="chart11"></canvas>
                    </div>
                </div>

                <script>
                    const labels11 = ["Pengetahuan & Pengalaman", "Sumber Daya Pendukung", "Rencana Tanggap Darurat"];
                    const data11 = {
                        labels: labels11,
                        datasets: [{
                                label: 'Pusat',
                                data: [79.38, 65.35, 66.07],
                                borderColor: 'rgb(255, 0, 0)',
                                backgroundColor: 'rgba(255, 0, 0,0.5)',
                                borderWidth: 2,
                                borderRadius: 2,
                                borderSkipped: false,
                            },
                            {
                                label: 'Provins',
                                data: [80.49, 67.97, 66.65],
                                borderColor: 'rgb(0, 0, 255)',
                                backgroundColor: 'rgba(0, 0, 255,0.5)',
                                borderWidth: 2,
                                borderRadius: 2,
                                borderSkipped: false,
                            },
                            {
                                label: 'Kabupaten/Kota',
                                data: [79.73, 68.36, 66.03],
                                borderColor: 'rgb(255, 255, 0)',
                                backgroundColor: 'rgba(255, 255, 0,0.5)',
                                borderWidth: 2,
                                borderRadius: 2,
                                borderSkipped: false,
                            }
                        ]
                    };

                    const config11 = {
                        type: 'bar',
                        data: data11,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                },
                                title: {
                                    display: false,
                                    font: {
                                        size: 14,
                                    },
                                    text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                                }
                            }
                        },
                    };

                    // === include 'setup' then 'config' above ===

                    var chart11 = new Chart(
                        document.getElementById('chart11'),
                        config11
                    );
                </script>
            </div>
        </div>

    </div>


    <?= $this->endSection(); ?>