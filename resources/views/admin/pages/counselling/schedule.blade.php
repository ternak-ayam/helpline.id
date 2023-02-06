@extends('layouts.admin')

@section('title', 'Schedule')

@section('css')

@endsection

@section('js')

@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Schedule</h1>
        </x-slot>

        <div class="card">
            <div class="card-header">
                <h4>Counselling Schedules</h4>
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
                            <th>Status</th>
                        </tr>
                        @forelse($schedules as $schedule)
                            <tr>
                                <td>{{ $schedules->firstItem() + $loop->index }}</td>
                                <td>{{ $schedule->counselling['counselling_id'] }}</td>
                                <td>{{ $schedule->counsellor['name'] }}</td>
                                <td>{{ $schedule->counselling->getCounsellingMethod() }}</td>
                                <td>{{ $schedule->counselling['due']->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</td>
                                <td>
                                    <div
                                        class="badge badge-success text-capitalize">{{ Str::lower($schedule->counselling['status']) }}</div>
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
            </div>
            {{ $schedules->onEachSide(2)->appends($_GET)->links('admin.partials.pagination') }}
        </div>
    </x-content>

@endsection
