function requestData() {
    $.get('../getResponses' , (data) => {
        data = JSON.parse(data)
        kodesatker = $('#kodesatker').val().substr(0,2)
        selesai = data['responses'].filter(d => d['lastpage']==8 && d['R3B01Q002'] == kodesatker)
        sedang = data['responses'].filter(d => d['lastpage']==null && d['R3B01Q002'] == kodesatker)
        belum = 517 - selesai.length - sedang.length

        $('#detailMonitoringProvinsi').html(`
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
        </tfoot>`)
        satkerInProvinsi = data['satker'].filter(d => (kodesatker==31) ? (d['kodesatker'].substr(0,2) == kodesatker || d['kodesatker'] == 1 || d['kodesatker'] == 2|| d['kodesatker'] == 3) : (d['kodesatker'].substr(0,2) == kodesatker))
        $('#persentaseProvinsi').css('stroke-dashoffset', `calc(440 - (440 * ${selesai.length*100/satkerInProvinsi.length})/100)`)
        $('#valuePersentaseProvinsi').html(`${(selesai.length*100/satkerInProvinsi.length).toFixed(1)}<span>%</span>`)
        progress = ''

        satkerInProvinsi.forEach(p => {
            progressSatker = selesai.find(s => s['R3B01Q003'] == p['kodesatker'])
            console.log(typeof (progressSatker))
            progress = progress + `<div class="section">
            <div  class="prov">
                <span>${p['namasatker']}</span>
            </div>
            <div class="progressBar">
                <div class="progressBarFill" style="width: ${(typeof (progressSatker) == 'undefined') ? 0 : progressSatker['lastpage']/8*100}%;"></div>
            </div>
            <div class="percentage">
                <span class="changePercent">${(typeof (progressSatker) == 'undefined') ? 0 : progressSatker['lastpage']/8*100}%</span>
            </div>
            <div class="greater">
                <span class="greaterIn">></span>
            </div>
        </div>`
        });
        $('#progressInProvinsi').html(
            progress
        )
        tr = ''
        satkerInProvinsi.forEach(d => {
            statusSatker = data['responses'].find(r => r['R3B01Q003'] == d['kodesatker'])
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
                <th>${satkerInProvinsi.length}</th>
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
    $("#tombolExportProvinsi").click(function(){
        $("#detailMonitoringProvinsi").table2excel({
            name: "Progress Provinsi",
            filename: "Progress Provinsi",
            fileext: ".xls",
            preserveColors: true
        }); 
        
      });
    
})