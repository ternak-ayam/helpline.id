@extends('layouts.admin')

@section('title', 'Edit Translator')

@section('css')

@endsection

@section('js')
    <script>
        const imageDisplayElement = document.getElementById("imageDisplay");
        const imageInputElement = document.getElementById("image");

        const btnAddTimes = document.querySelectorAll(".btn_add_time");

        const initBtnAddTimes = () => {
            const btnRemoveTimes = document.querySelectorAll(".btn_remove_time");
            btnRemoveTimes.forEach((btnRemoveTime) => {
                btnRemoveTime.addEventListener("click", (e) => {
                    let day = e.target.name;
                    const timeFieldElement = document.getElementById("timeField" + day);

                    timeFieldElement.remove();
                })
            });
        }

        btnAddTimes.forEach((btnAddTime, key) => {
            btnAddTime.addEventListener("click", (e) => {
                let day = e.target.name;

                let scheduleContent = `
                                                <div class="row" id="timeField${key + 3}">
                                                    <div class="col-5">
                                                    <div class="form-group mb-2">
                                                        <label for="inputState">Start At</label>
                                                        <input type="time" name="start_at[${day}][]" class="form-control">
                                                        </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="form-group mb-2">
                                                                <label for="inputState">End At</label>
                                                                <input type="time" name="end_at[${day}][]" class="form-control">
                                                                </div>
                                                                </div>
                                                                      <div class="col-2 my-auto pt-4 pl-1">
                                                    <button class="btn btn-danger btn_remove_time w-100" name="${key + 3}" type="button">-</button>
                                                </div>
                                                                </div>
                                                                `;
                const timeContainer = document.getElementById("timeContainer" + day);
                timeContainer.insertAdjacentHTML('beforeend', scheduleContent);

                initBtnAddTimes();


            });
        });


        initBtnAddTimes();

    </script>
@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Edit Translator</h1>
        </x-slot>
        <div>
            <form action="{{ route('admin.user.translator.update', $translator->id) }}"
                  enctype="multipart/form-data" method="post"
                  class="needs-validation" novalidate onkeydown="return event.key !== 'Enter';">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 col-sm-12 my-1">
                        <div class="card">
                            <div class="card-header">
                                <h4>Translator Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="section-title mt-0">Basic Information</div>
                                <div class="form-group">
                                    <div class="my-2">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $translator->name }}" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="my-2">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ $translator->email }}" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="my-2">
                                        <label for="language">Language</label>
                                        <input type="text" name="language" id="language" class="form-control" value="{{ $translator->language }}" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="my-2">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="my-2">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                               class="form-control" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                                @foreach($days as $day)
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label>Day</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="customCheck1{{ $day['day'] }}"
                                                       name="day[{{ Str::lower($day['day']) }}]"
                                                       @if($day['is_checked']) checked @endif>
                                                <label class="custom-control-label"
                                                       for="customCheck1{{ $day['day'] }}">{{ $day['day'] }}</label>
                                            </div>
                                        </div>

                                        <div class="col-8 mt-4">
                                            <div id="timeContainer{{ Str::lower($day['day']) }}">
                                                @foreach(json_decode($day['start_at'], true) ?? [''] as $key => $time)
                                                    <div class="row" id="timeField{{ $key }}">
                                                        <div class="col-5 pr-1">
                                                            <div class="form-group mb-2">
                                                                <label for="inputState">Start At</label>
                                                                <input type="time"
                                                                       name="start_at[{{ Str::lower($day['day'])}}][]"
                                                                       class="form-control" value="{{ $time ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-5 px-1">
                                                            <div class="form-group mb-2">
                                                                <label for="inputState">End At</label>
                                                                <input type="time"
                                                                       name="end_at[{{ Str::lower($day['day'])}}][]"
                                                                       class="form-control"
                                                                       value="{{ isset(json_decode($day['end_at'], true)[$key]) ? json_decode($day['end_at'], true)[$key] : null }}">
                                                            </div>
                                                        </div>
                                                        @if($loop->index != 0)
                                                            <div class="col-2 my-auto pt-4 pl-1">
                                                                <button class="btn btn-danger btn_remove_time w-100"
                                                                        name="{{ $key }}" type="button">-
                                                                </button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="btn btn-success w-100 btn_add_time"
                                                    id="btnAddTime{{ Str::lower($day['day']) }}"
                                                    name="{{ Str::lower($day['day']) }}" type="button">Add New Time
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
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
