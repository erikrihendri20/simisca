getImkbSatker = () => {
    $.get('Dashboard/getImkbByKodesatker/'+$('#kodesatker').val()+'/'+$('#tahun-imkb').val() , (data , status) => {
        data = JSON.parse(data)
        console.log(data)
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

$(document).ready(() => {
    getImkbSatker()
})