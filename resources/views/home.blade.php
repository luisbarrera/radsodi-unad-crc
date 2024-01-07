@extends('layouts.admin')
@section('title', 'Panel administrador')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css"
        integrity="sha384-nEnU7Ae+3lD52AK+RGNzgieBWMnEfgTbRHIwEvp1XXPdqdO6uLTd/NwXbzboqjc2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    {!! Html::style('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') !!}
    <!-- DataTables -->
    {!! Html::style('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}
    {!! Html::style('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}
    {!! Html::style('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}


@endsection
@section('content')
    <div class="content-wrapper bg-black ">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Panel Administrador</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                {{-- @if (auth()->user()->hasRole('Supervisor'))
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $adquisiciones1 }}</h3>
                                    <p>Inventario</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>{{ $users }}</h3>
                                    <p>Usuarios</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3>{{ $dependencias }}</h3>
                                    <p>Dependencias</p>
                                </div>
                                <div class="icon">
                                    <i class="fab fa-xbox"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-pink">
                                <div class="inner">
                                    <h3>{{ $areas }}</h3>
                                    <p>Areas</p>
                                </div>
                                <div class="icon">
                                    <i class="fab fa-playstation"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif --}}

                {{-- @if (auth()->user()->hasRole('Admin'))
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $adquisiciones1 }}</h3>
                                    <p>Inventario</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <a href="{{ route('planadquisiciones.index') }}" class="small-box-footer">Ver Todo
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>{{ $users }}</h3>
                                    <p>Usuarios</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <a href="{{ route('users.index') }}" class="small-box-footer">Ver todo <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3>{{ $dependencias }}</h3>
                                    <p>Dependencias</p>
                                </div>
                                <div class="icon">
                                    <i class="fab fa-xbox"></i>
                                </div>
                                <a href="{{ route('admin.dependencias.index') }}" class="small-box-footer">Ver Todo
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-pink">
                                <div class="inner">
                                    <h3>{{ $areas }}</h3>
                                    <p>Areas</p>
                                </div>
                                <div class="icon">
                                    <i class="fab fa-playstation"></i>
                                </div>
                                <a href="{{ route('admin.areas.index') }}" class="small-box-footer">Ver Todo <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endif --}}

                <div class="row">
                    <section class="col-lg-12 connectedSortable">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    CRC-UNAD
                                </h3>
                                {{-- @can('planadquisiciones.export')
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="btn btn-success" href="{{ route('planadquisiciones.export') }}">
                                                    <i class="far fa-file-excel"></i> Exportar Todo</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endcan --}}
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-16">
                                    <div class="small-box">
                                        <div id="containerLine"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-16">
                                    <div class="small-box">
                                        <div id="containerBox"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-16">
                                    <div class="small-box">
                                        <div id="containerLine2"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-16">
                                    <div class="small-box">
                                        <div id="containerBox2"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-16">
                                    <div class="small-box">
                                        <div id="containerLine3"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-16">
                                    <div class="small-box">
                                        <div id="containerBox3"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-16">
                                    <div class="small-box">
                                        <div id="containerLine4"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-16">
                                    <div class="small-box">
                                        <div id="containerBox4"></div>
                                    </div>
                                </div>
                                {{-- {<div class="col-lg-6 col-16">
                                    <div class="small-box">
                                        <div id="container"></div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-lg-6 col-16">
                                    <div class="small-box">
                                        <div id="containerTime"></div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-lg-6 col-16">
                                    <div class="small-box">
                                        <canvas id="planes"></canvas>
                                    </div>
                                </div> --}}
                            </div>

                            {{-- <figure class="highcharts-figure">
                            </figure> --}}


                            {{-- <figure class="highcharts-figure">
                                <div id="containerLabel"></div>
                            </figure> --}}
                        </div>
                    </section>
                </div>
            </div>
        </div>


    @endsection

    @section('script')

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/timeline.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
        <script src="https://code.highcharts.com/themes/dark-unica.js"></script>
        <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>


        <script>
            Highcharts.chart('containerLine', {
                chart: {
                    type: 'spline'
                },
                credits: {
                    enabled: false
                },
                title: {
                    style: {
                        color: '#E0E0E3',
                        textTransform: 'uppercase',
                        fontSize: '20px'
                    },
                    text: 'BOGOTA',
                    // align: 'left',
                },

                subtitle: {
                    // text: 'By Job Category. Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>.',
                    align: 'left'
                },

                yAxis: {
                    title: {
                        text:
                            // [
                            //     @foreach ($potencias as $pot)
                            //         {
                            //             name: '{{ $pot->potencia }}',
                            //             y: {{ $pot->pot }}
                            //         },
                            //     @endforeach
                            // ],
                            'Potencia'
                    }
                },
                xAxis: {
                    accessibility: {

                        // rangeDescription: 'Range: 2010 to 2020'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },
                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        pointStart: 1
                    }
                },
                series: [{
                    color: 'yellow',
                    name:
                        'Potencia',

                    data: [
                        @foreach ($potencias as $pot)
                            {
                                name: '{{ $pot->potencia }}',
                                y: {{ $pot->pot }}
                            },
                        @endforeach
                    ],
                }],
                responsive: {
                    rules: [{
                        condition: {
                            // maxWidth: 500,
                            maxHeight: 500,
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });


            Highcharts.chart('containerBox', {


                chart: {
                    type: 'boxplot'
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: 'BOGOTÁ'
                },

                legend: {
                    enabled: false
                },
                // accessibility: {
                //     landmarkVerbosity: 'one'
                // },

                xAxis: {
                    // crosshair: {
                    //     enabled: true
                    // },
                    categories: ['Bogotá'],
                    title: {
                        text: 'Potencia No.'
                    }
                },

                yAxis: {
                    tooltip: {
                        followPointer: true
                    },
                    title: {
                        text: 'Observaciones'
                    },
                    plotLines: [{
                        value: 932,
                        color: 'red',
                        width: 1,
                        label: {
                            // text: 'Theoretical mean: 932',
                            align: 'center',
                            style: {
                                color: 'yellow'
                            }
                        }
                    }]
                },

                series: [{
                    type: 'boxplot',
                    medianWidth: 3,
                    stickyTracking: true,
                    cursor: 'pointer',
                    color: 'yellow',
                    name: 'Observaciones',
                    data: [
                        [
                            @foreach ($potencias as $pot)
                                {{ $pot->pot }},
                            @endforeach
                        ]
                    ],

                    tooltip: {
                        headerFormat: '<em>Potencia {point.key}</em><br/>'
                    }
                }, {
                    name: 'Outliers',
                    color: Highcharts.getOptions().colors[0],
                    type: 'scatter',
                    data: [ // x, y positions where 0 is the first category
                        // [0, 644],


                    ],
                    marker: {
                        fillColor: 'white',
                        lineWidth: 1,
                        lineColor: Highcharts.getOptions().colors[0]
                    },
                    tooltip: {
                        pointFormat: 'Observacion: {point.y}'
                    }
                }]

            });

            Highcharts.chart('containerLine2', {
                chart: {
                    type: 'spline'
                },
                credits: {
                    enabled: false
                },
                title: {
                    style: {
                        color: '#E0E0E3',
                        textTransform: 'uppercase',
                        fontSize: '20px'
                    },
                    text: 'BUCARAMANGA',
                    // align: 'left',
                },

                subtitle: {
                    // text: 'By Job Category. Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>.',
                    align: 'left'
                },

                yAxis: {
                    title: {
                        text:
                            // [
                            //     @foreach ($potencias as $pot)
                            //         {
                            //             name: '{{ $pot->potencia }}',
                            //             y: {{ $pot->pot }}
                            //         },
                            //     @endforeach
                            // ],
                            'Potencia'
                    }
                },
                xAxis: {
                    accessibility: {

                        // rangeDescription: 'Range: 2010 to 2020'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },
                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        pointStart: 1
                    }
                },
                series: [{
                    color: 'yellow',
                    name:
                        //  [
                        //     @foreach ($potencias as $pot)
                        //         {
                        //             name: '{{ $pot->potencia }}',
                        //             y: {{ $pot->pot }}
                        //         },
                        //     @endforeach
                        // ], 
                        'Potencia',
                    // data: [<?php foreach ($potencias as $pot) { ?> {
                    //         name: '<?php echo $pot->potencia; ?>',
                    //         description: 'Potencia: ' + <?php echo $pot->pot; ?>
                    //     },
                    //     <?php } ?>
                    // ],

                    data: [
                        @foreach ($potencias2 as $pot2)
                            {
                                name: '{{ $pot2->segundaPotencia }}',
                                y: {{ $pot2->pot2 }}
                            },
                        @endforeach
                    ],

                }],

                responsive: {
                    rules: [{
                        condition: {
                            // maxWidth: 500,
                            maxHeight: 500,
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });

            Highcharts.chart('containerBox2', {


                chart: {
                    type: 'boxplot'
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: 'BUCARAMANGA'
                },

                legend: {
                    enabled: false
                },
                // accessibility: {
                //     landmarkVerbosity: 'one'
                // },

                xAxis: {
                    // crosshair: {
                    //     enabled: true
                    // },
                    categories: ['Bucaramanga'],
                    title: {
                        text: 'Potencia No.'
                    }
                },

                yAxis: {
                    tooltip: {
                        followPointer: true
                    },
                    title: {
                        text: 'Observaciones'
                    },
                    plotLines: [{
                        value: 932,
                        color: 'blue',
                        width: 1,
                        label: {
                            // text: 'Theoretical mean: 932',
                            align: 'center',
                            style: {
                                color: 'blue'
                            }
                        }
                    }]
                },

                series: [{
                    type: 'boxplot',
                    medianWidth: 3,
                    stickyTracking: true,
                    cursor: 'pointer',
                    color: 'blue',
                    name: 'Observaciones',
                    data: [
                        [
                            @foreach ($potencias2 as $pot2)
                                {{ $pot2->pot2 }},
                            @endforeach
                        ]
                    ],
                    tooltip: {
                        headerFormat: '<em>Potencia {point.key}</em><br/>'
                    }
                }, {
                    name: 'Outliers',
                    color: Highcharts.getOptions().colors[0],
                    type: 'scatter',
                    data: [ // x, y positions where 0 is the first category
                        // [0, 644],


                    ],
                    marker: {
                        fillColor: 'white',
                        lineWidth: 1,
                        lineColor: Highcharts.getOptions().colors[0]
                    },
                    tooltip: {
                        pointFormat: 'Observacion: {point.y}'
                    }
                }]

            });

            Highcharts.chart('containerLine3', {
                chart: {
                    type: 'spline'
                },
                credits: {
                    enabled: false
                },
                title: {
                    style: {
                        color: '#E0E0E3',
                        textTransform: 'uppercase',
                        fontSize: '20px'
                    },
                    text: 'CALI',
                    // align: 'left',
                },

                subtitle: {
                    // text: 'By Job Category. Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>.',
                    align: 'left'
                },

                yAxis: {
                    title: {
                        text:
                            // [
                            //     @foreach ($potencias as $pot)
                            //         {
                            //             name: '{{ $pot->potencia }}',
                            //             y: {{ $pot->pot }}
                            //         },
                            //     @endforeach
                            // ],
                            'Potencia'
                    }
                },

                xAxis: {
                    accessibility: {

                        // rangeDescription: 'Range: 2010 to 2020'
                    }
                },

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },

                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        pointStart: 1
                    }
                },

                series: [{
                    color: 'orange',
                    name: 'Potencia',
                    data: [
                        @foreach ($potencias3 as $pot3)
                            {
                                name: '{{ $pot3->terceraPotencia }}',
                                y: {{ $pot3->pot3 }}
                            },
                        @endforeach
                    ],

                }],

                responsive: {
                    rules: [{
                        condition: {
                            // maxWidth: 500,
                            maxHeight: 500,
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });

            Highcharts.chart('containerBox3', {


                chart: {
                    type: 'boxplot'
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: 'CALI'
                },

                legend: {
                    enabled: false
                },
                // accessibility: {
                //     landmarkVerbosity: 'one'
                // },

                xAxis: {
                    // crosshair: {
                    //     enabled: true
                    // },
                    categories: ['Cali'],
                    title: {
                        text: 'Potencia No.'
                    }
                },

                yAxis: {
                    tooltip: {
                        followPointer: true
                    },
                    title: {
                        text: 'Observaciones'
                    },
                    plotLines: [{
                        value: 932,
                        color: 'orange',
                        width: 1,
                        label: {
                            // text: 'Theoretical mean: 932',
                            align: 'center',
                            style: {
                                color: 'orange'
                            }
                        }
                    }]
                },

                series: [{
                    type: 'boxplot',
                    medianWidth: 3,
                    stickyTracking: true,
                    cursor: 'pointer',
                    color: 'orange',
                    name: 'Observaciones',
                    data: [
                        [
                            @foreach ($potencias3 as $pot3)
                                {{ $pot3->pot3 }},
                            @endforeach
                        ]
                    ],
                    tooltip: {
                        headerFormat: '<em>Potencia {point.key}</em><br/>'
                    }
                }, {
                    name: 'Outliers',
                    color: Highcharts.getOptions().colors[0],
                    type: 'scatter',
                    data: [ // x, y positions where 0 is the first category
                        // [0, 644],


                    ],
                    marker: {
                        fillColor: 'white',
                        lineWidth: 1,
                        lineColor: Highcharts.getOptions().colors[0]
                    },
                    tooltip: {
                        pointFormat: 'Observacion: {point.y}'
                    }
                }]

            });

            Highcharts.chart('containerLine4', {
                chart: {
                    type: 'spline'
                },
                credits: {
                    enabled: false
                },
                title: {
                    style: {
                        color: '#E0E0E3',
                        textTransform: 'uppercase',
                        fontSize: '20px'
                    },
                    text: 'MEDELLIN',
                    // align: 'left',
                },

                subtitle: {
                    // text: 'By Job Category. Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>.',
                    align: 'left'
                },

                yAxis: {
                    title: {
                        text:
                            // [
                            //     @foreach ($potencias as $pot)
                            //         {
                            //             name: '{{ $pot->potencia }}',
                            //             y: {{ $pot->pot }}
                            //         },
                            //     @endforeach
                            // ],
                            'Potencia'
                    }
                },

                xAxis: {
                    accessibility: {

                        // rangeDescription: 'Range: 2010 to 2020'
                    }
                },

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },

                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        pointStart: 1
                    }
                },

                series: [{
                    color: 'pink',
                    name: 'Potencia',
                    data: [
                        @foreach ($potencias4 as $pot4)
                            {
                                name: '{{ $pot4->cuartaPotencia }}',
                                y: {{ $pot4->pot4 }}
                            },
                        @endforeach
                    ],

                }],

                responsive: {
                    rules: [{
                        condition: {
                            // maxWidth: 500,
                            maxHeight: 500,
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });

            Highcharts.chart('containerBox4', {


                chart: {
                    type: 'boxplot'
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: 'MEDELLIN'
                },

                legend: {
                    enabled: false
                },
                // accessibility: {
                //     landmarkVerbosity: 'one'
                // },

                xAxis: {
                    // crosshair: {
                    //     enabled: true
                    // },
                    categories: ['Medellin'],
                    title: {
                        text: 'Potencia No.'
                    }
                },

                yAxis: {
                    tooltip: {
                        followPointer: true
                    },
                    title: {
                        text: 'Observaciones'
                    },
                    plotLines: [{
                        value: 932,
                        color: 'pink',
                        width: 1,
                        label: {
                            // text: 'Theoretical mean: 932',
                            align: 'center',
                            style: {
                                color: 'pink'
                            }
                        }
                    }]
                },

                series: [{
                    type: 'boxplot',
                    medianWidth: 3,
                    stickyTracking: true,
                    cursor: 'pointer',
                    color: 'pink',
                    name: 'Observaciones',
                    data: [
                        [
                            @foreach ($potencias4 as $pot4)
                                {{ $pot4->pot4 }},
                            @endforeach
                        ]
                    ],
                    tooltip: {
                        headerFormat: '<em>Potencia {point.key}</em><br/>'
                    }
                }, {
                    name: 'Outliers',
                    color: Highcharts.getOptions().colors[0],
                    type: 'scatter',
                    data: [ // x, y positions where 0 is the first category
                        // [0, 644],


                    ],
                    marker: {
                        fillColor: 'white',
                        lineWidth: 1,
                        lineColor: Highcharts.getOptions().colors[0]
                    },
                    tooltip: {
                        pointFormat: 'Observacion: {point.y}'
                    }
                }]

            });
        </script>

        {{-- <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
        <script>
            $(function() {
                var varCompra = document.getElementById('planes').getContext('2d');

                var charCompra = new Chart(varCompra, {
                    type: 'line',
                    data: {
                        labels: [<?php foreach ($planes as $reg) {
                            setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                            $mes_traducido = strftime('%B', strtotime($reg->mes));
                        
                            echo '"' . $mes_traducido . '",';
                        } ?>
                        ],
                        datasets: [{
                            label: 'Total del mes',
                            data: [<?php foreach ($planes as $reg) {
                                echo '' . $reg->totalmes . ',';
                            } ?>],

                            backgroundColor: '#E91E63',
                            borderColor: '#E91E63',
                            borderWidth: 3
                        }]
                    },

                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {

                                    beginAtZero: true
                                }
                            }]
                        },
                        legend: {
                            display: false
                        },
                        elements: {
                            point: {
                                radius: 5
                            }
                        }
                    }
                });
            });
        </script> --}}
    @endsection
