$(document).ready(function() {
    $("#unduh-raw-data").click(function(){
        $("#detailMonitoringNasional").table2excel({
            name: "Progress Nasional",
            filename: "Progress Nasional",
            fileext: ".xls",
            preserveColors: true
        });
      });
    $('#statusPengisian').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
    });
})