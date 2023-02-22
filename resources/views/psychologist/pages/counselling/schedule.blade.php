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
                            <th>No</th>
                            <th>Counselling ID</th>
                            <th>Counselling Method</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse($schedules as $schedule)
                            <tr>
                                <td>{{ $schedules->firstItem() + $loop->index }}</td>
                                <td>{{ $schedule->counselling_id }}</td>
                                <td>{{ $schedule->getCounsellingMethod() }}</td>
                                <td>{{ $schedule->due->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</td>
                                <td>
                                    <div
                                        class="badge badge-success text-capitalize">{{ Str::lower($schedule->status) }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('psychologist.counselling.schedule.show', $schedule->id) }}"
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
                <div>
                    {{ $schedules->withQueryString()->onEachSide(2)->appends($_GET)->links('admin.partials.pagination') }}
                </div>
            </div>
        </div>
    </x-content>

@endsection
