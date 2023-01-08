@extends('layouts.admin')

@section('title', 'Post List')

@section('css')

@endsection

@section('js')
    <script>
        $('#detailUser').modal('show');

        $(function () {
            const formSubmit = document.getElementById("delete-form");
            const deleteTranslatorSelector = $("#deletePostModal");

            deleteTranslatorSelector.on("show.bs.modal", (e) => {
                formSubmit.action = route(
                    "admin.blog.post.destroy",
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
            <h1>Posts</h1>
        </x-slot>

        <x-section>
            <x-slot name="title">
            </x-slot>

            <x-slot name="header">
                <h4>Blog Posts</h4>
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
                        <a href="{{ route('admin.blog.post.create', rand()) }}" class="btn btn-sm btn-primary">
                            Create Post <i class="fas fa-plus"></i>
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
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Created By</th>
                            <th style="width:150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $posts->firstItem() + $loop->index }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at->format('F j, Y H:i') }}</td>
                                <td>{{ $post->creator['name'] }}</td>
                                <td>
                                    <a href="{{ route('admin.blog.post.edit', $post->id) }}"
                                       class="btn btn-icon btn-sm btn-primary">
                                        <i class="far fa-edit"></i>
                                    </a>

                                    <a href="#"
                                       class="btn btn-icon btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <button data-toggle="modal" data-target="#deletePostModal"
                                            data-id="{{ $post->id }}"
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
                {{ $posts->onEachSide(2)->appends($_GET)->links('admin.partials.pagination') }}
            </x-slot>
        </x-section>
    </x-content>
    @include('admin.pages.blog.modals.delete')
@endsection
