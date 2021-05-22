

$(document).ready(function() {
    
    $("#unduh-raw-data").click(function(){
        const defaultFileName = 'satker-raw';
        table2excel = new Table2Excel({defaultFileName})
        table2excel.export($("#raw-data"))
      });
      
})