@extends('layouts.admin')

@section('title', 'Create New Post')

@section('css')
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/css/froala_editor.pkgd.min.css' rel='stylesheet'
          type='text/css'/>
@endsection

@section('js')
    <script type='text/javascript'
            src='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/js/froala_editor.pkgd.min.js'></script>
    <script>
        let editor = new FroalaEditor('#bodyEditor', {
            imageUploadURL: '{{ route('admin.blog.post.storeImage') }}',
            imageUploadParams: {
                id: {{ $id }}
            }
        });
    </script>
@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Create New Post</h1>
        </x-slot>

        <form action="{{ route('admin.blog.post.store', $id) }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4>New Post</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">Title & Tags</div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                               value="{{ old('title') }}"
                               required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" class="form-control" name="tags" id="tags"
                               value="{{ old('tags') }}" placeholder="e.g: tags1, tags2, tags3">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="section-title mt-0">Body Content</div>
                    <textarea id="bodyEditor" name="body">{{ old('body') }}</textarea>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <div class="mx-1">
                            <a href="{{ url()->previous() }}" class="btn border bg-white" type="button">Back</a>
                        </div>
                        <div class="mx-1">
                            <button class="btn btn-primary" type="submit">Save & Publish</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-content>

@endsection
