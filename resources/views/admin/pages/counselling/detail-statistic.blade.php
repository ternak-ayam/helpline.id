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
            <h1>User Statistics</h1>
        </x-slot>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistics</h4>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor"
                             style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand"
                                 style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink"
                                 style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <canvas id="myChart" height="840" style="display: block; height: 420px; width: 693px;"
                                width="1386" class="chartjs-render-monitor"></canvas>
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
                                        <div
                                            class="float-right text-primary">{{ $recent->updated_at->diffForHumans() }}</div>
                                        <div class="media-title">{{ $recent->counselling_id }}</div>
                                        <span class="text-small text-muted">{{ $recent->getCounsellingMethod() }}</span>
                                        <br>
                                        <div
                                            class="badge badge-success text-capitalize">{{ Str::lower($recent->status) }}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="text-center pt-1 pb-1">
                            <a href="{{ route('admin.counselling.data.index') }}" class="btn btn-primary btn-lg btn-round">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Counselling Statistics Histories</h4>
                <div class="card-header-form">
                    <div class="ml-2">
                        <a href="{{ route('admin.counselling.statistics.export', request()->route('user')) }}" class="btn btn-sm btn-success">
                            Download as Excel <i class="fas fa-download"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>No</th>
                            <th>Counselling ID</th>
                            <th>Counsellor</th>
                            <th>Counselling Method</th>
                            <th>Date & Time</th>
                            <th>Session</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th width="140">Action</th>
                        </tr>
                        @forelse($counsellingDetails as $counselling)
                            <tr>
                                <td>{{ $loop->index + $counsellingDetails->firstItem() }}</td>
                                <td>{{ $counselling->counselling_id }}</td>
                                <td>{{ $counselling->counsellor['name'] }}</td>
                                <td>{{ $counselling->getCounsellingMethod() }}</td>
                                <td>{{ $counselling->due->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</td>
                                <td>{{ $counselling->getSessionQuantity() }}</td>
                                <td>
                                    <div
                                        class="badge badge-success text-capitalize">{{ Str::lower($counselling->status) }}</div>
                                </td>
                                <td>{{ $counselling->created_at->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.counselling.data.show', $counselling->id) }}"
                                       class="btn btn-danger">Detail <i
                                            class="fas fa-chevron-right"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <p class="text-center"><em>There is no record.</em></p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $counsellingDetails->onEachSide(2)->appends($_GET)->links('admin.partials.pagination') }}
            </div>
        </div>
    </x-content>

@endsection
