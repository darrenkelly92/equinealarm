$(function(){
    $.ajax({
        url: 'http://dfequinealarm.com/sweat.php',
        type: 'GET',
        success : function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Sweat",
                "xAxisName": "Date",
                "yAxisName": "Sweat",
                "rotatevalues": "1",
                "theme": "zune"
            };
            apiChart = new FusionCharts({
                type: 'line',
                renderAt: 'sweat_chart-container',
                width: '100%',
                height: '350',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
});

$(function(){
    $.ajax({
        url: 'http://dfequinealarm.com/temperature.php',
        type: 'GET',
        success : function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Temperature",
                "xAxisName": "Date",
                "yAxisName": "Temperature",
                "rotatevalues": "1",
                "theme": "zune"
            };
            apiChart = new FusionCharts({
                type: 'line',
                renderAt: 'temperature_chart-container',
                width: '100%',
                height: '350',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
});

$(function(){
    $.ajax({
        url: 'http://dfequinealarm.com/movement.php',
        type: 'GET',
        success : function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Movement",
                "captionFontSize": "14",
                "subcaptionFontSize": "14",
                "subcaptionFontBold": "0",
                "paletteColors": "#0075c2,#1aaf5d",
                "bgcolor": "#ffffff",
                "showBorder": "0",
                "showShadow": "0",
                "showCanvasBorder": "0",
                "usePlotGradientColor": "0",
                "legendBorderAlpha": "0",
                "legendShadow": "0",
                "showAxisLines": "0",
                "showAlternateHGridColor": "0",
                "divlineThickness": "1",
                "divLineIsDashed": "1",
                "divLineDashLen": "1",
                "divLineGapLen": "1",
                "xAxisName": "Date/Time",
                "showValues": "0"
            };
            console.log(data);
            apiChart = new FusionCharts({
                type: 'msline',
                renderAt: 'movement_chart-container',
                width: '100%',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "categories": [
                        {
                            "category": data[2]
                        }
                    ],
                    "dataset": [
                        {
                            "seriesname": "X Axis",
                            "data": data[1]
                        },
                        {
                            "seriesname": "Y Axis",
                            "data": data[0]
                        }
                    ]
                }
            });
            apiChart.render();
        }
    });
});