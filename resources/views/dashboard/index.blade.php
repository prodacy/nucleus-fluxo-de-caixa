@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="row">

    <div class="col-xl-5 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 show-down">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Entrada</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 rs">{{Helper::coin($total_cash_in)}}</div>
                    </div>

                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">À Receber</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 rs">{{Helper::coin($total_cash_in_future)}}</div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-5 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2 show-down">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Saída</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 rs">{{Helper::coin($total_cash_out)}}</div>
                    </div>

                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">À Pagar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 rs">{{Helper::coin($total_cash_out_future)}}</div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2 show-down">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Clientes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$clients}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



<div class="row">

    <div class="col-12 col-xl-8 mb-4">

        <div class="card shadow show-down">
            <div class="card-header">
                Por vencimento
            </div>
            <div class="card-body">
                <canvas id="chart_1" width="100%"></canvas>
            </div>
        </div>

    </div>
    <div class="col-12 col-xl-4 mb-4">

        <div class="card shadow">
            <div class="card-header">
                Por total
            </div>
            <div class="card-body">
                <canvas id="chart_2" width="100%"></canvas>
            </div>
        </div>

    </div>

</div>


@endsection

@section('scripts')


<script>
    $(document).ready(function(){

    // line

    var ctx1 = document.getElementById('chart_1');
    data = {
        labels: {!!json_encode(array_keys($cash_in))!!} ,
        datasets: [
        {
            label: 'Entradas',
            data: {!!json_encode(array_values($cash_in))!!},
            fill: false,
            borderColor: 'rgb(0, 191, 0)',
            tension: 0.1
        },

        {
            label: 'Saídas',
            data: {!!json_encode(array_values($cash_out))!!},
            fill: false,
            borderColor: 'rgb(200, 50, 50)',
            tension: 0.1
        },
        ]
    };
    chart1 = new Chart(ctx1, {
        type: 'line',
        data: data,
        options : {
            animations: {
              tension: {
                duration: 1000,
                easing: 'linear',
                from: 0.1,
                to: 0,
                loop: true
            }
        },
    }
});


    


    // pie
    var ctx2 = document.getElementById('chart_2');
    data = {
        labels: ['Entrada / À Receber','Saída / À Pagar'],
        datasets: [{
            data: [{{$total_cash_in + $total_cash_in_future}},{{$total_cash_out + $total_cash_out_future}}],
            backgroundColor: ['#1cc88a','#e74a3b'],
            hoverOffset: 4
        }]
    };
    chart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: data,
        options: {

            plugins: {
                legend:{
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 11,
                        },
                        boxWidth: 11,
                        boxHeight: 11,
                        padding: 4,
                    }
                },
            }
        }
    });


});

</script>

@endsection