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
                <h4>Counsellor Schedules</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>Booking ID</th>
                            <th>Counselling Method</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->counselling_id }}</td>
                                <td>{{ $schedule->getCounsellingMethod() }}</td>
                                <td>{{ $schedule->due->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</td>
                                <td>
                                    @if($schedule->status === \App\Models\Counselling::BOOKED)
                                        <div class="badge badge-success">{{ Str::lower($schedule->status) }}</div>
                                    @elseif($schedule->status === \App\Models\Counselling::ENDED)
                                        <div class="badge badge-danger">{{ Str::lower($schedule->status) }}</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ $schedule->getChatUrl() }}" target="_blank" class="btn btn-danger">Start <i
                                            class="fas fa-chevron-right"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <p class="text-center"><em>There is no record.</em></p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-content>

@endsection
