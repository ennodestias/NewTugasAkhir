@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-right">
        <div class="col-md-6"style="height:100%; display: flex;
        margin-top:150px; align-items:center; vertical-align:middle">
            <img class="img-responsive center-block" style="height:350px;width:500px"
            src="{{ asset('lte/dist/img/welcome.png') }}">
        </div>
        <div class="col-md-6">
            <div class="card" style="margin-top:50px;">
                <div class="card-header" style="background-color:#FFFFFF" >
                    <p align="center">
                        <img class="img-responsive center-block" style="height:100px;"
                        src="{{ asset('lte/dist/img/logo.png') }}">
                        <h3 align="center" style="color:#147CBE;"><b>POSCU</b></h3>
                    </p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                            {{ __('Username') }}
                            </label>
                            <div class="col-md-6">
                                <input id="email" type="username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
