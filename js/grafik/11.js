const labels = ["Pengetahuan & Pengalaman", "Sumber Daya Pendukung", "Rencana Tanggap Darurat"];
                    const data = {
                        labels: labels,
                        datasets: [{
                                label: 'Pusat',
                                data: [79.38, 65.35, 66.07],
                                backgroundColor: '#bc5090',
                                borderSkipped: false,
                            },
                            {
                                label: 'Provins',
                                data: [80.49, 67.97, 66.65],
                                backgroundColor: '#ff6361',
                                borderSkipped: false,
                            },
                            {
                                label: 'Kabupaten/Kota',
                                data: [79.73, 68.36, 66.03],
                                backgroundColor: '#ffa600',
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

                    var chart = new Chart(
                        document.getElementById('chart2'),
                        config
                    );