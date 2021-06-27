const labels = ["Zona Merah Covid-19", "Gempa Bumi", "Banjir", "Angin Puting Beliung", "Kebakaran", "Gunung Berapi", "Tanah Longsor", "Tsunami"];
                            const data = {
                                labels: labels,
                                datasets: [{
                                    label: 'Persentase',
                                    data: [27.85, 17.60, 8.12, 3.87, 3.48, 2.13, 1.74, 1.35],
                                    backgroundColor: '#003f5c',
                                    borderSkipped: false,
                                }]
                            };

                            const config = {
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

                            // === include 'setup' then 'config' above ===

                            var chart = new Chart(
                                document.getElementById('chart'),
                                config
                            );