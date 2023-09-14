@extends('layouts.app')
@section('title')

تسجيل دخول- برنامج الفواتير
@endsection
@section('content')

<div class="page">

    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ asset('adminassets/assets/img/pngs/account.jpg') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <a href="index.html"><img src="{{ asset('adminassets/assets/img/brand/favicon.png') }}"
                                                class="sign-favicon-a ht-40" alt="logo">
                                            <img src="{{ asset('adminassets/assets/img/brand/favicon-white.png') }}"
                                                class="sign-favicon-b ht-40" alt="logo">
                                        </a>
                                        <h1 class="main-logo1 ms-1 me-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>Welcome Admin!</h2>
                                            <h5 class="fw-semibold mb-4">Please sign in to continue.</h5>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email</label>

                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                </div>
                                                <button type="submit"  class="btn btn-main-primary btn-block">Sign In</button>
                                            </form>
                                            <div class="main-signin-footer mt-1">
                                                <p>
                                                    @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif

                                                @if (Route::has('register'))
                                                <p>Don't have an account? <a href="{{ route('register') }}">Create an  Account</a></p>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>

</div>
@endsection
