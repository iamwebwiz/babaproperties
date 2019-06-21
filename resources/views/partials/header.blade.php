<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/css/mediaelementplayer.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="/css/fl-bigmug-line.css">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>

    <div class="site-loader"></div>

    <div class="site-wrap">
      <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div> <!-- .site-mobile-menu -->

      <div class="site-navbar">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class=""><a href="{{ url('/') }}" class="h5 text-uppercase text-black"><strong>{{ config('app.name') }}<span class="text-danger">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li>
                    <a href="{{ url('/') }}">Home</a>
                  </li>
                  <li><a href="#">About</a></li>
                  <li><a href="#">Contact</a></li>
                  @if (auth()->check())
                    @if (auth()->user()->is_admin)
                      <li><a href="{{ route('admin.dashboard') }}">Administration</a></li>
                    @else
                      <li><a href="{{ route('home') }}">Dashboard</a></li>
                    @endif
                  @else
                    <li><a href="{{ url('/register') }}">Sign up</a></li>
                    <li><a href="{{ url('/login') }}">Sign in</a></li>
                  @endif
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
