<div class="panel panel-info panel-hovered mb20 activities">
    <div class="panel-body">
        <!-- Donut Charts -->
        <div class="row mt-6">
            <div class="col-md-6 mb-4 text-center">
                <canvas id="dayChart" width="100" height="100"></canvas>
            </div>
            <div class="col-md-6 mb-4 text-center">
                <canvas id="weekChart" width="100" height="100"></canvas>
            </div>
            <div class="col-md-6 mb-4 text-center">
                <canvas id="monthChart" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const currency = "{$_c['currency_code']}";

    // Donut for Day (Today vs Yesterday)
    new Chart(document.getElementById("dayChart"), {
        type: 'doughnut',
        data: {
            labels: ['Today', 'Yesterday'],
            datasets: [{
                data: [{$iday}, {$lday}],
                backgroundColor: ['#9C27B0', '#E1BEE7']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // Donut for Week (This Week vs Last Week)
    new Chart(document.getElementById("weekChart"), {
        type: 'doughnut',
        data: {
            labels: ['This Week', 'Last Week'],
            datasets: [{
                data: [{$iweek}, {$lweekly}],
                backgroundColor: ['#2196F3', '#BBDEFB']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // Donut for Month (This Month vs Last Month)
    new Chart(document.getElementById("monthChart"), {
        type: 'doughnut',
        data: {
            labels: ['This Month', 'Last Month'],
            datasets: [{
                data: [{$imonth}, {$lmonth}],
                backgroundColor: ['#4CAF50', '#C8E6C9']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
