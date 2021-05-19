var monthNames = ["Jan", "Feb", "Mac", "Apr", "Mei", "Jun", "Jul", "Ogos", "Sep", "Okt", "Nov", "Dis"];

var today = new Date();
var d;
var month;
var last6 = [];

for(var i = 6; i > 0; i -= 1) {
  d = new Date(today.getFullYear(), today.getMonth() - i + 1, 1);
  month = monthNames[d.getMonth()];
  year = d.getFullYear();
  year = year.toString().substring(2,4)
  console.log(year)
//   year = year.substring(2,3)
  last6.push(month+" "+year)
}

var chart1 = am4core.create("chart1", am4charts.XYChart);
chart1.paddingRight = 20;

am4core.ready(function() {

    am4core.useTheme(am4themes_animated);

    // FIRST CHART

    chart1.data = [{
        "year": last6[0],
        "value": -0.3
    }, {
        "year": last6[1],
        "value": -0.1
    }, {
        "year": last6[2],
        "value": -0.01
    }, {
        "year": last6[3],
        "value": -0.02
    }, {
        "year": last6[4],
        "value": -0.25
    }, {
        "year": last6[5],
        "value": -0.28
    }];
    
    // Create axes
    var categoryAxis = chart1.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "year";
    categoryAxis.renderer.minGridDistance = 20;
    categoryAxis.renderer.grid.template.location = 0.5;
    categoryAxis.startLocation = 0.5;
    categoryAxis.endLocation = 1;
    
    // Create value axis
    var valueAxis = chart1.yAxes.push(new am4charts.ValueAxis());
    chart1.numberFormatter.numberFormat = "#,###.###";
    valueAxis.baseValue = 0;
    
    // Create series
    var series = chart1.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "value";
    series.dataFields.categoryX = "year";
    series.strokeWidth = 2;
    series.tensionX = 0.77;
    
    // bullet is added because we add tooltip to a bullet for it to change color
    var bullet = series.bullets.push(new am4charts.Bullet());
    bullet.tooltipText = "{valueY}";
    
    bullet.adapter.add("fill", function(fill, target){
        if(target.dataItem.valueY < 0){
            return am4core.color("#FF0000");
        }
        return fill;
    })
    var range = valueAxis.createSeriesRange(series);
    range.value = 0;
    range.endValue = -1000;
    range.contents.stroke = am4core.color("#FF0000");
    range.contents.fill = range.contents.stroke;
    
    chart1.cursor = new am4charts.XYCursor();
    chart1.cursor.lineY.disabled = true;
    valueAxis.cursorTooltipEnabled = false;

    // END FIRST CHART

    // SECOND CHART

    var chart2 = am4core.create("chart2", am4charts.XYChart);

    var data = [];

    for (var i = 0; i < last6.length; i++) {
    data.push({ category: last6[i], value: 1 });
    }

    chart2.data = data;
    var categoryAxis = chart2.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.dataFields.category = "category";
    categoryAxis.renderer.minGridDistance = 15;
    categoryAxis.renderer.grid.template.location = 0.5;
    categoryAxis.renderer.grid.template.strokeDasharray = "1,3";
    categoryAxis.renderer.labels.template.rotation = -90;
    categoryAxis.renderer.labels.template.horizontalCenter = "left";
    categoryAxis.renderer.labels.template.location = 0.5;

    categoryAxis.renderer.labels.template.adapter.add("dx", function(dx, target) {
        return -target.maxRight / 2;
    })

    var valueAxis = chart2.yAxes.push(new am4charts.ValueAxis());
    valueAxis.tooltip.disabled = true;
    valueAxis.renderer.ticks.template.disabled = true;
    valueAxis.renderer.axisFills.template.disabled = true;

    var series = chart2.series.push(new am4charts.ColumnSeries());
    series.dataFields.categoryX = "category";
    series.dataFields.valueY = "value";
    series.tooltipText = "{valueY.value}";
    series.sequencedInterpolation = true;
    series.fillOpacity = 0;
    series.strokeOpacity = 1;
    series.strokeDashArray = "1,3";
    series.columns.template.width = 0.01;
    series.tooltip.pointerOrientation = "horizontal";

    var bullet = series.bullets.create(am4charts.CircleBullet);

    chart2.cursor = new am4charts.XYCursor();
    chart1.cursor.lineY.disabled = true;
    valueAxis.cursorTooltipEnabled = false;

    // END SECOND CHART


    // TODO: FIX Data 

    // THIRD CHART

    var chart3 = am4core.create("chart3", am4charts.XYChart);

    // Enable chart cursor
    chart3.cursor = new am4charts.XYCursor();
    chart3.cursor.lineX.disabled = true;
    chart3.cursor.lineY.disabled = true;

    var data2 = []
    for (var i = 0; i < last6.length; i++) {
        data2.push({ date: last6[i], value: 1 });
    }
    console.log('data2',data2)

    // Add data
    chart3.data = data2

    // Create axes
    var dateAxis = chart3.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0.5;
    // dateAxis.dateFormatter.inputDateFormat = "yyyy-MM-dd";
    dateAxis.renderer.minGridDistance = 40;
    // dateAxis.tooltipDateFormat = "MMM dd, yyyy";
    // dateAxis.dateFormats.setKey("day", "dd");

    var valueAxis = chart3.yAxes.push(new am4charts.ValueAxis());

    // Create series
    var series = chart3.series.push(new am4charts.LineSeries());
    series.tooltipText = "{date}\n[bold font-size: 17px]value: {valueY}[/]";
    series.dataFields.valueY = "value";
    series.dataFields.dateX = "date";
    series.strokeDasharray = 3;
    series.strokeWidth = 2
    series.strokeOpacity = 0.3;
    series.strokeDasharray = "3,3"

    var bullet = series.bullets.push(new am4charts.CircleBullet());
    bullet.strokeWidth = 2;
    bullet.stroke = am4core.color("#fff");
    bullet.setStateOnChildren = true;
    bullet.propertyFields.fillOpacity = "opacity";
    bullet.propertyFields.strokeOpacity = "opacity";

    var hoverState = bullet.states.create("hover");
    hoverState.properties.scale = 1.7;

    // 4th CHART

    var chart4 = am4core.create("chart4", am4charts.XYChart);

    // Enable chart cursor
    chart4.cursor = new am4charts.XYCursor();
    chart4.cursor.lineX.disabled = true;
    chart4.cursor.lineY.disabled = true;

    var data3 = []
    for (var i = 0; i < last6.length; i++) {
        data3.push({ date: last6[i], value: 1 });
    }
    console.log('data3',data3)

    // Add data
    chart4.data = data3

    // Create axes
    var dateAxis = chart4.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0.5;
    // dateAxis.dateFormatter.inputDateFormat = "yyyy-MM-dd";
    dateAxis.renderer.minGridDistance = 40;
    // dateAxis.tooltipDateFormat = "MMM dd, yyyy";
    // dateAxis.dateFormats.setKey("day", "dd");

    var valueAxis = chart4.yAxes.push(new am4charts.ValueAxis());

    // Create series
    var series = chart4.series.push(new am4charts.LineSeries());
    series.tooltipText = "{date}\n[bold font-size: 17px]value: {valueY}[/]";
    series.dataFields.valueY = "value";
    series.dataFields.dateX = "date";
    series.strokeDasharray = 3;
    series.strokeWidth = 2
    series.strokeOpacity = 0.3;
    series.strokeDasharray = "3,3"

    var bullet = series.bullets.push(new am4charts.CircleBullet());
    bullet.strokeWidth = 2;
    bullet.stroke = am4core.color("#fff");
    bullet.setStateOnChildren = true;
    bullet.propertyFields.fillOpacity = "opacity";
    bullet.propertyFields.strokeOpacity = "opacity";

    var hoverState = bullet.states.create("hover");
    hoverState.properties.scale = 1.7;

    });



