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
  })
}


downloadRScript = () => {
  window.open("downloadRScript")
}

downloadDaftarSatker = () => {
  window.open("downloadDaftarSatker")
}

$(document).ready(() => {
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
    deleteSurvey()
  })
})