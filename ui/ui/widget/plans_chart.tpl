<div class="row">
    <!-- Hotspot Plans Chart -->
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Hotspot Plans</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <canvas id="hotspotChart" style="height: 150px;"></canvas>
            </div>
            <div class="box-footer text-muted">
                Period: {$plans_chart.start} to {$plans_chart.end}
            </div>
        </div>
    </div>

    <!-- PPPoE Plans Chart -->
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">PPPoE Plans</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <canvas id="pppoeChart" style="height: 150px;"></canvas>
            </div>
            <div class="box-footer text-muted">
                Period: {$plans_chart.start} to {$plans_chart.end}
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
(function() {
    // Hotspot data
    var hotspotLabels = {json_encode(array_column($plans_chart.hotspot, 'label'))};
    var hotspotValues = {json_encode(array_column($plans_chart.hotspot, 'value'))};

    // PPPoE data
    var pppoeLabels = {json_encode(array_column($plans_chart.pppoe, 'label'))};
    var pppoeValues = {json_encode(array_column($plans_chart.pppoe, 'value'))};

    var colors = [
        '#4285F4', // Google Blue
        '#34A853', // Google Green
        '#FBBC04', // Google Yellow
        '#EA4335', // Google Red
        '#FFFFFF', // White
        '#FF9900', // Google Orange
        '#137333'  // Google Dark Green
    ];

    new Chart(document.getElementById('hotspotChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: hotspotLabels,
            datasets: [{
                data: hotspotValues,
                backgroundColor: colors,
                borderColor: '#FFFFFF',
                borderWidth: 2
            }]
        },
        options: { 
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: '#000000' 
                    }
                }
            }
        }
    });

    new Chart(document.getElementById('pppoeChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: pppoeLabels,
            datasets: [{
                data: pppoeValues,
                backgroundColor: colors,
                borderColor: '#FFFFFF',
                borderWidth: 2
            }]
        },
        options: { 
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: '#000000' 
                    }
                }
            }
        }
    });
})();
</script>