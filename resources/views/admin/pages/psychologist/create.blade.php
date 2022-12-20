@extends('layouts.admin')

@section('title', 'Proyek')

@section('css')

@endsection

@section('js')
    <script>
        const imageDisplayElement = document.getElementById("imageDisplay");
        const imageInputElement = document.getElementById("image");

        imageInputElement?.addEventListener("change", (e) => {
            let imageUrl = URL.createObjectURL(e.target.files[0]);

            imageDisplayElement.setAttribute("src", imageUrl);
        });
    </script>
@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Add New Psychologist</h1>
        </x-slot>
        <div>
            <form action="{{ route('admin.user.psychologist.store') }}" enctype="multipart/form-data" method="post"
                  class="needs-validation" novalidate onkeydown="return event.key !== 'Enter';">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-sm-12 my-1">
                        <div class="bg-white p-3 rounded-lg shadow">
                            <p>Profile Picture</p>
                            <div class="mt-1">
                                <img style="height: 250px; object-fit: cover" class="w-100 rounded-lg" id="imageDisplay"
                                     src="{{ asset('/assets/people.png') }}" alt="Profile Picture">
                            </div>
                            <input type="file" accept="image/png, image/jpg, image/jpeg" class="d-none form-control"
                                   name="image" id="image">
                            <div class="mt-2">
                                <label for="image" class="btn btn-primary w-100 cursor-pointer">Change Picture</label>
                            </div>
                            <div class="mt-2">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 my-1">
                        <div class="card">
                            <div class="card-header">
                                <h4>Psychologist Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="section-title mt-0">Basic Information</div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{ old('name') }}"
                                           required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                           value="{{ old('email') }}" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Bio</label>
                                    <textarea class="form-control" required name="description" spellcheck="false"
                                              style="height: 61px;">{{ old('description') }}</textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="row mt-4">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>Konfirmasi Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="passwordConfirmation"
                                                   name="password_confirmation" required>
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="section-title mt-0">Education Information</div>
                                <div class="form-group">
                                    <label>Major</label>
                                    <input type="text" class="form-control" name="major" id="major"
                                           value="{{ old('major') }}"
                                           required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label>School/Institution</label>
                                    <input type="text" class="form-control" name="institution" id="institution"
                                           value="{{ old('institution') }}"
                                           required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="section-title mt-0">Language Information</div>
                                <div class="form-group">
                                    <label>Language</label>
                                    <input type="text" class="form-control" name="language" id="language"
                                           value="{{ old('language') }}"
                                           required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="mx-1">
                                <a href="{{ url()->previous() }}" class="btn border bg-white" type="button">Back</a>
                            </div>
                            <div class="mx-1">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </x-content>

@endsection