$(document).ready(function(){



})

function getStatistics(){

    // $.ajax({
    //     type: 'POST',
    //     url: "laporan/statistics",
    //     dataType: 'json',
    //     context: document.body,
    //     global: false,
    //     async: true,
    //     success: function(data) {
    //     var lulus = data.lulus;
    //     var gagal = data.gagal
    //     chart.data = [{
    //         "Bulan": "Jan",
    //         "Lulus": lulus[1],
    //         "Gagal": gagal[1],
    //     },{
    //         "Bulan": "Feb",
    //         "Lulus": lulus[2],
    //         "Gagal": gagal[2],
    //     },{
    //         "Bulan": "Mac",
    //         "Lulus": lulus[3],
    //         "Gagal": gagal[3],
    //     },{
    //         "Bulan": "Apr",
    //         "Lulus": lulus[4],
    //         "Gagal": gagal[4],
    //     },{
    //         "Bulan": "Mei",
    //         "Lulus": lulus[5],
    //         "Gagal": gagal[5],
    //     },{
    //         "Bulan": "Jun",
    //         "Lulus": lulus[6],
    //         "Gagal": gagal[6],
    //     },{
    //         "Bulan": "Jul",
    //         "Lulus": lulus[7],
    //         "Gagal": gagal[7],
    //     },{
    //         "Bulan": "Ogos",
    //         "Lulus": lulus[8],
    //         "Gagal": gagal[8],
    //     },{
    //         "Bulan": "Sep",
    //         "Lulus": lulus[9],
    //         "Gagal": gagal[9],
    //     },{
    //         "Bulan": "Okt",
    //         "Lulus": lulus[10],
    //         "Gagal": gagal[10],
    //     },{
    //         "Bulan": "Nov",
    //         "Lulus": lulus[11],
    //         "Gagal": gagal[11],
    //     },{
    //         "Bulan": "Dis",
    //         "Lulus": lulus[12],
    //         "Gagal": gagal[12],
    //     }]
    // }
    // })
}



// function savePDF() {
  
//     Promise.all([
//       chart.exporting.pdfmake,
//       chart.exporting.getImage("png"),
//     ]).then(function(res) { 
      
//       var pdfMake = res[0];
      
//       // pdfmake is ready
//       // Create document template
//       var doc = {
//         pageSize: "A4",
//         pageOrientation: "portrait",
//         pageMargins: [30, 30, 30, 30],
//         content: []
//       };
      
//       doc.content.push({
//         text: "Jumlah Tuntutan Elaun Lulus/Gagal Tahun Semasa",
//         fontSize: 20,
//         bold: true,
//         margin: [0, 20, 0, 15]
//       });
      
//       doc.content.push({
//         image: res[1],
//         width: 530
//       });
      
      
//       pdfMake.createPdf(doc).download("report.pdf");
      
//     });


// }