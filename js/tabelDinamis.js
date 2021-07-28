function requestTabelSatker() {
  
  $.post('Visualisasi/getTabel/satker', {
    kodelevel: $('#wilayahsatker').val(),
    tahun: $('#tahunsatker').val(),
    pilihsemua: $('#pilihsemua:checked').val(),
    kodeprovinsi: ($('#provinsi-satker').css('display')=='none') ? 0 : $('#provinsi-satker').val(),
    keseluruhan: $('#keseluruhan:checked').val(),
    bencanaalam: $('#bencanaalam:checked').val(),
    kebakaran: $('#kebakaran:checked').val(),
    covid: $('#covid:checked').val()
  }, function(data, status) {
    $('#tabeldinamis').html(data)
  })
  
}

function requestTabelPegawai() {
  $.post('Visualisasi/getTabel/pegawai', {
    kodelevel: $('#wilayahpegawai').val()
  }, function(data, status) {
    $('#tabeldinamis').html(data)
  })
}


function changeSubject(){
  if($('#subjek').val() == 1){
    $('#filter-satker').css('display', 'flex')
    $('#filter-pegawai').css('display', 'none')
    requestTabelSatker()
  }else{
    $('#filter-satker').css('display', 'none')
    $('#filter-pegawai').css('display', 'flex')
    requestTabelPegawai()
  }

}

function checkOpsi(){
  if($('#pilihsemua').is(':checked')){
    $("#keseluruhan").prop('checked', true)
    $("#bencanaalam").prop('checked', true)
    $("#kebakaran").prop('checked', true)
    $("#covid").prop('checked', true)
  }
}

$(document).ready(() => {
  changeSubject()
  checkOpsi()
  

  $('#pilihsemua').change(() => {
    checkOpsi()
    requestTabelSatker()
  })

  $('#keseluruhan').change(() => {
    if($('#keseluruhan').is(':checked')){
      $("#bencanaalam").prop('checked', true)
      $("#kebakaran").prop('checked', true)
      $("#covid").prop('checked', true)
    }else{
      $("#pilihsemua").prop('checked', false)
      $("#bencanaalam").prop('checked', false)
      $("#kebakaran").prop('checked', false)
      $("#covid").prop('checked', false)
    }
    requestTabelSatker()
  })

  $('#bencanaalam').change(() => {
    if(!$(this).is(':checked')){
      $("#pilihsemua").prop('checked', false)
      $("#keseluruhan").prop('checked', false)
    }
    if($('#bencanaalam').is(':checked')&&$('#kebakaran').is(':checked')&&$('#covid').is(':checked')){
      $("#keseluruhan").prop('checked', true)
    }
    requestTabelSatker()
  })
  
  $('#kebakaran').change(() => {
    if(!$(this).is(':checked')){
      $("#pilihsemua").prop('checked', false)
      $("#keseluruhan").prop('checked', false)
    }
    if($('#bencanaalam').is(':checked')&&$('#kebakaran').is(':checked')&&$('#covid').is(':checked')){
      $("#keseluruhan").prop('checked', true)
    }
    requestTabelSatker()
  })
  
  $('#covid').change(() => {
    if(!$(this).is(':checked')){
      $("#pilihsemua").prop('checked', false)
      $("#keseluruhan").prop('checked', false)
    }
    if($('#bencanaalam').is(':checked')&&$('#kebakaran').is(':checked')&&$('#covid').is(':checked')){
      $("#keseluruhan").prop('checked', true)
    }
    requestTabelSatker()
  })

  $('#subjek').change(() => {
    changeSubject()
  })

  $('#wilayahsatker').change(() => {
    if($('#wilayahsatker').val()==3){
      $('#form-provinsi-satker').css('display','block')
      $('#provinsi-satker').css('display','block')
    }else{
      $('#form-provinsi-satker').css('display','none')
      $('#provinsi-satker').css('display','none')

    }
    requestTabelSatker()
  })

  $('#wilayahpegawai').change(() => {
    console.log('asdsad')
    if($('#wilayahpegawai').val()==3){
      console.log('asdsad')
      $('#form-provinsi-pegawai').css('display','block')
      $('#provinsi-pegawai').css('display','block')
    }else{
      $('#form-provinsi-pegawai').css('display','none')
      $('#provinsi-pegawai').css('display','none')

    }
    requestTabelSatker()
  })

  $('#provinsi-satker').change(() => {
    requestTabelSatker()
  }) 

  $('#provinsi-pegawai').change(() => {
    requestTabelPegawai()
  })


})