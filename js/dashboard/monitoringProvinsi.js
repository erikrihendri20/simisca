$(document).ready(function() {
    $("#tombolExportProvinsi").click(function(){
        $("#detailMonitoringProvinsi").table2excel({
            name: "Progress Provinsi",
            filename: "Progress Provinsi",
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