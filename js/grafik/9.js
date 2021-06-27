const labels = ["Pulau Nusa Tenggara", "Kepulauan Maluku", "Pulau Papua", "Pulau Sumatera", "Pulau Kalimantan", "Pulau Sulawesi", "Pulau Jawa-Bali"];
                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Sub IMKB Covid-19',
                                data: [33.18, 34.25, 35.46, 38.04, 39.83, 40.69, 46.97],
                                backgroundColor: '#bc5090',
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
                                        text: 'IMKB Satuan Kerja BPS Suv Covid-19 Menurut Pulau'
                                    }
                                }
                            },
                        };

                        // === include 'setup' then 'config' above ===

                        var chart = new Chart(
                            document.getElementById('chart'),
                            config
                        );