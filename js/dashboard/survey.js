importSurvey = () => {
  button = $('#import-survey').html()
  $('#import-survey').html('Memproses import ke limesurvey...')
  $.get('importSurvey' , (data) => {
    console.log(data)
  })
  .fail(() => {
    $('#import-survey').html(button)
  })
  .done(() => {
    $('#import-survey').html(button)
    cekStatus()
  })
}

importPartisipan = () => {
  button = $('#import-partisipan').html()
  $('#import-partisipan').html('Memproses import partisipan...')
  $.get('importPartisipan' , (data) => {
    console.log(data)
  })
  .fail(() => {
    $('#import-partisipan').html(button)
  })
  .done(() => {
    $('#import-partisipan').html(button)
    cekStatus()
  })
}

exportResponse = () => {
  window.open('exportResponse')
}

deleteSurvey = () => {
  button = $('#delete-survey').html()
  $('#delete-survey').html('Memproses hapus survey...')
  $.get('deleteSurvey' , (data) => {
    console.log(data)
  })
  .fail(() => {
    $('#delete-survey').html(button)
  })
  .done(() => {
    $('#delete-survey').html(button)
    cekStatus()
  })
}


downloadRScript = () => {
  window.open("downloadRScript")
}

downloadDaftarSatker = () => {
  window.open("downloadDaftarSatker")
}

cekStatus = () => {
  $.get('statusImportSurvey' , (data) => {
    data = JSON.parse(data)
    if(data['status'] == "aktif"){
      $('#status-ok-import').css('display' , 'inline')
      $('#status-ban-import').css('display' , 'none')
      
      $('#keterangan-ok-import').css('display' , 'block')
      $('#keterangan-ban-import').css('display' , 'none')

      $('#import-survey').css('display' , 'none')
      $('#delete-survey').css('display' , 'inline')
    }else{
      $('#status-ok-import').css('display' , 'none')
      $('#status-ban-import').css('display' , 'inline')
      
      $('#keterangan-ok-import').css('display' , 'none')
      $('#keterangan-ban-import').css('display' , 'block')

      $('#import-survey').css('display' , 'inline')
      $('#delete-survey').css('display' , 'none')
    }
  })
  $.get('jumlahPartisipan' , (data) => {
    data = JSON.parse(data)
    $('#jumlah-partisipan').html(data['jumlah'])
  })
}

$(document).ready(() => {
  cekStatus()
  $('#import-survey').click(() => {
    importSurvey()
  })
  $('#import-partisipan').click(() => {
    importPartisipan()
  })
  $('#export-response').click(() => {
    exportResponse()
  })
  $('#download-rscript').click(() => {
    downloadRScript()
  })
  $('#download-daftar-satker').click(() => {
    downloadDaftarSatker()
  })
  $('#delete-survey').click(() => {
    konfirmasi = confirm('anda yakin ingin menghentikan survey ini?')
    if(konfirmasi){
      deleteSurvey()
    }
  })
})