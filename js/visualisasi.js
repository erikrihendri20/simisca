function openPage(pageName, elmnt, color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;
}

document.getElementById("defaultOpen").click();

$(document).ready(function() {
    //jenis daerah administratif tk II 
    data = {
        datasets: [{
            data: [98, 416],
            backgroundColor: ['rgba(182, 61, 69, 1)', 'rgba(0, 110, 186, 1)']
        }],
        labels: [
            'Kota',
            'Kabupaten'
        ]
    };

    var myDoughnutChart = new Chart($('#daerahAdministratif')[0].getContext('2d'), {
        type: 'doughnut',
        data: data
    });


    //spiderchart
    function getKabupatenKota() {
        $('#filterSpiderKabupaten').html('')
        $.post('/db/Visualisasi/getKabupatenKota', {
            kodelevel: $('#filterSpiderProvinsi').val()
        }, function(data, status) {
            result = JSON.parse(data)
            Object.keys(result).forEach(function(key) {
                $('#filterSpiderKabupaten').append('<option'.concat(' value=', '"', result[key]['kodesatker'], '"', '>', result[key]['namasatker'], '</option>'))
            })
            getSpiderChart()
        })
    }

    data = {
        labels: ['Dimensi 1', 'Dimensi 2', 'Dimensi 3', 'Dimensi 4', 'IMKB']
    }
    var spider = new Chart($('#spiderChart')[0].getContext('2d'), {
        type: 'radar',
        data: data
    });
    
    function getSpiderChart(){
        $( "#tidak-ditemukan" ).remove();

        $.post('/db/Visualisasi/getSpiderChart',{
            provinsi: $('#filterSpiderProvinsi').val(),
            kabupaten: $('#filterSpiderKabupaten').val()
        },function(data,status){
            result = JSON.parse(data)
            if(Object.keys(result).length == 2){
                spider.data.datasets.pop()
                spider.data.datasets.pop()
                spider.data.datasets.push({
                    label: result[0]['namasatker'],
                    borderColor: 'rgba(182, 61, 69, 1)',
                    backgroundColor: 'rgba(0,255,0,0.05)',
                    data: [result[0]['dimensi1'], result[0]['dimensi2'], result[0]['dimensi3'], result[0]['dimensi4'], result[0]['imkb']]
                })
                spider.data.datasets.push({
                    label: result[1]['namasatker'],
                    borderColor: 'rgba(0, 110, 186, 1)',
                    backgroundColor: 'rgba(0,255,0,0.05)',
                    data: [result[1]['dimensi1'], result[1]['dimensi2'], result[1]['dimensi3'], result[1]['dimensi4'], result[1]['imkb']]
                })
                spider.update()
            }else if(Object.keys(result).length == 1){
                spider.data.datasets.pop()
                spider.data.datasets.pop()
                spider.data.datasets.push({
                    label: result[0]['namasatker'],
                    borderColor: 'rgba(182, 61, 69, 1)',
                    backgroundColor: 'rgba(0,255,0,0.05)',
                    data: [result[0]['dimensi1'], result[0]['dimensi2'], result[0]['dimensi3'], result[0]['dimensi4'], result[0]['imkb']]
                })
                spider.update()
            }else{
                spider.data.datasets.pop()
                spider.data.datasets.pop()
                spider.update()
                $('<h4 id="tidak-ditemukan" class="text-center">Data tidak ditemukan</h4>').insertBefore('#spiderChart')
            }
        })
    }

    getKabupatenKota()
    $('#filterSpiderProvinsi').change(function() {
        getKabupatenKota()
    })
    $('#filterSpiderKabupaten').change(function() {
        getSpiderChart()
    })
})