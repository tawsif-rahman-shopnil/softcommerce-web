"use strict";

function MorrisCharts() {}

MorrisCharts.prototype.createLineChart = function (elementId, data, xkey, ykeys, labels, fillOpacity, pointFillColors, pointStrokeColors, behaveLikeLine, gridLineColor, hideHover, lineWidth, pointSize, preUnits, dataLabels, resize, lineColors) {
    Morris.Line({
        element: elementId,
        data: data,
        xkey: xkey,
        ykeys: ykeys,
        labels: labels,
        fillOpacity: fillOpacity,
        pointFillColors: pointFillColors,
        pointStrokeColors: pointStrokeColors,
        behaveLikeLine: behaveLikeLine,
        gridLineColor: gridLineColor,
        hideHover: hideHover,
        lineWidth: lineWidth,
        pointSize: pointSize,
        preUnits: preUnits,
        dataLabels: dataLabels,
        resize: resize,
        lineColors: lineColors
    });
};

MorrisCharts.prototype.createAreaChart = function (elementId, data, pointSize, lineWidth, areaData, xkey, ykeys, labels, hideHover, resize, dataLabels, gridLineColor, lineColors) {
    Morris.Area({
        element: elementId,
        pointSize: pointSize,
        lineWidth: lineWidth,
        data: areaData,
        xkey: xkey,
        ykeys: ykeys,
        labels: labels,
        hideHover: hideHover,
        resize: resize,
        dataLabels: dataLabels,
        gridLineColor: gridLineColor,
        lineColors: lineColors
    });
};

MorrisCharts.prototype.createAreaChartDotted = function (elementId, pointSize, lineWidth, data, xkey, ykeys, labels, hideHover, pointFillColors, pointStrokeColors, resize, dataLabels, gridLineColor, lineColors) {
    Morris.Area({
        element: elementId,
        pointSize: pointSize,
        lineWidth: lineWidth,
        data: data,
        xkey: xkey,
        ykeys: ykeys,
        labels: labels,
        hideHover: hideHover,
        pointFillColors: pointFillColors,
        pointStrokeColors: pointStrokeColors,
        resize: resize,
        dataLabels: dataLabels,
        gridLineColor: gridLineColor,
        lineColors: lineColors
    });
};

MorrisCharts.prototype.createBarChart = function (elementId, data, xkey, ykeys, labels, hideHover, resize, gridLineColor, barSizeRatio, dataLabels, barColors) {
    Morris.Bar({
        element: elementId,
        data: data,
        xkey: xkey,
        ykeys: ykeys,
        labels: labels,
        hideHover: hideHover,
        resize: resize,
        gridLineColor: gridLineColor,
        barSizeRatio: barSizeRatio,
        dataLabels: dataLabels,
        barColors: barColors
    });
};

MorrisCharts.prototype.createStackedChart = function (elementId, data, xkey, ykeys, labels, stacked, hideHover, resize, dataLabels, gridLineColor, barColors) {
    Morris.Bar({
        element: elementId,
        data: data,
        xkey: xkey,
        ykeys: ykeys,
        stacked: stacked,
        labels: labels,
        hideHover: hideHover,
        resize: resize,
        dataLabels: dataLabels,
        gridLineColor: gridLineColor,
        barColors: barColors
    });
};

MorrisCharts.prototype.createDonutChart = function (elementId, data, colors, backgroundColor) {
    Morris.Donut({
        element: elementId,
        data: data,
        resize: true,
        colors: colors,
        backgroundColor: backgroundColor
    });
};

MorrisCharts.prototype.init = function () {
    var $ = window.jQuery;

    $("#morris-line-example").empty();
    $("#morris-area-example").empty();
    $("#morris-area-with-dotted").empty();
    $("#morris-bar-example").empty();
    $("#morris-bar-stacked").empty();
    $("#morris-donut-example").empty();

    this.createLineChart("morris-line-example", [
        { y: "2008", a: 50, b: 0 },
        { y: "2009", a: 75, b: 50 },
        { y: "2010", a: 30, b: 80 },
        { y: "2011", a: 50, b: 50 },
        { y: "2012", a: 75, b: 10 },
        { y: "2013", a: 50, b: 40 },
        { y: "2014", a: 75, b: 50 },
        { y: "2015", a: 100, b: 70 }
    ], "y", ["a", "b"], ["Series A", "Series B"], "0.1", ["#ffffff"], ["#999999"], ["#ff8acc", "#5b69bc"]);

    this.createAreaChart("morris-area-example", 0, 0, [
        { y: "2009", a: 10, b: 20 },
        { y: "2010", a: 75, b: 65 },
        { y: "2011", a: 50, b: 40 },
        { y: "2012", a: 75, b: 65 },
        { y: "2013", a: 50, b: 40 },
        { y: "2014", a: 75, b: 65 },
        { y: "2015", a: 90, b: 60 }
    ], "y", ["a", "b"], ["Series A", "Series B"], ["#5b69bc", "#35b8e0"]);

    this.createAreaChartDotted("morris-area-with-dotted", 0, 0, [
        { y: "2009", a: 10, b: 20 },
        { y: "2010", a: 75, b: 65 },
        { y: "2011", a: 50, b: 40 },
        { y: "2012", a: 75, b: 65 },
        { y: "2013", a: 50, b: 40 },
        { y: "2014", a: 75, b: 65 },
        { y: "2015", a: 90, b: 60 }
    ], "y", ["a", "b"], ["Series A", "Series B"], ["#ffffff"], ["#999999"], ["#5b69bc", "#35b8e0"]);

    this.createBarChart("morris-bar-example", [
        { y: "2009", a: 100, b: 90, c: 40 },
        { y: "2010", a: 75, b: 65, c: 20 },
        { y: "2011", a: 50, b: 40, c: 50 },
        { y: "2012", a: 75, b: 65, c: 95 },
        { y: "2013", a: 50, b: 40, c: 22 },
        { y: "2014", a: 75, b: 65, c: 56 },
        { y: "2015", a: 100, b: 90, c: 60 }
    ], "y", ["a", "b", "c"], ["Series A", "Series B", "Series C"], "auto", true, "rgba(173, 181, 189, 0.1)", 0.4, false, ["#ff8acc", "#5b69bc", "#35b8e0"]);

    this.createStackedChart("morris-bar-stacked", [
        { y: "2005", a: 45, b: 180 },
        { y: "2006", a: 75, b: 65 },
        { y: "2007", a: 100, b: 90 },
        { y: "2008", a: 75, b: 65 },
        { y: "2009", a: 100, b: 90 },
        { y: "2010", a: 75, b: 65 },
        { y: "2011", a: 50, b: 40 },
        { y: "2012", a: 75, b: 65 },
        { y: "2013", a: 50, b: 40 },
        { y: "2014", a: 75, b: 65 },
        { y: "2015", a: 100, b: 90 }
    ], "y", ["a", "b"], ["Series A", "Series B"], true, "auto", false, false, "rgba(173, 181, 189, 0.1)", ["#71b6f9", "#ebeff2"]);

    this.createDonutChart("morris-donut-example", [
        { label: "Softwares", value: 12 },
        { label: "Games", value: 30 } 
    ], ["#ff8acc", "#5b69bc"], "transparent");
};

(function ($) {
    var morrisCharts = new MorrisCharts();
    morrisCharts.init();

    window.addEventListener("adminto.setBoxed", function (e) {
        morrisCharts.init();
    });

    window.addEventListener("adminto.setFluid", function (e) {
        morrisCharts.init();
    });
})(window.jQuery);
