$(document).ready(function() {
    function progressProvinsi(){
        $.get(
            'persentasePerProvinsi/'+$('#provinsiChoose').val().substring(0, 2),
            function(data){
                $('#persentaseProvinsi').css('stroke-dashoffset','calc(440 - (440 * '+data+')/100)')
                $('#persentaseNumberProvinsi').html(data+'<span>%</span>')
                $('#detailProvinsi').attr('href',"monitoringProvinsi/"+$('#provinsiChoose').val())
            })
    }
    $('#provinsiChoose').change(function(){
        progressProvinsi()
    })
    progressProvinsi()
});