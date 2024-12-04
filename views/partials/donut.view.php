<?php

//DEFAULT VALUES (ITO MGA LILITAW KAPAG WALANG ININPUT NA VALUES $values) [FOR TESTING]
if (!isset($values)) {
    $values = [28, 49, 20, 3];
    $labels = ['Food', 'Entertainment', 'Transportation', 'Others'];
    $colors = ['#1C64F2', '#16BDCA', '#FDBA8C', '#E74694'];
}

?>

<!-- TITLE  -->
<div class="flex justify-start border-b border-gray-300 pb-6 mb-4">
    <div class="flex justify-center items-center">
        <h5 class="text-2xl font-semibold leading-none textGray pe-1">Category Breakdown</h5>
    </div>
</div>

<div class="flex justify-between items-center pb-6">
    <!-- Button -->
    <button
        id="dropdownDefaultButton"
        data-dropdown-toggle="lastDaysdropdown"
        data-dropdown-placement="bottom"
        class="text-sm font-medium textGray text-center inline-flex items-center"
        type="button">
        Last 7 days
        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
        </svg>
    </button>
    <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
            </li>
        </ul>
    </div>
</div>

<!-- Donut Chart Is Here -->
<div class="pb-4" id="donut-chart"></div>

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
                                formatter: function(w) {
                                    const sum = w.globals.seriesTotals.reduce((a, b) => {
                                        return a + b
                                    }, 0)
                                    return '100%' // ganito value neto before: '=' + sum + '%' ambobo
                                },
                                color: '#d1d5db',
                            },
                            value: {
                                show: true,
                                fontFamily: "Inter, sans-serif",
                                offsetY: -20,
                                color: '#d1d5db',
                                formatter: function(value) {
                                    return value + "%"
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
                        return value + "%"
                    },
                },
            },
            xaxis: {
                labels: {
                    formatter: function(value) {
                        return value + "%"
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