const labels = ["Sumber Daya Pendukung", "Rencana Tanggap Darurat", "Pemulihan dan Penanggulangan Darurat", "Perlindungan Aset"];
                        const data = {
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

                        const config = {
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

                        // === include 'setup' then 'config' above ===

                        var chart = new Chart(
                            document.getElementById('chart'),
                            config
                        );