@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="small-box bg-secondary">
                        <div class="inner text-center">
                            <h6>Penjualan Hari Ini</h6>
                            <h2>Rp. {{ $penjualan['total'] }}</h2>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 80%; margin: 0 auto;">
                <canvas id="penjualanChart"></canvas>
            </div>
        </div>
    @endsection
    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            $(document).ready(function() {

                getSales();
            });

            function getSales() {
                $.ajax({
                    url: '/getSalesPerMonth',
                    method: 'GET',
                    success: function(dataResponse) {
                        var ctx = document.getElementById('penjualanChart').getContext('2d');
                        var chartData = {
                            labels: [],
                            datasets: [{
                                label: 'Penjualan Per Bulan',
                                data: [],
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        };
                        for (i = 0; i < dataResponse.data.length; i++) {
                            chartData.labels.push(dataResponse.data[i].bulan);
                            chartData.datasets[0].data.push(dataResponse.data[i].jml);
                        }
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: chartData,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }
                })
            }
        </script>
    </section>
@endsection
