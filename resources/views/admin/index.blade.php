@extends('layouts.dashboard')

@section('title', 'Administration')

@section('page_title', 'Administration')

@section('content')
  <div class="row">
    <div class="col-12 col-lg-6 col-xl">
      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h6 class="card-title text-uppercase text-muted mb-2">
                Listings
              </h6>
              <!-- Heading -->
              <span class="h2 mb-0">
                {{ $properties->count() }}
              </span>
            </div>
            <div class="col-auto">
              <!-- Icon -->
              <span class="h2 fe fe-tag text-info mb-0"></span>
            </div>
          </div> <!-- / .row -->
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-6 col-xl">
      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h6 class="card-title text-uppercase text-muted mb-2">
                Users
              </h6>
              <!-- Heading -->
              <span class="h2 mb-0">
                {{ $users->count() }}
              </span>
            </div>
            <div class="col-auto">
              <!-- Icon -->
              <span class="h2 fe fe-users text-primary mb-0"></span>
            </div>
          </div> <!-- / .row -->
        </div>
      </div>
    </div>
  </div> <!-- / .row -->
@endsection
