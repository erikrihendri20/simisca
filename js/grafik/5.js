const labels = ["Perlindungan Data dan Dokumen", "Perlindungan Properti dan Fasilitas"];
                            const data = {
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

                            // === include 'setup' then 'config' above ===

                            var chart = new Chart(
                                document.getElementById('chart'),
                                config
                            );