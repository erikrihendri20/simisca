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
    if(val==1){
        $.get('Visualisasi/getImkbTable/'+$('#tahun').val()+'/imkb' , (data , status) => {
            labels = ["Sumatera", "Jawa-Bali", "Nusa Tenggara", "Kalimantan", "Sulawesi", "Maluku", "Papua"];
            data = JSON.parse(data)
            kodePulau = [
                [11, 12, 13, 14, 15, 16, 17, 18, 19, 21],
                [31, 32, 33, 34, 35, 36, 51],
                [52, 53],
                [61, 62, 63, 64, 65],
                [71, 72, 73, 74, 75, 76],
                [81, 82],
                [91, 94]
            ];
            groupPulau = [];
            kodePulau.forEach(provinsi => {
                pulau = []
                provinsi.forEach(prov => {
                    if(prov==31){
                        filteredProvinsi = data.filter((d) => d.kodesatker.toString().substring(0,2) == prov || d.kodesatker == 1 || d.kodesatker ==2 || d.kodesatker == 3)
                    }else{
                        filteredProvinsi = data.filter((d) => d.kodesatker.toString().substring(0,2) == prov)
                    }
                    pulau = pulau.concat(filteredProvinsi)
                })
                var sdp = 0, ppd = 0, rtd = 0, pra = 0
                pulau.forEach((p) => {
                    sdp = sdp + p['dimensi sumber daya pendukung']
                    rtd = rtd + p['dimensi rencana tanggap darurat']
                    pra = pra + p['dimensi perlindungan aset']
                    ppd = ppd + p['dimensi pemulihan dan penanggulangan darurat']
                })
                groupProvinsi = {sdp, rtd, pra, ppd}
                groupPulau.push(groupProvinsi)
            });
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
        })
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
        $.get('Visualisasi/getImkbTable/'+$('#tahun').val()+'/imkb' , (data , status) => {
            data = JSON.parse(data)
            mobilisasi = []
            peringatan = []
            perlengkapan = []
            data.forEach((d) => {
                mobilisasi.push(d['total mobilisasi sumber daya'])
                peringatan.push(d['total sistem peringatan dini'])
                perlengkapan.push(d['total perlengkapan kebutuhan dasar'])
            })

            rataMobilisasi = 1/2*(Math.max.apply(null,mobilisasi) + Math.min.apply(null,mobilisasi))
            sdMobilisasi = 1/6*(Math.max.apply(null,mobilisasi) - Math.min.apply(null,mobilisasi))
            rataPeringatan = 1/2*(Math.max.apply(null,peringatan) + Math.min.apply(null,peringatan))
            sdPeringatan = 1/6*(Math.max.apply(null,peringatan) - Math.min.apply(null,peringatan))
            rataPerlengkapan = 1/2*(Math.max.apply(null,perlengkapan) + Math.min.apply(null,perlengkapan))
            sdPerlengkapan = 1/6*(Math.max.apply(null,perlengkapan) - Math.min.apply(null,perlengkapan))




            bawahMobilisasi = rataMobilisasi - sdMobilisasi
            bawahPeringatan = rataPeringatan - sdPeringatan
            bawahPerlengkapan = rataPerlengkapan - sdPerlengkapan
            
            atasMobilisasi = rataMobilisasi + sdMobilisasi
            atasPeringatan = rataPeringatan + sdPeringatan
            atasPerlengkapan = rataPerlengkapan + sdPerlengkapan
            
            agregatMobilisasi = {
                kurang : 0,
                memadai : 0,
                sangat : 0 
            }

            agregatPeringatan = {
                kurang : 0,
                memadai : 0,
                sangat : 0 
            }

            agregatPerlengkapan = {
                kurang : 0,
                memadai : 0,
                sangat : 0 
            }


            mobilisasi.forEach((m) => {
                (m<bawahMobilisasi) ? agregatMobilisasi.kurang++ : (m>atasMobilisasi) ? agregatMobilisasi.sangat++ : agregatMobilisasi.memadai++
            })
            
            agregatMobilisasi.kurang = agregatMobilisasi.kurang/517*100
            agregatMobilisasi.memadai = agregatMobilisasi.memadai/517*100
            agregatMobilisasi.sangat = agregatMobilisasi.sangat/517*100

            peringatan.forEach((p) => {
                (p<bawahPeringatan) ? agregatPeringatan.kurang++ : (p>atasPeringatan) ? agregatPeringatan.sangat++ : agregatPeringatan.memadai++
            })

            agregatPeringatan.kurang = agregatPeringatan.kurang/517*100
            agregatPeringatan.sangat = agregatPeringatan.sangat/517*100
            agregatPeringatan.memadai = agregatPeringatan.memadai/517*100
            
            perlengkapan.forEach((p) => {
                (p<bawahPerlengkapan) ? agregatPerlengkapan.kurang++ : (p>atasPerlengkapan) ? agregatPerlengkapan.sangat++ : agregatPerlengkapan.memadai++
            })

            agregatPerlengkapan.kurang = agregatPerlengkapan.kurang/517*100
            agregatPerlengkapan.memadai = agregatPerlengkapan.memadai/517*100
            agregatPerlengkapan.sangat = agregatPerlengkapan.sangat/517*100

            labels = ["Sistem Peringatan Dini", "Mobilisasi Sumber Daya", "Perlengkapan Kebutuhan Dasar"];

            data = {
                labels: labels,
                datasets: [{
                        label: 'Kurang Memadai',
                        data: [agregatPeringatan.kurang.toFixed(2), agregatMobilisasi.kurang.toFixed(2), agregatPerlengkapan.kurang.toFixed(2)],
                        backgroundColor: '#58508d',
                        borderSkipped: false,
                    },
                    {
                        label: 'Memadai',
                        data: [agregatPeringatan.memadai.toFixed(2), agregatMobilisasi.memadai.toFixed(2), agregatPerlengkapan.memadai.toFixed(2)],
                        backgroundColor: '#bc5090',
                        borderSkipped: false,
                    },
                    {
                        label: 'Sangat Memadai',
                        data: [agregatPeringatan.sangat.toFixed(2), agregatMobilisasi.sangat.toFixed(2), agregatPerlengkapan.sangat.toFixed(2)],
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

        })

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
    }else if(val==8){
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
    }else if(val==6){
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
    $('#download').click(() => {
        var a = document.createElement('a');
        a.href = chart.toBase64Image();
        a.download = 'chart satker.png';

        // Trigger the download
        a.click();
    })
    $('#download2').click(() => {
        var a = document.createElement('a');
        a.href = chart2.toBase64Image();
        a.download = 'chart pegawai.png';

        // Trigger the download
        a.click();
    })
})