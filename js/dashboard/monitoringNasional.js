function requestData() {
    $.get('getResponses' , (data) => {
        data = JSON.parse(data)
        selesai = data['responses'].filter(d => d['lastpage']==8)
        sedang = data['responses'].filter(d => d['lastpage']==null)
        belum = 517 - selesai.length - sedang.length

        $('#detailMonitoringNasional').html(`
        <thead>
            <tr>
                <th>status</th>
                <th>jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>selesai mengisi</td>
                <td>${selesai.length}</td>
            </tr>
            <tr>
                <td>sedang mengisi</td>
                <td>${sedang.length}</td>
            </tr>
            <tr>
                <td>belum mengisi</td>
                <td>${belum}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>total</th>
                <th>${selesai.length + sedang.length + belum}</th>
            </tr>
        </tfoot>
        `)

        $('#persentaseNasional').css('stroke-dashoffset', `calc(440 - (440 * ${selesai.length*100/517})/100)`)
        $('#valuePersentaseNasional').html(`${(selesai.length*100/517).toFixed(1)}<span>%</span>`)
        progress = ''
        data['provinsi'].forEach(d => {
            progressProvinsi = selesai.filter(s => s['R3B01Q002'] == d['kodesatker'].substr(0,2)).length
            provinsi = data['satker'].filter(s => s['kodesatker'].substr(0,2) == d['kodesatker'].substr(0,2)).length
            progress = progress + `
            <div class="section">
                <div  class="prov">
                    <span>${d['namasatker'].substr(4)}</span>
                </div>
                <div class="progressBar">
                    <div class="progressBarFill" style="width: ${(d['kodesatker'].substr(31)==31) ? progressProvinsi/(provinsi+3)*100 : progressProvinsi/provinsi*100}%;"></div>
                </div>
                <div class="percentage">
                    <span class="changePercent">${(d['kodesatker'].substr(0,2)==31) ? (progressProvinsi/(provinsi+3)*100).toFixed(1) : (progressProvinsi/provinsi*100).toFixed(1)}%</span>
                </div>
                <div class="greater">
                    <span class="greaterIn"><a href="monitoringProvinsi/${d['kodesatker']}">></a></span>
                </div>
            </div>`
        })
        $('#progressPerProvinsi').html(progress)
        tr = ''
        data['satker'].forEach(d => {
            statusSatker=data['responses'].find(r => r['R3B01Q003'] == d['kodesatker'])
            tr = tr + `<tr>
                <td>${d['namasatker']}</td>
                <td>${(statusSatker == undefined) ? 'belum mengisi' : (statusSatker['lastpage']==8) ? 'selesai mengisi' : 'belum selesai'}</td>
            </tr>`
        })
        table = `<table id="statusPengisian">
            <thead>
                <tr>
                    <th>Nama Satker</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                ${tr}
            </tbody>
            <tfoot>
                <th>Total</th>
                <th>sdf</th>
            </tfoot>
        </table>`
        $('#satkerStatusTable').html(table)
        $('#statusPengisian').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    })
}

$(document).ready(function() {
    requestData()
    // $("#unduh-raw-data").click(function(){
    //     $("#detailMonitoringNasional").table2excel({
    //         name: "Progress Nasional",
    //         filename: "Progress Nasional",
    //         fileext: ".xls",
    //         preserveColors: true
    //     });
    //   });
    
    
})