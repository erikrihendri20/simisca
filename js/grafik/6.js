const labels = ["Kabupaten/Kota", "Provinsi", "Pusat"];
                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'IMKB',
                                data: [42.29, 61.84, 71.55],
                                backgroundColor: '#ff6361',
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
                                        text: 'IMKB Satuan Kerja BPS Menurut Tingkatan Satuan Kerja'
                                    }
                                }
                            },
                        };

                        // === include 'setup' then 'config' above ===

                        var chart = new Chart(
                            document.getElementById('chart'),
                            config
                        );