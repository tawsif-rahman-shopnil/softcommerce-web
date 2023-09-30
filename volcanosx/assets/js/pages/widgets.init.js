"use strict";

// Function to convert hex color to RGB
function hexToRGB(hex, alpha) {
    var r = parseInt(hex.slice(1, 3), 16);
    var g = parseInt(hex.slice(3, 5), 16);
    var b = parseInt(hex.slice(5, 7), 16);

    return alpha ? "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")" : "rgb(" + r + ", " + g + ", " + b + ")";
}

$(document).ready(function () {
    // Define a function for chart initialization
    function initializeCharts() {
        var defaultColors = ["#00acc1", "#f1556c"];
        var lifetimeSalesChart = $("#lifetime-sales");
        var lifetimeSalesColors = lifetimeSalesChart.data("colors");
        var lifetimeSalesData = [0, 23, 43, 35, 44, 45, 56, 37, 40];

        if (lifetimeSalesColors) {
            defaultColors = lifetimeSalesColors.split(",");
        }

        // Initialize Sparkline chart for lifetime sales
        lifetimeSalesChart.sparkline(lifetimeSalesData, {
            type: "line",
            width: "100%",
            height: "220",
            chartRangeMax: 50,
            lineColor: defaultColors[0],
            fillColor: hexToRGB(defaultColors[0], 0.3),
            highlightLineColor: "rgba(0,0,0,.1)",
            highlightSpotColor: "rgba(0,0,0,.2)",
            maxSpotColor: false,
            minSpotColor: false,
            spotColor: false,
            lineWidth: 1
        });

        // Composite Sparkline chart for lifetime sales
        lifetimeSalesChart.sparkline([25, 23, 26, 24, 25, 32, 30, 24, 19], {
            type: "line",
            width: "100%",
            height: "220",
            chartRangeMax: 40,
            lineColor: defaultColors[1],
            fillColor: hexToRGB(defaultColors[1], 0.3),
            composite: true,
            highlightLineColor: "rgba(0,0,0,.1)",
            highlightSpotColor: "rgba(0,0,0,.2)",
            maxSpotColor: false,
            minSpotColor: false,
            spotColor: false,
            lineWidth: 1
        });

        var incomeAmountsChart = $("#income-amounts");
        var incomeAmountsColors = incomeAmountsChart.data("colors");
        var incomeAmountsData = [3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12];

        if (incomeAmountsColors) {
            defaultColors = incomeAmountsColors.split(",");
        }

        // Initialize Sparkline chart for income amounts
        incomeAmountsChart.sparkline(incomeAmountsData, {
            type: "bar",
            height: "220",
            barWidth: "10",
            barSpacing: "3",
            barColor: defaultColors
        });

        var totalUsersChart = $("#total-users");
        var totalUsersColors = totalUsersChart.data("colors");
        var totalUsersData = [20, 40, 30, 10];

        if (totalUsersColors) {
            defaultColors = totalUsersColors.split(",");
        }

        // Initialize Sparkline chart for total users
        totalUsersChart.sparkline(totalUsersData, {
            type: "pie",
            width: "220",
            height: "220",
            sliceColors: defaultColors
        });
    }

    // Call the chart initialization function
    initializeCharts();

    // Update charts on window resize with a delay
    var resizeTimeout;
    $(window).resize(function (e) {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function () {
            initializeCharts();
        }, 300);
    });
});
