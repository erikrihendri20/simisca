

$(document).ready(function() {
    
    $("#unduh-raw-data").click(function(){
        // $("#raw-data").table2excel({
        //     filename: "Raw Data",
        //     preserveColors: true
        // }); 
        // console.log('sadsad')
        const defaultFileName = 'satker-raw';
        table2excel = new Table2Excel({defaultFileName})
        table2excel.export($("#raw-data"))
      });
})