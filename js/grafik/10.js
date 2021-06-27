const labels = ["Sangat Siap", "Siap", "Hampir Siap", "Kurang Siap", "Belum Siap"];
                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'Persentase',
                            data: [27, 49, 18, 5, 1],
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