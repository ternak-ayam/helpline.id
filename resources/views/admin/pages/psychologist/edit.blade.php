@extends('layouts.admin')

@section('title', 'Edit Psychologist')

@section('css')

@endsection

@section('js')
    <script>
        const imageDisplayElement = document.getElementById("imageDisplay");
        const imageInputElement = document.getElementById("image");
        const btnAddEducation = document.getElementById("btn_add_education");
        const btnAddLanguage = document.getElementById("btn_add_language");
        const language = document.getElementById("language");
        const education = document.getElementById("education");

        imageInputElement?.addEventListener("change", (e) => {
            let imageUrl = URL.createObjectURL(e.target.files[0]);

            imageDisplayElement.setAttribute("src", imageUrl);
        });

        btnAddEducation.addEventListener("click", () => {
            let educationContent = `
                    <div class="row">
                       <div class="form-group col-md-6 col-sm-12">
                        <label>Major</label>
                        <input type="text" class="form-control" name="education[major][]" required>
                       </div>
                       <div class="form-group col-md-6 col-sm-12">
                        <label>School/Institution</label>
                        <input type="text" class="form-control" name="education[institution][]" required>
                       </div>
                    </div>
           `;

            education.insertAdjacentHTML('beforeend', educationContent);
        });

        btnAddLanguage.addEventListener("click", () => {
            let languageContent = `
                <div class="form-group">
                   <label>Language</label>
                    <input type="text" class="form-control" name="language[]" id="language" required>
                </div>
           `;

            language.insertAdjacentHTML('beforeend', languageContent);
        });

    </script>
@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Edit Psychologist</h1>
        </x-slot>
        <div>
            <form action="{{ route('admin.user.psychologist.update', $psychologist->id) }}"
                  enctype="multipart/form-data" method="post"
                  class="needs-validation" novalidate onkeydown="return event.key !== 'Enter';">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 col-sm-12 my-1">
                        <div class="card">
                            <div class="card-header">
                                <h4>Psychologist Profile Picture</h4>
                            </div>
                            <div class="card-body">
                                <div class="mt-1">
                                    <img style="height: 250px; object-fit: cover" class="w-100 rounded-lg"
                                         id="imageDisplay"
                                         src="{{ $psychologist->getImageUrl() }}" alt="Profile Picture">
                                </div>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" class="d-none form-control"
                                       name="image" id="image">
                                <div class="mt-2">
                                    <label for="image" class="btn btn-primary w-100 cursor-pointer">Change
                                        Picture</label>
                                </div>
                                <div class="mt-2">
                                    <div class="invalid-feedback"></div>
                                </div>
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
                                           value="{{ old('name', $psychologist->name) }}"
                                           required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                           value="{{ old('email', $psychologist->email) }}" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Bio</label>
                                    <textarea class="form-control" required name="bio" spellcheck="false"
                                              style="height: 61px;">{{ old('bio', $psychologist->bio) }}</textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="row mt-4">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                   required>
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
                                <div title="Education Information" class="mt-4">
                                    @foreach($psychologist->educations as $education)
                                        <div class="row">
                                            <div class="form-group col-md-6 col-sm-12">
                                                <label>Major</label>
                                                <input type="text" class="form-control" name="education[major][]"
                                                       value="{{ $education->major }}" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-12">
                                                <label>School/Institution</label>
                                                <input type="text" class="form-control" name="education[institution][]"
                                                       value="{{ $education->institution }}" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div id="education"></div>
                                    <div class="mb-4">
                                        <button class="btn btn-success w-100" type="button" id="btn_add_education">Add
                                            New Education
                                        </button>
                                    </div>
                                </div>
                                <div class="section-title mt-0">Language Information</div>
                                @foreach($psychologist->languages as $language)
                                    <div class="form-group">
                                        <label>Language</label>
                                        <input type="text" class="form-control" name="language[]"
                                               value="{{ $language->language }}" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                @endforeach
                                <div id="language"></div>
                                <div class="mb-4">
                                    <button class="btn btn-success w-100" type="button" id="btn_add_language">Edit
                                        Language
                                    </button>
                                </div>
                                <div class="section-title mt-0">Schedule Information</div>
                                <div class="form-group">
                                    <div class="selectgroup selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="day[]" value="monday" class="selectgroup-input"
                                                   @if(in_array('monday', $availables)) checked @endif>
                                            <span class="selectgroup-button">Monday</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="day[]" value="tuesday"
                                                   class="selectgroup-input"
                                                   @if(in_array('tuesday', $availables)) checked @endif>
                                            <span class="selectgroup-button">Tuesday</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="day[]" value="wednesday"
                                                   class="selectgroup-input"
                                                   @if(in_array('wednesday', $availables)) checked @endif>
                                            <span class="selectgroup-button">Wednesday</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="day[]" value="thursday"
                                                   class="selectgroup-input"
                                                   @if(in_array('thursday', $availables)) checked @endif>
                                            <span class="selectgroup-button">Thursday</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="day[]" value="friday" class="selectgroup-input"
                                                   @if(in_array('friday', $availables)) checked @endif>
                                            <span class="selectgroup-button">Friday</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="day[]" value="saturday"
                                                   class="selectgroup-input"
                                                   @if(in_array('saturday', $availables)) checked @endif>
                                            <span class="selectgroup-button">Saturday</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" id="day" name="day[]" value="sunday" class="selectgroup-input"
                                                   @if(in_array('sunday', $availables)) checked @endif>
                                            <span class="selectgroup-button">Sunday</span>
                                        </label>
                                    </div>
                                    @error('day')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="section-title mt-0">Counselling Methods</div>
                                <div class="form-group">
                                    <div class="selectgroup selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="methods[]" value="audio-chat"
                                                   class="selectgroup-input" @if(in_array('audio-chat', $methods)) checked @endif>
                                            <span class="selectgroup-button">Audio Chat</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="methods[]" value="text-chat"
                                                   class="selectgroup-input" @if(in_array('text-chat', $methods)) checked @endif>
                                            <span class="selectgroup-button">Text Chat</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" id="methods" name="methods[]" value="video-chat"
                                                   class="selectgroup-input" @if(in_array('video-chat', $methods)) checked @endif>
                                            <span class="selectgroup-button">Video Chat</span>
                                        </label>
                                    </div>
                                    @error('methods')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
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
