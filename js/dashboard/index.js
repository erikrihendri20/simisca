getImkbSatker = () => {
    $.get('Dashboard/getImkbByKodesatker/'+$('#kodesatker').val()+'/'+$('#tahun-imkb').val() , (data , status) => {
        data = JSON.parse(data)
        row = `<tr class="putih">
        <td class="tul">IMKB Satker</td>
        <td class="tul pr-3">`+Number(data[0]['IMKB']).toFixed(2)+`</td>
        </tr>
        <tr class="kuning">
            <td class="tul">Sub Bencana Alam</td>
            <td class="tul pr-3">`+Number(data[0]['simkb_bencana']).toFixed(2)+`</td>
        </tr>
        <tr class="putih">
            <td class="tul">Sub Kebakaran</td>
            <td class="tul pr-3">`+Number(data[0]['simkb_kebakaran']).toFixed(2)+`</td>
        </tr>
        <tr class="kuning">
            <td class="tul">Sub Pandemi COVID-19</td>
            <td class="tul pr-3">`+Number(data[0]['simkb_covid19']).toFixed(2)+`</td>
        </tr>`
        
        $('#imkb').html(`<tbody>
        `+row+`
    </tbody>`)
    })
}

getResponseRate = () => {
    $.get('Dashboard/getResponseRate/'+$('#response-rate').val() , (data) => {
        data = JSON.parse(data)
        kabupaten = data.filter(d => d['kodesatker'].substr(2,4) != 0 && d['kodesatker']!= 1 && d['kodesatker']!= 2 && d['kodesatker']!= 3 ).length/480*100
        pusat = data.filter(d => d['kodesatker'] == 1 || d['kodesatker'] == 2 || d['kodesatker'] == 3).length/3*100
        provinsi = data.filter(d => d['kodesatker'].substr(2,4) == '00').length/34*100
        $('#response-rate-kabupaten').css('width',`${kabupaten}%`)
        $('#response-rate-provinsi').css('width',`${provinsi}%`)
        $('#response-rate-pusat').css('width',`${pusat}%`)
        $('#response-rate-kabupaten-value').html(`${kabupaten}%`)
        $('#response-rate-provinsi-value').html(`${provinsi}%`)
        $('#response-rate-pusat-value').html(`${pusat}%`)
    })
}

$(document).ready(() => {
    getResponseRate()
    $('#response-rate').change( () => {
        getResponseRate()
    })
    getImkbSatker()
})