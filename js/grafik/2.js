const labels = ["Dekat Gunung Berapi", "Dataran Tinggi", "Dekat Dengan Sungai", "Daerah Pesisir"];
                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Karakteristik Wilayah',
                                data: [7.74, 18.38, 32.50, 42.55],
                                backgroundColor: '#ffa600',
                                borderSkipped: false,
                            }]
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
                                        text: 'Proporsi Karakteristik Wilayah Satuan Kerja BPS'
                                    }
                                }
                            },
                        };

                        // === include 'setup' then 'config' above ===

                        var chart = new Chart(
                            document.getElementById('chart'),
                            config
                        );