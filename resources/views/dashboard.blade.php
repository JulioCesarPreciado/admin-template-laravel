@extends('layouts.app')
{{-- Nombre en el title --}}
@section('title')
    Dashboard
@endsection
{{-- Nombre en el header --}}
@section('header')
    Dashboard
@endsection
{{-- Contenido --}}
@section('content')
    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/4 xl:w-1/4 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <span id="permisionarios" class="font-semibold text-xl text-blueGray-700">
                                0
                            </span>
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                {{ __('Merchants') }}
                            </h5>
                        </div>
                        <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-600">
                            <i class="fas fa-user"></i>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4  xl:w-1/4 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <span id="puestos" class="font-semibold text-xl text-blueGray-700">
                               0
                            </span>
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                {{ __('Stalls') }}
                            </h5>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-green-600">
                                <i class="fas fa-store"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4  xl:w-1/4 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <span id="tianguis" class="font-semibold text-xl text-blueGray-700">
                                0
                            </span>
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                {{ __('Tianguis') }}
                            </h5>

                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-600">
                                <i class="fas fa-map-pin"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4  xl:w-1/4 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-3 max-w-full flex-grow flex-1">
                            <span id="administradores" class="font-semibold text-xl text-blueGray-700">
                                0
                            </span>
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                {{ __('Administrators') }}
                            </h5>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-teal-500">

                                <i class="fas fa-id-badge"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap mt-4">
        <div class="w-full xl:w-full mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h6 class="uppercase text-blueGray-100 mb-1 text-xs font-semibold">
                                {{ __('Merchants and stalls per month') }}
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="p-4 flex-auto">
                    <!-- Chart -->
                    <div class="relative h-350-px">
                        <canvas id="line-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- CHART JS INITIALISATIONS --}}
    @push('js')
        <script>
            (function() {
                //Contadores
                //Contador de número de permisionarios
                $.ajax({
                    url: "https://pgm-apps.com/utils/apis/tianguis-gdl/?model=permisionario&id=0&counts",
                    type: "GET",
                    success: function(data) {
                        $('#permisionarios').empty();
                        $('#permisionarios').append(data);
                    },
                    error: function() {
                        toastr.warning('{{ __('Something went wrong!') }}');
                    }
                });
                //Contador de número de puestos
                $.ajax({
                    url: "https://pgm-apps.com/utils/apis/tianguis-gdl/?model=puestos&id=0&counts",
                    type: "GET",
                    success: function(data) {
                        $('#puestos').empty();
                        $('#puestos').append(data);
                    },
                    error: function() {
                        toastr.warning('{{ __('Something went wrong!') }}');
                    }
                });
                //Contador de número de tianguis
                $.ajax({
                    url: "https://pgm-apps.com/utils/apis/tianguis-gdl/?model=tianguis&id=0&counts",
                    type: "GET",
                    success: function(data) {
                        $('#tianguis').empty();
                        $('#tianguis').append(data);
                    },
                    error: function() {
                        toastr.warning('{{ __('Something went wrong!') }}');
                    }
                });
                 //Contador de número de administradores
                 $.ajax({
                    url: "https://pgm-apps.com/utils/apis/tianguis-gdl/?model=administradores&id=0&counts",
                    type: "GET",
                    success: function(data) {
                        $('#administradores').empty();
                        $('#administradores').append(data);
                    },
                    error: function() {
                        toastr.warning('{{ __('Something went wrong!') }}');
                    }
                });


                var merchants_per_month = [0,0,0,25782,25808,0,0,0,0,0,0,0];
                var stalls_per_month = [0,0,0,38622,38594,0,0,0,0,0,0,0];

                var config = {
                    type: "line",
                    data: {
                        labels: [
                            "Enero",
                            "Febrero",
                            "Marzo",
                            "Abril",
                            "Mayo",
                            "Junio",
                            "Julio",
                            "Agosto",
                            "Septiembre",
                            "Octubre",
                            "Noviembre",
                            "Diciembre"
                        ],
                        datasets: [{
                                label:'Permisionarios',
                                backgroundColor: "#4c51bf",
                                borderColor: "#4c51bf",
                                data: merchants_per_month,
                                fill: false,
                            },
                            {
                                label: 'Puestos',
                                backgroundColor: "#fff",
                                borderColor: "#fff",
                                data: stalls_per_month,
                                fill: false,
                            },
                        ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        title: {
                            display: false,
                            text: "Sales Charts",
                            fontColor: "white",
                        },
                        legend: {
                            labels: {
                                fontColor: "white",
                            },
                            align: "end",
                            position: "bottom",
                        },
                        tooltips: {
                            mode: "index",
                            intersect: false,
                        },
                        hover: {
                            mode: "nearest",
                            intersect: true,
                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    fontColor: "rgba(255,255,255,.7)",
                                },
                                display: true,
                                scaleLabel: {
                                    display: false,
                                    labelString: "Month",
                                    fontColor: "white",
                                },
                                gridLines: {
                                    display: false,
                                    borderDash: [2],
                                    borderDashOffset: [2],
                                    color: "rgba(33, 37, 41, 0.3)",
                                    zeroLineColor: "rgba(0, 0, 0, 0)",
                                    zeroLineBorderDash: [2],
                                    zeroLineBorderDashOffset: [2],
                                },
                            }, ],
                            yAxes: [{
                                ticks: {
                                    fontColor: "rgba(255,255,255,.7)",
                                },
                                display: true,
                                scaleLabel: {
                                    display: false,
                                    labelString: "Value",
                                    fontColor: "white",
                                },
                                gridLines: {
                                    borderDash: [3],
                                    borderDashOffset: [3],
                                    drawBorder: false,
                                    color: "rgba(255, 255, 255, 0.15)",
                                    zeroLineColor: "rgba(33, 37, 41, 0)",
                                    zeroLineBorderDash: [2],
                                    zeroLineBorderDashOffset: [2],
                                },
                            }, ],
                        },
                    },
                };
                var ctx = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(ctx, config);

            })();
        </script>
    @endpush
@endsection
