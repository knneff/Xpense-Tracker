<?php
//DEFAULT VALUES (ITO MGA LILITAW KAPAG WALANG ININPUT NA VALUES $values) [FOR TESTING]
if (!isset($values)) {
    $values = [52.8, 26.8, 20.4];
    $labels = ["Direct", "Organic search", "Referrals"];
    $colors = ["#1C64F2", "#16BDCA", "#9061F9"];
}
?>


<div class="max-w-sm w-full rounded-lg shadow p-4 md:p-6">
    <h5 class="w-full pb-2 text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Category Breakdown</h5>
    <hr>
    <!-- Line Chart -->
    <div class="py-4 -mb-6" id="pie-chart"></div>
</div>


<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

<script>
    const getChartOptions = () => {
        return {
            series: <?= json_encode($values) ?>,
            labels: <?= json_encode($labels) ?>,
            colors: <?= json_encode($colors) ?>,
            chart: {
                height: 420,
                width: "100%",
                type: "pie",
            },
            stroke: {
                colors: ["white"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    labels: {
                        show: true,
                    },
                    size: "100%",
                    dataLabels: {
                        offset: -25
                    }
                },
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    // colors: ['#FFFFFF'],
                },
            },
            legend: {
                // show: false,
                labels: {
                    colors: '#FFFFFF',
                    useSeriesColors: false,
                },
                // colors: '#FFFFFF',
                position: "bottom",
                fontFamily: "Inter, sans-serif",
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

    if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
        chart.render();
    }
</script>