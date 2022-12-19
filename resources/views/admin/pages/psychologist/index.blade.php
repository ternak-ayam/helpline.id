@extends('layouts.admin')

@section('title', 'Psychologist')

@section('css')

@endsection

@section('js')
    <script>
        $('#detailPsychologist').modal('show');
    </script>
@endsection

@section('content')

<x-content>
    <x-slot name="modul">
        <h1>Psychologist</h1>
    </x-slot>

    <x-section>
        <x-slot name="title">
        </x-slot>

        <x-slot name="header">
            <h4>Data Psychologists</h4>
            <div class="card-header-form row">
                <div>
                    <form>
                        <div class="input-group">
                            <input type="text" name="query" id="query" class="form-control" placeholder="Search"
                                value="{{ Request::input('query') ?? ''}}">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ml-2">
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createPsychologist">
                        Add New Psychologist <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </x-slot>

        <x-slot name="body">
            <div class="table-responsive">
                <table class="table table-bordered  table-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width:150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($psychologists as $psychologist)
                        <tr>
                            <td>{{ $loop->index + $psychologists->firstItem() }}</td>
                            <td>{{ $psychologist->name }}</td>
                            <td>{{ $psychologist->email }}</td>
                            <td>
                                <a href="#"
                                    class="btn btn-icon btn-sm btn-primary" data-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.user.psychologist.show', $psychologist->id) }}"
                                    class="btn btn-icon btn-sm btn-info">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                <a href="javascript:;" data-url="#"
                                    data-id="{{ $psychologist->id }}" data-redirect="#"
                                    class="btn btn-sm btn-danger delete">
                                    <i class="fas fa-times"></i>
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
        </x-slot>

        <x-slot name="footer">
            {{ $psychologists->onEachSide(2)->appends($_GET)->links('admin.partials.pagination') }}
        </x-slot>
    </x-section>

</x-content>
@include('admin.pages.psychologist.modals.create')
@if(session('psychologist'))
    @include('admin.pages.psychologist.modals.detail', ['psychologist' => session('psychologist')])
@endif
@endsection
