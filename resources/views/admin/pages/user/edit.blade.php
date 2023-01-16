@extends('layouts.admin')

@section('title', 'Edit User')

@section('css')

@endsection

@section('js')

@endsection

@section('content')

    <x-content>
        <x-slot name="modul">
            <h1>Edit User</h1>
        </x-slot>
        <div>
            <form action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data" method="post"
                  class="needs-validation" novalidate onkeydown="return event.key !== 'Enter';">
                @csrf
                @method('PUT')
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
                                    <input type="text" name="unhcr_number" id="unhcr_number" class="form-control" disabled value="{{ $user->unhcr_number }}" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="my-2">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="my-2">
                                    <label for="country">Country</label>
                                    <select class="form-control" id="country" name="country">
                                        @foreach($countries as $country)
                                            <option value="{{ $country['name'] }}" @if($user->country === $country['name']) selected @endif>{{ $country['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="my-2">
                                    <label for="birthdate">Birthdate</label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ $user->birthdate->format('Y-m-d') }}" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="my-2">
                                    <label for="sex">Sex</label>
                                    <select class="form-control" id="sex" name="sex">
                                        <option @if($user->sex === "male") selected @endif value="male">Male</option>
                                        <option @if($user->sex === "female") selected @endif value="female">Female</option>
                                        <option @if($user->sex === "others") selected @endif value="others">Prefer not to say</option>
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
