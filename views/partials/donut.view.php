<?php

//DEFAULT VALUES (ITO MGA LILITAW KAPAG WALANG ININPUT NA VALUES $values) [FOR TESTING]
if (!isset($values)) {
    $values = [28, 49, 20, 3];
    $labels = ['Food', 'Entertainment', 'Transportation', 'Others'];
    $colors = ['#1C64F2', '#16BDCA', '#FDBA8C', '#E74694'];
}

?>

<style>
    #donut-chart .apexcharts-legend-text {
        color: #d1d5db !important;
    }

    #donut-chart .apexcharts-datalabel-value,
    #donut-chart .apexcharts-datalabel-label {
        fill: #d1d5db !important;
    }
</style>

<!-- TITLE  -->
<div class="flex justify-start border-b border-gray-300 pb-6 mb-4">
    <div class="flex justify-center items-center">
        <h5 class="text-2xl font-semibold leading-none textGray pe-1">Category Breakdown</h5>
    </div>
</div>

<!-- Donut Chart Is Here -->
<div class="py-4" id="donut-chart"></div>

<script>
    const getChartOptions = () => {
        return {
            series: <?= json_encode($values) ?>,
            colors: <?= json_encode($colors) ?>,
            labels: <?= json_encode($labels) ?>,
            chart: {
                height: 360,
                width: "100%",
                type: "donut",
            },
            stroke: {
                colors: ["transparent"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontFamily: "Inter, sans-serif",
                                offsetY: 20,
                            },
                            total: {
                                showAlways: true,
                                show: true,
                                label: "Total",
                                fontFamily: "Inter, sans-serif",
                                color: "#d1d5db", // Ensure this is applied correctly
                                formatter: function(w) {
                                    const sum = w.globals.seriesTotals.reduce((a, b) => {
                                        return a + b
                                    }, 0)
                                    return "<?= $_SESSION['currency'] ?> " + sum; // ganito value neto before: '=' + sum + '%' ambobo
                                },
                            },
                            value: {
                                show: true,
                                fontFamily: "Inter, sans-serif",
                                offsetY: -20,
                                color: "#d1d5db", // Same color for value labels inside donut slices
                                formatter: function(value) {
                                    return "<?= $_SESSION['currency'] ?> " + value;
                                },
                            },
                        },
                        size: "80%",
                    },
                },
            },
            grid: {
                padding: {
                    top: -2,
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
                labels: {
                    colors: '#d1d5db',
                },
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return "<?= $_SESSION['currency'] ?> " + value;
                    },
                },
            },
            xaxis: {
                labels: {
                    formatter: function(value) {
                        return "<?= $_SESSION['currency'] ?> " + value;
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
        }
    }

    if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
        chart.render();
    }
</script>