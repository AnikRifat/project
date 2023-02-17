@extends('auth.layouts.app')

@section('content')
<div class="form-body without-side">
    <div class="website-logo">
        <a href="{{route('admin.index')}}">
            <div class="logo">
                <img class="logo-size" src="{{ asset('/assets/auth') }}/images/logo-light.svg" alt="">
            </div>
        </a>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img src="{{ asset('/assets/auth') }}/images/graphic8.svg" alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <div class="form-icon">
                        <div class="icon-holder"><img src="{{ asset('/assets/auth') }}/images/icon1.svg" alt="">
                        </div>
                    </div>
                    <h3 class="form-title-center">Sign up and get access to the full guide right now</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                          name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                          placeholder="Enter Name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                          name="email" value="{{ old('email') }}" required autocomplete="email"
                          placeholder="Enter Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror




                        <input id="password" type="password"
                          class="form-control @error('password') is-invalid @enderror" name="password" required
                          autocomplete="new-password" placeholder="Enter Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror



                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                          required autocomplete="new-password" placeholder="Retype Password">




                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection