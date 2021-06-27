const labels = ["Sistem Peringatan Dini", "Mobilisasi Sumber Daya", "Perlengkapan Kebutuhan Dasar"];
                            const data = {
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

                            // === include 'setup' then 'config' above ===

                            var chart = new Chart(
                                document.getElementById('chart'),
                                config
                            );