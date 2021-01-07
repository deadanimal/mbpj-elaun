
am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end
    
    // Create chart instance
    var chart = am4core.create("3d-chart", am4charts.XYChart3D);
    
    chart.legend = new am4charts.Legend();
    
    // Add data
    chart.data = [{
        "Bulan": "Januari",
        "Lulus": 3.5,
        "Gagal": 4.2
    }, {
        "Bulan": "Februari",
        "Lulus": 1.7,
        "Gagal": 3.1
    }, {
        "Bulan": "Mac",
        "Lulus": 2.8,
        "Gagal": 2.9
    }, {
        "Bulan": "April",
        "Lulus": 2.6,
        "Gagal": 2.3
    }, {
        "Bulan": "Mei",
        "Lulus": 1.4,
        "Gagal": 2.1
    }, {
        "Bulan": "Jun",
        "Lulus": 2.6,
        "Gagal": 4.9
    }, {
        "Bulan": "Julai",
        "Lulus": 6.4,
        "Gagal": 7.2
    }, {
        "Bulan": "Ogos",
        "Lulus": 8,
        "Gagal": 7.1
    }, {
        "Bulan": "September",
        "Lulus": 9.9,
        "Gagal": 10.1
    }, {
        "Bulan": "Oktober",
        "Lulus": 9.9,
        "Gagal": 10.1
    }, {
        "Bulan": "November",
        "Lulus": 9.9,
        "Gagal": 10.1
    }, {
        "Bulan": "Disember",
        "Lulus": 9.9,
        "Gagal": 10.1
    }];
    
    // Create axes
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "Bulan";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 30;
    
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.title.text = "Tuntutan Elaun";
    valueAxis.renderer.labels.template.adapter.add("text", function(text) {
      return text + "%";
    });
    
    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries3D());
    series.dataFields.valueY = "Lulus";
    series.dataFields.categoryX = "Bulan";
    series.name = "Lulus";
    series.clustered = false;
    series.columns.template.tooltipText = "Peratusan Elaun Lulus {category}: [bold]{valueY}[/]";
    series.columns.template.fillOpacity = 0.9;
    
    var series2 = chart.series.push(new am4charts.ColumnSeries3D());
    series2.dataFields.valueY = "Gagal";
    series2.dataFields.categoryX = "Bulan";
    series2.name = "Gagal";
    series2.clustered = false;
    series2.columns.template.tooltipText = "Peratusan Elaun Gagal {category} : [bold]{valueY}[/]";
    
    }); // end am4core.ready()
    