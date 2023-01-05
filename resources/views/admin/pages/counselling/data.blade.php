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
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>Counselling ID</th>
                            <th>Counsellor</th>
                            <th>Counselling Method</th>
                            <th>Date & Time</th>
                            <th>Session</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->counselling['counselling_id'] }}</td>
                                <td>{{ $schedule->counsellor['name'] }}</td>
                                <td>{{ $schedule->counselling->getCounsellingMethod() }}</td>
                                <td>{{ $schedule->counselling['due']->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</td>
                                <td>{{ $schedule->counselling->getSessionQuantity() }}</td>
                                <td>
                                    <div
                                        class="badge badge-success text-capitalize">{{ Str::lower($schedule->counselling['status']) }}</div>
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
                                <td colspan="5">
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
