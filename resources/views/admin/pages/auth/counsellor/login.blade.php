@extends('layouts.guest')
@section('title', 'Login Admin')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ asset('assets/logo_helpline.png') }}" alt="logo" width="240">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header"><h4>Login Psychologist</h4></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('psychologist.login') }}" class="needs-validation"
                                  novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                           required="" autofocus="" value="{{ old('email') }}">
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                           tabindex="2" required="">
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="timezone" id="timezone">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="simple-footer">
            Managed by Bullyid Indonesia | This website created by <a href="">Arkaya</a>
        </div>
    </section>
@endsection
