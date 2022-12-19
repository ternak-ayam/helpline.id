@extends('layouts.admin')

@section('title', 'Translator')

@section('css')

@endsection

@section('js')
    <script>
        $('#detailTranslator').modal('show');
    </script>
@endsection

@section('content')

<x-content>
    <x-slot name="modul">
        <h1>Translator</h1>
    </x-slot>

    <x-section>
        <x-slot name="title">
        </x-slot>

        <x-slot name="header">
            <h4>Data Translators</h4>
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
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createTranslator">
                        Add New Translator <i class="fas fa-plus"></i>
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
                        @forelse($translators as $translator)
                        <tr>
                            <td>{{ $loop->index + $translators->firstItem() }}</td>
                            <td>{{ $translator->name }}</td>
                            <td>{{ $translator->email }}</td>
                            <td>
                                <a href="#"
                                    class="btn btn-icon btn-sm btn-primary" data-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.user.translator.show', $translator->id) }}"
                                    class="btn btn-icon btn-sm btn-info">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                <a href="javascript:;" data-url="#"
                                    data-id="{{ $translator->id }}" data-redirect="#"
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
            {{ $translators->onEachSide(2)->appends($_GET)->links('admin.partials.pagination') }}
        </x-slot>
    </x-section>

</x-content>
@include('admin.pages.translator.modals.create')
@if(session('translator'))
    @include('admin.pages.translator.modals.detail', ['translator' => session('translator')])
@endif
@endsection
