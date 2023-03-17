@extends('layouts.admin')

@section('title', 'Statistics')

@section('css')

@endsection

@section('js')

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
                                <h4>Total Users</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalUsers }}
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
                                <h4>Total Counsellors</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalCounsellors }}
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
                                <h4>Total Translators</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalTranslators }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Users Statistics</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Sex</th>
                                    <th>Action</th>
                                </tr>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $users->firstItem() + $loop->index }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->country }}</td>
                                        <td>{{ Str::ucfirst($user->sex) }}</td>
                                        <td>
                                            <a href="{{ route('admin.counselling.statistics.show', $user->id) }}"
                                               class="btn btn-danger">Counselling Report <i
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
                        {{ $users->onEachSide(2)->appends($_GET)->links('admin.partials.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </x-content>

@endsection
