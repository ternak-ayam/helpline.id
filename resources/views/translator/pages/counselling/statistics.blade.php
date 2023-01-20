@extends('layouts.admin')

@section('title', 'Statistics')

@section('css')

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [@foreach ($dates as $date) "{{ $date }}", @endforeach],
                datasets: [{
                    label: 'Total Counselling',
                    data: [@foreach ($counsellings as $counselling) {{ $counselling }}, @endforeach],
                    borderWidth: 1
                }, {
                    label: 'Completed Counselling',
                    data: [@foreach ($completeds as $completed) {{ $completed }}, @endforeach],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        });
    </script>
@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Statistics</h1>
        </x-slot>
        <div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Counselling</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalCounselling }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Completed Counselling</h4>
                            </div>
                            <div class="card-body">
                                {{ $completedCounselling }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Today's Counselling</h4>
                            </div>
                            <div class="card-body">
                                {{ $todayCounselling }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-calendar-week"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Upcoming Counselling</h4>
                            </div>
                            <div class="card-body">
                                {{ $upcomingCounselling }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistics</h4>
                    </div>
                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="myChart" height="840" style="display: block; height: 420px; width: 693px;" width="1386" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Counsellings</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach($recentCounsellings as $recent)
                            <li class="media">
                                <div class="media-body">
                                    <div class="float-right text-primary">{{ $recent->updated_at->diffForHumans() }}</div>
                                    <div class="media-title">{{ $recent->counselling_id }}</div>
                                    <span class="text-small text-muted">{{ $recent->getCounsellingMethod() }}</span>
                                    <br>
                                    <div class="badge badge-success text-capitalize">{{ Str::lower($recent->status) }}</div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="text-center pt-1 pb-1">
                            <a href="{{ route('translator.counselling.schedule.index') }}" class="btn btn-primary btn-lg btn-round">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-content>

@endsection
