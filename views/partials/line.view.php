<div class="flex flex-row justify-between border-b border-gray-300 pb-6 mb-0 md:mb-4">
    <div class="flex justify-start items-center">
        <p class="text-2xl font-semibold leading-none textGray pe-1">Weekly Xpense</p>
    </div>

    <div class="flex justify-end items-center">
        <h5 class="text-2xl font-semibold leading-none textGray pe-1">₱ <?= $weeklyTotal ?></h5>
    </div>
</div>

<!--CHART HERE-->
<div id="labels-chart" class="py-0 md:py-4"></div>

<script>
    const getChartHeight = () => {
        return window.innerWidth <= 768 ? 200 : 360; // 180px on small screens (<=768px), 360px otherwise
    };

    const options = {
        chart: {
            type: "area", // Keep as area to use the gradient fill
            height: getChartHeight(),
            width: "100%",
            fontFamily: "Inter, sans-serif",
            dropShadow: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
            zoom: {
                enabled: false, // Disable zooming
            },
        },

        // X-Axis configuration (with vertical grid lines)
        xaxis: {
            show: true,
            categories: <?= json_encode($days) ?>,
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-300'
                }
            },
            axisBorder: {
                show: true,
                color: '#D1D5DB', // Border color for x-axis
            },
            axisTicks: {
                show: true,
                color: '#D1D5DB', // Tick color
            },
            grid: {
                show: true, // Show vertical grid lines
                borderColor: '#9CA3AF', // Color for the vertical lines
                strokeDashArray: 4, // Optional: make lines dashed
                opacity: 0.5, // Optional: make the lines less opaque
            }
        },

        // Y-Axis configuration (with ticks and border)
        yaxis: {
            show: true,
            min: 0,
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-300'
                },
                formatter: function(value) {
                    return '₱' + value; // Formatter to show currency
                }
            },
            axisBorder: {
                show: true,
                color: '#D1D5DB', // Border color for y-axis
            },
            axisTicks: {
                show: true,
                color: '#D1D5DB', // Tick color
            },
            grid: {
                show: false, // Hide horizontal grid lines
            }
        },

        // Data series
        series: [{
            name: "Total Spent",
            data: <?= json_encode($dailyExpenses) ?>,
            color: "#5eead4",
        }, ],

        tooltip: {
            enabled: true,
            x: {
                show: false,
            },
        },

        // Rigid line (straight line) and stroke configuration
        stroke: {
            width: 6,
            curve: 'straight', // Keep the line straight and rigid
        },

        // Gradient fill configuration for the area below the line
        fill: {
            type: "gradient",
            gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#1C64F2",
                gradientToColors: ["#1C64F2"],
            },
        },

        markers: {
            size: 6, // Set size of the circle
            colors: ['#5eead4'], // Set color for the circles
            strokeColor: '#ffffff', // Stroke color for the circles
            strokeWidth: 2, // Stroke width for the circles
            shape: 'circle', // Shape of the marker (circle)
            hover: {
                size: 8, // Size of the circle on hover
                strokeColor: '#5eead4', // Stroke color on hover
                strokeWidth: 2,
                fillColor: '#ffffff', // Fill color on hover
            }
        },

        dataLabels: {
            enabled: false,
        },

        legend: {
            show: false
        },

        grid: {
            show: true, // Show overall grid
            borderColor: '#9CA3AF', // Color of the grid lines
            strokeDashArray: 8, // Dashed grid lines
            opacity: 0.5, // Optional: make grid lines less opaque
            position: 'back', // Ensure grid lines are behind the chart
        },
    };

    if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("labels-chart"), options);
        chart.render();

        // Re-render chart on window resize to adjust height dynamically
        window.addEventListener('resize', () => {
            chart.updateOptions({
                chart: {
                    height: getChartHeight() // Dynamically update height on window resize
                }
            });
        });
    }
</script>