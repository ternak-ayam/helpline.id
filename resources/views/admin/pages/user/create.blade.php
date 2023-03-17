@extends('layouts.admin')

@section('title', 'Add New User')

@section('css')

@endsection

@section('js')

@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Add New User</h1>
        </x-slot>
        <div>
            <form action="{{ route('admin.user.store') }}" enctype="multipart/form-data" method="post"
                  class="needs-validation" novalidate onkeydown="return event.key !== 'Enter';">
                @csrf
                <div class="my-1">
                    <div class="card">
                        <div class="card-header">
                            <h4>User Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="section-title mt-0">Basic Information</div>
                            <div class="form-group">
                                <div class="my-2">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="my-2">
                                    <label for="name">UNHCR Number</label>
                                    <input type="text" name="unhcr_number" id="unhcr_number" class="form-control" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="my-2">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="my-2">
                                    <label for="city">City</label>
                                    <select class="form-control" id="city" name="city">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->name }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="my-2">
                                    <label for="country">Country</label>
                                    <select class="form-control" id="country" name="country">
                                        @foreach($countries as $country)
                                            <option value="{{ $country['name'] }}">{{ $country['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="my-2">
                                    <label for="birthdate">Birthdate</label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="my-2">
                                    <label for="sex">Sex</label>
                                    <select class="form-control" id="sex" name="sex">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Prefer not to say</option>
                                    </select>
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
            </form>
        </div>
    </x-content>

@endsection
