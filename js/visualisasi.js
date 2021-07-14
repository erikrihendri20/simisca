function openPage(pageName, elmnt, color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;
}

document.getElementById("defaultOpen").click();

var chart = new Chart($('#chart'));
var chart2 = new Chart($('#chart2'));

function updateGrafik(val) {
    let labels,data,config;
    if(val==1){
        labels = ["Sumatera", "Jawa-Bali", "Nusa Tenggara", "Kalimantan", "Sulawesi", "Maluku", "Papua"];
        
        data = {
            labels: labels,
            datasets: [{
                    label: 'Sumber Daya Pendukung',
                    data: [36, 46, 33, 38, 39, 34, 30],
                    backgroundColor: '#003f5c',
                    borderSkipped: false,
                },
                {
                    label: 'Pemulihan dan Penanggulangan Darurat',
                    data: [28, 38, 26, 32, 30, 25, 24],
                    backgroundColor: '#58508d',
                    borderSkipped: false,
                },
                {
                    label: 'Rencana Tanggap Darurat',
                    data: [30, 34, 26, 30, 33, 30, 33],
                    backgroundColor: '#bc5090',
                    borderSkipped: false,
                },
                {
                    label: 'Perlindungan Aset',
                    data: [71, 75, 62, 72, 78, 59, 61],
                    backgroundColor: '#ff6361',
                    borderSkipped: false,
                }
            ]
        };
    
        config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        font: {
                            size: 14,
                        },
                        text: 'Diagram Batang Indeks Masing-Masing Dimensi Satuan Kerja BPS Menurut Pulau Berdasarkan Dimensi'
                    }
                }
            },
        };
        globalThis.chart.config = config;
        globalThis.chart.data = data;
        globalThis.chart.labels = labels;
        globalThis.chart.update();
    }else if(val==2){
        labels = ["Dekat Gunung Berapi", "Dataran Tinggi", "Dekat Dengan Sungai", "Daerah Pesisir"];
        data = {
            labels: labels,
            datasets: [{
                label: 'Karakteristik Wilayah',
                data: [7.74, 18.38, 32.50, 42.55],
                backgroundColor: '#ffa600',
                borderSkipped: false,
            }]
        };
    
        config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
    
                    },
                    title: {
                        display: true,
                        font: {
                            size: 14,
                        },
                        text: 'Proporsi Karakteristik Wilayah Satuan Kerja BPS'
                    }
                }
            },
        };
        globalThis.chart.config = config;
        globalThis.chart.data = data;
        globalThis.chart.labels = labels;
        globalThis.chart.update();
    }else if(val==3){
        labels = ["Zona Merah Covid-19", "Gempa Bumi", "Banjir", "Angin Puting Beliung", "Kebakaran", "Gunung Berapi", "Tanah Longsor", "Tsunami"];
            data = {
            labels: labels,
            datasets: [{
                label: 'Persentase',
                data: [27.85, 17.60, 8.12, 3.87, 3.48, 2.13, 1.74, 1.35],
                backgroundColor: '#003f5c',
                borderSkipped: false,
            }]
        };

        config = {
        type: 'bar',
        data: data,
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
                    display: true,
                    font: {
                        size: 14,
                    },
                    text: 'Pengalaman Terdampak Bencana Alam dan Non Alam Satuan Kerja BPS'
                }
            }
        },
    };
    globalThis.chart.config = config;
    globalThis.chart.data = data;
    globalThis.chart.labels = labels;
    globalThis.chart.update();
    }else if(val==4){
        labels = ["Sistem Peringatan Dini", "Mobilisasi Sumber Daya", "Perlengkapan Kebutuhan Dasar"];
        data = {
            labels: labels,
            datasets: [{
                    label: 'Kurang Memadai',
                    data: [60.15, 68.47, 14.89],
                    backgroundColor: '#58508d',
                    borderSkipped: false,
                },
                {
                    label: 'Memadai',
                    data: [21.08, 23.60, 65.76],
                    backgroundColor: '#bc5090',
                    borderSkipped: false,
                },
                {
                    label: 'Sangat Memadai',
                    data: [18.76, 7.93, 19.34],
                    backgroundColor: '#ff6361',
                    borderSkipped: false,
                }
            ]
        };

        config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display:true,
                        font: {
                            size: 14,
                        },
                        text: 'Indikator Dimensi Sumber Daya Pendukung Menurut Kategori'
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
        globalThis.chart.config = config;
        globalThis.chart.data = data;
        globalThis.chart.labels = labels;
        globalThis.chart.update();
    }else if(val==5){
        labels = ["Perlindungan Data dan Dokumen", "Perlindungan Properti dan Fasilitas"];
        data = {
            labels: labels,
            datasets: [{
                    label: 'Kurang Baik',
                    data: [4.45, 6.19],
                    backgroundColor: '#003f5c',
                    borderSkipped: false,
                },
                {
                    label: 'Baik',
                    data: [13.35, 20.12],
                    borderColor: 'rgb(255, 255, 0)',
                    backgroundColor: '#bc5090',
                    borderSkipped: false,
                },
                {
                    label: 'Sangat Baik',
                    data: [82.21, 73.69],
                    backgroundColor: '#ffa600',
                    borderSkipped: false,
                }
            ]
        };

        config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display:true,
                        font: {
                            size: 14,
                        },
                        text: 'Indikator Dimensi Perlindungan Aset Menurut Kategori'
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
        globalThis.chart.config = config;
        globalThis.chart.data = data;
        globalThis.chart.labels = labels;
        globalThis.chart.update();
    }else if(val==6){
        labels = ["Kabupaten/Kota", "Provinsi", "Pusat"];
        data = {
            labels: labels,
            datasets: [{
                label: 'IMKB',
                data: [42.29, 61.84, 71.55],
                backgroundColor: '#ff6361',
                borderSkipped: false,
            }]
        };
    
        config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        font: {
                            size: 14,
                        },
                        text: 'IMKB Satuan Kerja BPS Menurut Tingkatan Satuan Kerja'
                    }
                }
            },
        };
        globalThis.chart.config = config;
        globalThis.chart.data = data;
        globalThis.chart.labels = labels;
        globalThis.chart.update();
    }else if(val==7){
        labels = ["Sangat Siap", "Siap", "Hampir Siap", "Kurang Siap", "Belum Siap"];
        data = {
            labels: labels,
            datasets: [{
                label: 'Persentase',
                data: [2, 9, 13, 34, 42],
                backgroundColor: ['#003f5c', '#58508d', '#bc5090', '#ff6361', '#ffa600'],
                borderSkipped: false,
                radius: '60%'
            }]
        };

        config = {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        font: {
                            size: 14,
                        },
                        text: 'IMKB Satuan Kerja BPS Menurut Kategori (%)'
                    }
                }
            },
        };
        globalThis.chart.config = config;
        globalThis.chart.data = data;
        globalThis.chart.labels = labels;
        globalThis.chart.update();
        
    }else if(val==8){
        labels = ["Sumber Daya Pendukung", "Rencana Tanggap Darurat", "Pemulihan dan Penanggulangan Darurat", "Perlindungan Aset"];
        data = {
            labels: labels,
            datasets: [{
                    label: 'Pusat',
                    data: [20, 90, 13, 34],
                    borderColor: '#003f5c',
                    backgroundColor: 'rgba(0,0,0,0)',
                    borderWidth: 2,
                    borderRadius: 2,
                    borderSkipped: false,
                },
                {
                    label: 'Provinsi',
                    data: [42, 59, 63, 80],
                    borderColor: '#ff6361',
                    backgroundColor: 'rgba(0,0,0,0)',
                    borderWidth: 2,
                    borderRadius: 2,
                    borderSkipped: false,
                },
                {
                    label: 'Kabupaten/Kota',
                    data: [62, 79, 13, 40],
                    borderColor: '#bc5090',
                    backgroundColor: 'rgba(0,0,0,0)',
                    borderWidth: 2,
                    borderRadius: 2,
                    borderSkipped: false,
                }
            ]
        };

        config = {
            type: 'radar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        font: {
                            size: 14,
                        },
                        text: 'Indeks Masing-Masing Dimensi Satuan Kerja Menurut Dimensi Berdasarkan Tingkatan Satuan Kerja'
                    }
                }
            },
        };
        globalThis.chart.config = config;
        globalThis.chart.data = data;
        globalThis.chart.labels = labels;
        globalThis.chart.update();
        
    }else if(val==9){
        labels = ["Pulau Nusa Tenggara", "Kepulauan Maluku", "Pulau Papua", "Pulau Sumatera", "Pulau Kalimantan", "Pulau Sulawesi", "Pulau Jawa-Bali"];
        data = {
            labels: labels,
            datasets: [{
                label: 'Sub IMKB Covid-19',
                data: [33.18, 34.25, 35.46, 38.04, 39.83, 40.69, 46.97],
                backgroundColor: '#bc5090',
                borderSkipped: false,
            }]
        };

        config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        font: {
                            size: 14,
                        },
                        text: 'IMKB Satuan Kerja BPS Suv Covid-19 Menurut Pulau'
                    }
                }
            },
        };

        globalThis.chart.config = config;
        globalThis.chart.data = data;
        globalThis.chart.labels = labels;
        globalThis.chart.update();
        
    }else if(val==10){
        labels = ["Sangat Siap", "Siap", "Hampir Siap", "Kurang Siap", "Belum Siap"];
        data = {
            labels: labels,
            datasets: [{
                label: 'Persentase',
                data: [27, 49, 18, 5, 1],
                backgroundColor: ['#003f5c', '#58508d', '#bc5090', '#ff6361', '#ffa600'],
                borderSkipped: false,
                radius: '60%'
            }]
        };

        config = {
            type: 'pie',
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

        globalThis.chart2.config = config;
        globalThis.chart2.data = data;
        globalThis.chart2.labels = labels;
        globalThis.chart2.update();
    }else if(val==11){
        labels = ["Pulau Nusa Tenggara", "Kepulauan Maluku", "Pulau Papua", "Pulau Sumatera", "Pulau Kalimantan", "Pulau Sulawesi", "Pulau Jawa-Bali"];
        data = {
            labels: labels,
            datasets: [{
                label: 'Sub IMKB Covid-19',
                data: [33.18, 34.25, 35.46, 38.04, 39.83, 40.69, 46.97],
                backgroundColor: '#bc5090',
                borderSkipped: false,
            }]
        };

        config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        font: {
                            size: 14,
                        },
                        text: 'IMKB Satuan Kerja BPS Suv Covid-19 Menurut Pulau'
                    }
                }
            },
        };

        globalThis.chart2.config = config;
        globalThis.chart2.data = data;
        globalThis.chart2.labels = labels;
        globalThis.chart2.update();
    }
}


$(document).ready(() => {
    updateGrafik($('#grafik-satker').val());
    updateGrafik($('#grafik-pegawai').val());
    $('#grafik-satker').change(() => {
        updateGrafik($('#grafik-satker').val());
    })
    $('#grafik-pegawai').change(() => {
        updateGrafik($('#grafik-pegawai').val());
    })
})