@extends('layouts.frontend_asset')
@section('css_link')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/cart.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/cart_responsive.css') }}">
@endsection
@section('frontend_content')
  <div class="home">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('frontend_assets/images/product_background.jpg') }}" data-speed="0.8"></div>
    <div class="home_container">
      <div class="home_content">
        <div class="home_title" style="font-size:40px">Customer Register</div>
        <div class="breadcrumbs">
          <ul class="d-flex flex-row align-items-center justify-content-start">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Customer Register</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
  <div class="container" style="margin:150px  0px">
      <div class="row justify-content-center">
          <div class="col-md-8">
            @if (session('add'))
              <div class="alert alert-success">
                {{ session('add') }}
              </div>              
            @endif
              <div class="card">
                  <div class="card-header">{{ __('Customer Register') }}</div>

                  <div class="card-body">
                      <form method="POST" action="{{ url('customer/register/post') }}">
                          @csrf

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              </div>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Register') }}
                                  </button>

                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </body>
  </html>

@endsection
@section('js_link')
<script src="{{ asset('frontend_assets/js/cart.js') }}"></script>
@endsection
