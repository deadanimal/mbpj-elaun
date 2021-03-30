var chart = am4core.create("3d-chart", am4charts.XYChart3D);
am4core.useTheme(am4themes_animated);
var monthNames = ["Jan", "Feb", "Mac", "Apr", "Mei", "Jun", "Jul", "Ogos", "Sep", "Okt", "Nov", "Dis"];

$(document).ready(function(){

    getStatistics()

})

function getStatistics(){
    $.ajax({
        type: 'POST',
        url: "tuntutan/statistics",
        dataType: 'json',
        context: document.body,
        global: false,
        async: true,
        success: function(data) {
        var lulus = data.lulus;
        var gagal = data.gagal
        var data = []
        for(var i = 0; i < monthNames.length; i++){
            data.push({Bulan: monthNames[i], Lulus: lulus[i+1], Gagal: gagal[i+1]});
        }
        chart.data = data
        
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.maxTooltipDistance = 20;

        chart.legend = new am4charts.Legend();
        chart.legend.useDefaultMarker = true;
        var marker = chart.legend.markers.template.children.getIndex(0);
        marker.cornerRadius(12, 12, 12, 12);
        marker.strokeWidth = 2;
        marker.strokeOpacity = 1;
        marker.stroke = am4core.color("#ccc");


        chart.colors.step = 2;

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "Bulan";
        categoryAxis.cursorTooltipEnabled = false;
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.cursorTooltipEnabled = false;
        valueAxis.title.text = "Tuntutan Elaun";
        valueAxis.renderer.labels.template.adapter.add("text", function(text) {
          return text ;
        });
        
        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries3D());
        series.dataFields.valueY = "Lulus";
        series.dataFields.categoryX = "Bulan";
        series.name = "Lulus";
        series.clustered = false;
        series.columns.template.tooltipText = "Jumlah Elaun Lulus {category}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = 0.9;
        
        var series2 = chart.series.push(new am4charts.ColumnSeries3D());
        series2.dataFields.valueY = "Gagal";
        series2.dataFields.categoryX = "Bulan";
        series2.name = "Gagal";
        series2.clustered = false;
        series2.columns.template.tooltipText = "Jumlah Elaun Gagal {category} : [bold]{valueY}[/]";
        // chart.validateNow();
    }
    })
}



function savePDF() {
  
    Promise.all([
      chart.exporting.pdfmake,
      chart.exporting.getImage("png"),
    ]).then(function(res) { 
      
      var pdfMake = res[0];
      
      // pdfmake is ready
      // Create document template
      var doc = {
        pageSize: "A4",
        pageOrientation: "portrait",
        pageMargins: [30, 30, 30, 30],
        content: []
      };
      
      doc.content.push({
        text: "Jumlah Tuntutan Elaun Lulus/Gagal Tahun Semasa",
        fontSize: 20,
        bold: true,
        margin: [0, 20, 0, 15]
      });
      
      doc.content.push({
        image: res[1],
        width: 530
      });
      
      
      pdfMake.createPdf(doc).download("report.pdf");
      
    });
  }