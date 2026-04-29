@extends('layouts.admin')

@section('adminContent')
<style>
.welcome{
    font-size: 70px;
    text-align: center;
    padding: 100px;
    color: #6AC7B4;
}
.card-font{
    font-family: 'Pacifico', cursive;
}
.card1{
    background-size: cover;
    border: 6px solid #6AC7B4;
}
</style>
<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lexend+Tera|Pacifico&display=swap" rel="stylesheet">


<div class="content ">
    <div class="row main-padding dashboard">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body card-box card-blue">
                    <h2 class="" style="text-align:center;">Reservations</h2>
                <h4 class="card-text" style="text-align:center;"><b>@if (count($reservations) < 0) 0 @else {{count($reservations)}} @endif</b></h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body card-box card-green">
                    <h2 class="" style="text-align:center;">Rooms</h2>
                    <h4 class="card-text" style="text-align:center;"><b>@if (count($rooms) < 0) 0 @else {{count($rooms)}} @endif</b></h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body card-box card-purple">
                    <h2 class="" style="text-align:center;">Customers</h2>
                    <h4 class="card-text" style="text-align:center;"><b>@if (count($customers) < 0) 0 @else {{count($customers)}} @endif</b></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="main-padding text-center">
        <h1  class="text-center">Dashboard Overview</h1>
        <p>Monitor reservations, room availability, and customer activity.</p>
    </div>
</div>    
<!-- Load Chart.js FIRST -->
<div class="main-padding">
    <canvas id="myChart" height="100"></canvas>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("myChart");

    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan","Feb","Mar","Apr","May"],
                datasets: [{
                    label: "Reservations",
                    data: [5, 10, 8, 15, 20],
                    borderColor: "#4facfe",
                    backgroundColor: "rgba(79,172,254,0.2)",
                    tension: 0.4,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        });
    }
});
</script>
@endsection 

