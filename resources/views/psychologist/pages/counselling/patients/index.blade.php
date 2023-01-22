@extends('layouts.admin')

@section('title', 'Patient Records')

@section('css')

@endsection

@section('js')

@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Patient Records</h1>
        </x-slot>
        <div class="card">
            <div class="card-header">
                <h4>Patient Records</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Counselling Time</th>
                            <th>Counselling Method</th>
                            <th>Action</th>
                        </tr>
                        @forelse($schedules as $schedule)
                            <tr>
                                <td>{{ $schedules->firstItem() + $loop->index }}</td>
                                <td>{{ $schedule->user['name'] }}</td>
                                <td>{{ $schedule->due->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</td>
                                <td>{{ $schedule->getCounsellingMethod() }}</td>
                                <td>
                                    <a href="{{ route('psychologist.counselling.patient.show', $schedule->counselling_id) }}" class="btn btn-primary"><i
                                            class="fas fa-eye"></i>
                                    </a>
                                    <a target="_blank" href="{{ route('psychologist.patient.download', $schedule->counselling_id) }}" class="btn btn-success"><i
                                            class="fas fa-download"></i>
                                    </a>
                                    @if($schedule->isEmergency())
                                    <a class="btn btn-danger"><i class="fas fa-exclamation text-white"></i></a>
                                    @endif
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
