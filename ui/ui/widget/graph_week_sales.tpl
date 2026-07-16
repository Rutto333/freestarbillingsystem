<div class="box box-solid">
    <div class="box-header">
        <i class="fa fa-calendar"></i>

        <h3 class="box-title">{Lang::T('Total Weekly Sales (Mon – Sun)')}</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
            <a href="{Text::url('dashboard&refresh')}" class="btn bg-teal btn-sm">
                <i class="fa fa-refresh"></i>
            </a>
        </div>
    </div>

    <div class="box-body border-radius-none">
        <canvas class="chart" id="weeklySalesChart" style="height: 250px;"></canvas>
    </div>
</div>

<script type="text/javascript">
    {if $_c['hide_tmc'] != 'yes'}
        {literal}
        document.addEventListener("DOMContentLoaded", function() {
            // Get weekly sales from PHP
            var weeklySales = JSON.parse('{/literal}{$weeklySales|json_encode}{literal}');

            // Prepare labels and data
            var labels = [];
            var data = [];

            for (var i = 0; i < weeklySales.length; i++) {
                labels.push(weeklySales[i].weekday);      // Monday, Tuesday...
                data.push(weeklySales[i].totalSales || 0);
            }

            var ctx = document.getElementById('weeklySalesChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Weekly Sales',
                        data: data,
                        backgroundColor: 'rgba(2, 10, 242, 0.6)',
                        borderColor: 'rgba(2, 10, 242, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            grid: { display: false }
                        },
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(0, 0, 0, 0.1)' }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Ksh ' + context.parsed.y.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        });
        {/literal}
    {/if}
</script>
