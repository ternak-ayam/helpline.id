@extends('layouts.admin')

@section('title', 'Edit Post')

@section('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        let quill = new Quill('#bodyEditor', {
            theme: 'snow',
            modules: {
                'toolbar': [
                    [{ 'font': [] }, { 'size': [] }],
                    [ 'bold', 'italic', 'underline', 'strike' ],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'super' }, { 'script': 'sub' }],
                    [{ 'header': '1' }, { 'header': '2' }, 'blockquote', 'code-block' ],
                    [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
                    [ 'direction', { 'align': [] }],
                    [ 'link', 'image', 'video', 'formula' ],
                    [ 'clean' ]
                ]
            }
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            document.querySelector("input[name='body']").value = quill.root.innerHTML;
        });
    </script>
@endsection

@section('content')
    <x-content>
        <x-slot name="modul">
            <h1>Edit Post</h1>
        </x-slot>

        <form action="{{ route('admin.blog.post.update', $post->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>Edit Post</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">Title & Tags</div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                               value="{{ old('title', $post->title) }}"
                               required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" class="form-control" name="tags" id="tags"
                               value="{{ old('tags', $post->tags) }}" placeholder="e.g: tags1, tags2, tags3">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="section-title mt-0">Body Content</div>
                    <input type="hidden" name="body" value="{{ $post->body }}">
                    <div id="bodyEditor" style="min-height: 160px;">{!! $post->body !!}</div>
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
