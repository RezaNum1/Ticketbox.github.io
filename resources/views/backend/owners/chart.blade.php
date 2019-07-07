@extends('backend.base_owner')
@section('content')



    <script type="text/javascript" src="{{asset('assets/js/Chart.js')}}"></script>

    <div class="text-center" style="font-size: 40px; font-family: 'Ultra', serif; margin-top: 200px;">
        <label style="color: black;">Ticket Graphic Purchases</label></div>
    </div>
    <div style="width: 800px;height: auto;margin: 0 auto;margin-top: 20px;">
        <canvas id="myChart"></canvas>

    </div>

    <div class="text-center" style="font-size: 40px; font-family: 'Ultra', serif; margin-top: 100px;margin-top: 100px">
        <label style="color: black;">Ticket Profit Graphic</label></div>
    </div>
    <div style="width: 800px;height: auto;margin: 0 auto;margin-bottom: 100px;">

        <canvas id="myChart2"></canvas>
    </div>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Today's Ticket Purchases", "Days Ago", "2 Days Ago"],
                datasets: [{
                    label: '',
                    data: [
                        {{$Now}},{{$lastday}}, {{$lastsday}}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["This Month", "Month Ago", "2 Month Ago"],
                datasets: [{
                    label: '',
                    data: [
                        {{$ThisMonth}},{{50000000}}, {{8000000}}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>

@endsection