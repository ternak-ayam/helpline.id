@extends('layouts.admin')

@section('title', 'User')

@section('css')

@endsection

@section('js')
    <script>
        $('#detailUser').modal('show');

        $(function () {
            const formSubmit = document.getElementById("delete-form");
            const deleteTranslatorSelector = $("#deleteUserModal");

            deleteTranslatorSelector.on("show.bs.modal", (e) => {
                formSubmit.action = route(
                    "admin.user.destroy",
                    $(e.relatedTarget).data("id")
                );
            });

            deleteTranslatorSelector.on("hide.bs.modal", (e) => {
                formSubmit.action = "";
            });
        });
    </script>
@endsection

@section('content')

<x-content>
    <x-slot name="modul">
        <h1>User</h1>
    </x-slot>

    <x-section>
        <x-slot name="title">
        </x-slot>

        <x-slot name="header">
            <h4>Data Users</h4>
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
                    <button data-target="#importUserModal" data-toggle="modal" class="btn btn-sm btn-success">
                        Import Users <i class="fas fa-upload"></i>
                    </button>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary">
                        Add New User <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </x-slot>

        <x-slot name="body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>UNHCR Number</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Birthdate</th>
                            <th>Sex</th>
                            <th style="width:150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->index + $users->firstItem() }}</td>
                            <td>{{ $user->unhcr_number }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->country }}</td>
                            <td>{{ $user->birthdate->format('F j, Y') }}</td>
                            <td>{{ Str::ucfirst($user->sex) }}</td>
                            <td>
                                <a href="{{ route('admin.user.edit', $user->id) }}"
                                    class="btn btn-icon btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>

                                <a href="{{ route('admin.user.show', $user->id) }}"
                                    class="btn btn-icon btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <button data-toggle="modal" data-target="#deleteUserModal"
                                        data-id="{{ $user->id }}"
                                        class="btn btn-sm btn-danger delete">
                                    <i class="fas fa-trash"></i>
                                </button>
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
            {{ $users->onEachSide(2)->appends($_GET)->links('admin.partials.pagination') }}
        </x-slot>
    </x-section>

</x-content>
    @include('admin.pages.user.modals.delete')
    @include('admin.pages.user.modals.import')
@if(session('user'))
    @include('admin.pages.user.modals.detail', ['user' => session('user')])
@endif
@endsection
