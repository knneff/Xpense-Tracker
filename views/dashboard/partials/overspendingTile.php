<!-- OVERSPENDING ALARM -->
<div class='shadow-lg tlGreen rounded-3xl w-full sm:w-56 px-4 h-48 mx-2 my-2 textGray'>
    <div class="text-xl font-semibold py-1">
        Today's Expense
    </div>
    <hr class='border border-1 border-gray-400'>
    <div class="font-semibold">
        <?= $_SESSION["currency"] . " " . $expenseToday . " / " . $_SESSION["currency"] . " " . $expenseLimit ?>
    </div>
    <div>
        <div id="donut-chart2" class="relative">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 font-bold text-2xl">
                <?= $expensePercent ?>%
            </div>
        </div>
    </div>
</div>
<script>
    const expensePercent = <?php echo json_encode($expensePercent); ?>;
    const alarmThreshold = <?php echo json_encode($alarmThreshold); ?>;
    let barColor;

    if (expensePercent >= 100) {
        barColor = "#ef4444";
    } else if (expensePercent >= alarmThreshold) {
        barColor = "#fb923c";
    } else {
        barColor = "#15956B";
    }

    const getChartOptions2 = () => {
        return {
            series: [expensePercent, 100 - expensePercent],
            colors: [barColor, "#034B38"],
            chart: {
                height: 120,
                width: "100%",
                type: "donut",
            },
            labels: ["Slice 1", "Slice 2"],
            legend: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                colors: ["transparent"],
                lineCap: "",
            },
            tooltip: {
                enabled: false,
            },
            states: {
                hover: {
                    filter: {
                        type: "none",
                    },
                },
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "75%",
                    },
                },
            },

        };
    };

    // Render the chart using your preferred charting library, e.g., ApexCharts
    const chart = new ApexCharts(document.querySelector("#donut-chart2"), getChartOptions2());
    chart.render();
</script>