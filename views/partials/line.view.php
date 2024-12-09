<div class="flex flex-col justify-start border-b border-gray-300 pb-6 mb-4">
    <div class="flex justify-start items-center">
        <h5 class="text-2xl font-semibold leading-none textGray pe-1">$12,423</h5>
    </div>

    <div class="flex justify-start items-center">
        <p class="text-base font-normal textGray">Xpended this week</p>
    </div>
</div>

<!--CHART HERE-->
<div id="labels-chart" class="py-4"></div>
  
<div class="border-gray-300 border-t mt-6 pb-4">
</div>

<script>
    const options = {
        // set the labels option to true to show the labels on the X and Y axis
        xaxis: {
        show: true,
        categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        labels: {
            show: true,
            style: {
            fontFamily: "Inter, sans-serif",
            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
            }
        },
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
        },
        yaxis: {
        show: true,
        labels: {
            show: true,
            style: {
            fontFamily: "Inter, sans-serif",
            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
            },
            formatter: function (value) {
            return '$' + value;
            }
        }
        },
        
        // <--DATA HERE-->
        series: [
        {
            name: "Developer Edition",
            data: [150, 141, 145, 152, 135, 125],
            color: "#5eead4",
        },
        ],

        chart: {
        sparkline: {
            enabled: false
        },
        height: "100%",
        width: "100%",
        type: "area",
        fontFamily: "Inter, sans-serif",
        dropShadow: {
            enabled: false,
        },
        toolbar: {
            show: false,
        },
        },
        tooltip: {
        enabled: true,
        x: {
            show: false,
        },
        },
        fill: {
        type: "gradient",
        gradient: {
            opacityFrom: 0.55,
            opacityTo: 0,
            shade: "#1C64F2",
            gradientToColors: ["#1C64F2"],
        },
        },
        dataLabels: {
        enabled: false,
        },
        stroke: {
        width: 6,
        },
        legend: {
        show: false
        },
        grid: {
        show: false,
        },
        }

    if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("labels-chart"), options);
    chart.render();
    }

</script>