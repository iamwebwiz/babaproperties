<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real estates for rent at low prices">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="/assets/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="/assets/libs/select2/dist/css/select2.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/css/theme.min.css" id="stylesheetLight">

    <title>@yield('title') - {{ config('app.name') }}</title>
  </head>
  <body>
    <!-- NAVIGATION
    ================================================== -->

    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
      <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="index-2.html">
          <img src="/assets/img/logo.svg" class="navbar-brand-img mx-auto" alt="{{ config('app.name') }}">
        </a>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">

          @include('partials.sidebar')

          <!-- Push content down -->
          <div class="mt-auto"></div>

        </div> <!-- / .navbar-collapse -->

      </div>
    </nav>

    <!-- MAIN CONTENT
    ================================================== -->
    <div class="main-content">
      <!-- HEADER -->
      <div class="header">
        <div class="container-fluid">
          <!-- Body -->
          <div class="header-body">
            <div class="row align-items-end">
              <div class="col">
                <!-- Title -->
                <h1 class="header-title">
                  @yield('page_title')
                </h1>
              </div>
            </div> <!-- / .row -->
          </div> <!-- / .header-body -->

        </div>
      </div> <!-- / .header -->

      <div class="container-fluid">
        @include('partials.alerts')
        @yield('content')
      </div>

    </div> <!-- / .main-content -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="/assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="/assets/libs/chart.js/Chart.extension.min.js"></script>

    <!-- Theme JS -->
    <script src="/assets/js/theme.min.js"></script>

    @yield('scripts')

  </body>
</html>
