function changeSubject(){
  if($('#subjek').val() == 1){
    $('#filter-satker').css('display', 'flex')
    $('#filter-pegawai').css('display', 'none')
    requestTable('satker')
  }else{
    $('#filter-satker').css('display', 'none')
    $('#filter-pegawai').css('display', 'flex')
    requestTable('pegawai')
  }
}

function getAvg(grades) {
  return (grades.reduce(function (p, c) {
    return p + c;
  }) / grades.length).toFixed(2);
}

function loadTable(data) {
  
  
  tbody = ''
  keys = Object.keys(data[0])
  th = ''
  keys.forEach(key => {
    th = th + '<th>'+key.toUpperCase()+'</th>'
  })
  thead = '<tr>'+th+'</tr>'
  data.forEach((d) => {
    td = ''
    keys.forEach(key => {
      td = td +'<td>'+d[key]+'</td>'
    });
    tr='<tr>'+td+'</tr>'
    tbody = tbody + tr
  })
  table = '<table id="table"><thead>'+thead+'</thead><tbody>'+tbody+'</tbody></table>'
  $('#tabeldinamis').html(table)
  
  $('#table').DataTable({
    dom: 'Bfrtip',
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  })
}

function requestTable(subjek){
  if(subjek=='satker'){
    $.get('Visualisasi/getTable/satker/'+$('#indeks-satker').val()+'/'+$('#tahunsatker').val() , (data, status) => {
      data = JSON.parse(data)
      if(data.length==0) {
        $('#tabeldinamis').html('Data Belum Tersedia')
        return
      }
      if($('#indeks-satker').val()=='kebakaran'){
        groupPulau = [
          11, 12, 13, 14, 15, 16, 17, 18, 19, 21,
          31, 32, 33, 34, 35, 36, 51,
          52, 53,
          61, 62, 63, 64, 65,
          71, 72, 73, 74, 75, 76,
          81, 82,
          91, 94
        ]
        dataPulau = []
        groupPulau.forEach(p => {
          if(p==31){
            filtered = data.filter((d) => d['kodesatker'].substr(0,2)==p || d['kodesatker'] == 1 || d['kodesatker'] == 2 || d['kodesatker'] == 3)
          }else{
            filtered = data.filter((d) => d['kodesatker'].substr(0,2)==p)
          }
          provinsi = data.find((d) => d['kodesatker']==p+'00')
          imkb = []
          filtered.forEach((f) => {
            imkb.push(Number(f['simkb kebakaran']))
          })
          
          provinsi['simkb kebakaran'] = getAvg(imkb)
          dataPulau.push({'nama satker' : provinsi['nama satker'] , 'simkb kebakaran' : provinsi['simkb kebakaran']})
        });
        data=dataPulau
      }
      else if($('#indeks-satker').val()=='covid 19'){
        groupPulau = [
          11, 12, 13, 14, 15, 16, 17, 18, 19, 21,
          31, 32, 33, 34, 35, 36, 51,
          52, 53,
          61, 62, 63, 64, 65,
          71, 72, 73, 74, 75, 76,
          81, 82,
          91, 94
        ]
        dataPulau = []
        groupPulau.forEach(p => {
          if(p==31){
            filtered = data.filter((d) => d['kodesatker'].substr(0,2)==p || d['kodesatker'] == 1 || d['kodesatker'] == 2 || d['kodesatker'] == 3)
          }else{
            filtered = data.filter((d) => d['kodesatker'].substr(0,2)==p)
          }
          provinsi = data.find((d) => d['kodesatker']==p+'00')
          imkb = []
          filtered.forEach((f) => {
            imkb.push(Number(f['simkb covid 19']))
          })
          
          provinsi['simkb covid 19'] = getAvg(imkb)
          dataPulau.push({'nama satker' : provinsi['nama satker'] , 'simkb covid 19' : provinsi['simkb covid 19']})
        });
        data=dataPulau
      }
      loadTable(data)
    })
  }
  else{
    $.get('Visualisasi/getTable/pegawai/'+$('#indeks-pegawai').val() , (data, status) =>{
      data = JSON.parse(data)
      console.log(data)
      loadTable(data)
    })
  }
  
}

$(document).ready(() => {
  // config data table
  
  changeSubject()
  $('#subjek').change(() => {
    changeSubject()
  })

  $('#indeks-satker').change(() => {
    requestTable('satker')
  })
  
  $('#tahunsatker').change(() => {
    requestTable('satker')
  })
  
  $('#indeks-pegawai').change(() => {
    requestTable('pegawai')
  })
  
})