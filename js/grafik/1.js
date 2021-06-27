const labels = ["Sumatera", "Jawa-Bali", "Nusa Tenggara", "Kalimantan", "Sulawesi", "Maluku", "Papua"];
                        const data = {
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
                                        display: true,
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
                            document.getElementById('chart'),
                            config
                        );