<div class="max-w-sm w-full rounded-lg shadow p-4 md:p-6">
    <h5 class="w-full pb-4 text-xl font-bold leading-none textGray border-b-2 border-gray-400 me-1">Category Breakdown</h5>
    <!-- Line Chart -->
    <div class="py-4 -mb-6 flex" id="pie-chart"></div>
</div>

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
                colors: ["#072822"],
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
                    colors: '#D1D5DB',
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

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>