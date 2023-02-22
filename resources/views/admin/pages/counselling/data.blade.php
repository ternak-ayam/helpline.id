@extends('layouts.admin')

@section('title', 'Counselling Data')

@section('css')

@endsection

@section('js')

@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Counselling</h1>
        </x-slot>
        <div class="card">
            <div class="card-header">
                <h4>Counselling Data</h4>
                <div class="card-header-form">
                <div>
                    <form>
                        <div class="input-group">
                            <select type="text" name="filter" id="filter" class="form-control" onchange="this.form.submit()">
                                <option value="all" @if(!request()->get('filter')) selected @endif>All</option>
                                <option value="today" @if(request()->get('filter') == 'today') selected @endif>Today</option>
                                <option value="this_month" @if(request()->get('filter') == 'this_month') selected @endif>This Month</option>
                                <option value="last_30" @if(request()->get('filter') == 'last_30') selected @endif>Last 30 Days</option>
                                <option value="last_7" @if(request()->get('filter') == 'last_7') selected @endif>Last 7 Days</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div>
                    <span>
                        Booked: {{ $booked }}
                    </span>
                </div>
                <div>
                    <span>
                        Success: {{ $success }}
                    </span>
                </div>
                <div>
                    <span>
                        Failed: {{ $failed }}
                    </span>
                </div>
            </div>
            </div>
            <div class="card-body p-0">
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
                            <th width="140">Action</th>
                        </tr>
                        @forelse($schedules as $schedule)
                            <tr>
                                <td>{{ $schedules->firstItem() + $loop->index }}</td>
                                <td>{{ $schedule->counselling_id }}</td>
                                <td>{{ $schedule->counsellor['name'] }}</td>
                                <td>{{ $schedule->getCounsellingMethod() }}</td>
                                <td>{{ $schedule->due->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</td>
                                <td>{{ $schedule->getSessionQuantity() }}</td>
                                <td>
                                    <div
                                        class="badge badge-success text-capitalize">{{ Str::lower($schedule->status) }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.counselling.data.show', $schedule->id) }}"
                                       class="btn btn-danger">Detail <i
                                            class="fas fa-chevron-right"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <p class="text-center"><em>There is no record.</em></p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $schedules->withQueryString()->onEachSide(2)->appends($_GET)->links('admin.partials.pagination') }}
                </div>
            </div>
        </div>
    </x-content>

@endsection
