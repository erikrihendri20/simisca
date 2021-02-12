function requestTabelSatker() {
  $.post('/db/Visualisasi/getTabel/satker', {
    kodelevel: $('#wilayahsatker').val(),
    tahun: $('#tahunsatker').val(),
    pilihsemua: $('#pilihsemua:checked').val(),
    keseluruhan: $('#keseluruhan:checked').val(),
    bencanaalam: $('#bencanaalam:checked').val(),
    kebakaran: $('#kebakaran:checked').val(),
    pandemicovid: $('#pandemicovid:checked').val()
  }, function(data, status) {
    $('#tabeldinamis').html(data)
  })
  
}

function requestTabelPegawai() {
  $.post('/db/Visualisasi/getTabel/pegawai', {
    kodelevel: $('#wilayahpegawai').val()
  }, function(data, status) {
    $('#tabeldinamis').html(data)
  })
}


function filtering() {
  if ($('#subjek').val() == 'Satuan Kerja') {
    $('#filter-satker').css('display', 'block')
    requestTabelSatker()
  } else {
    $('#filter-pegawai').css('display', 'flex')
    requestTabelPegawai()
  }
  $('#tombol').css('display', 'none')
  $(document).ready(function() {

    //wilayahsatker
    $("#wilayahsatker").change(function() {
      requestTabelSatker()
    });

    //tahunsatker
    $("#tahunsatker").change(function() {
      requestTabelSatker()
    });

    //indekssatker
    $('#indeksSatker').change(function() {
      if ($('#pilihsemua:checked').val() == 1) {
        $('#keseluruhan').attr('checked', 1);
        $('#bencanaalam').attr('checked', 1);
        $('#kebakaran').attr('checked', 1);
        $('#pandemicovid').attr('checked', 1);
      }
      requestTabelSatker()
    })

    //wilayahpegawai
    $('#wilayahpegawai').change(function() {
      requestTabelPegawai()
    })
  });
}

function ubahFilter() {
  if ($('#subjek').val() == 'Pegawai') {
    $('#filter-satker').css('display', 'none')
    $('#filter-pegawai').css('display', 'flex')
    requestTabelPegawai()
  } else {
    $('#filter-pegawai').css('display', 'none')
    $('#filter-satker').css('display', 'block')
    requestTabelSatker()
  }
}

