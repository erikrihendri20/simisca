const labels = ["Sangat Siap", "Siap", "Hampir Siap", "Kurang Siap", "Belum Siap"];
                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Persentase',
                                data: [2, 9, 13, 34, 42],
                                backgroundColor: ['#003f5c', '#58508d', '#bc5090', '#ff6361', '#ffa600'],
                                borderSkipped: false,
                                radius: '60%'
                            }]
                        };

                        const config = {
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

                        // === include 'setup' then 'config' above ===

                        var chart = new Chart(
                            document.getElementById('chart'),
                            config
                        );