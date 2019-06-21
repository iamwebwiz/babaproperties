@extends('layouts.dashboard')

@section('title', 'View Property')

@section('page_title', 'View Property')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">{{ $property->title }}</h2>
        </div>
        <div class="card-body pb-5">
          <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-sm-8">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  @if ($property->image2)
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  @endif
                  @if ($property->image3)
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  @endif
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/images/properties/{{ $property->image1 }}" class="d-block w-100" alt="{{ $property->title }}">
                  </div>
                  @if ($property->image2)
                    <div class="carousel-item">
                      <img src="/images/properties/{{ $property->image2 }}" class="d-block w-100" alt="{{ $property->title }}">
                    </div>
                  @endif
                  @if ($property->image2)
                    <div class="carousel-item">
                      <img src="/images/properties/{{ $property->image3 }}" class="d-block w-100" alt="{{ $property->title }}">
                    </div>
                  @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-12">
              <h2>
                <span class="float-left">&#8358;{{ number_format($property->price) }}</span>
                <span class="float-right">
                  {!! $property->available
                    ? "<span class='badge badge-success'>Available</span>"
                    : "<span class='badge badge-danger'>Rented Out</span>" !!}
                </span>
                <div class="clearfix"></div>
              </h2>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-12">
              <p><i class="fe fe-map-pin"></i> &nbsp; {{ $property->address }}</p>
              <hr>
              <p>{{ $property->summary }}</p>
              <hr>
              <h2 class="text-primary">Interested Applicants</h2>
              <hr>
              <ul class="list-group">
                @forelse ($property->applicants as $applicant)
                  <li class="list-group-item list-group-item-action mb-2">
                    <div class="d-flex w-100 justify-content-between">
                      <h4 class="mb-1">{{ $applicant->name }}</h4>
                      <small class="text-muted">{{ $applicant->pivot['created_at']->diffForHumans() }}</small>
                    </div>
                    <hr>
                    <p class="mb-1">
                      <i class="fe fe-phone"></i> &nbsp; {{ $applicant->phone }}
                      <br>
                      <i class="fe fe-briefcase"></i> &nbsp; {{ $applicant->occupation }}
                    </p>
                    <hr>
                    <div class="d-block d-sm-none">
                      <a href="{{ route('admin.properties.interests.approve', ['id' => $property->id, 'userId' => $applicant->id]) }}" class="btn btn-success btn-block">Approve</a>
                      <a href="{{ route('admin.properties.interests.decline', ['userId' => $applicant->id, 'propertyId' => $property->id]) }}" class="btn btn-danger btn-block">Decline</a>
                    </div>
                    <div class="d-none d-sm-block">
                      <a href="{{ route('admin.properties.interests.approve', ['id' => $property->id, 'userId' => $applicant->id]) }}" class="btn btn-success">Approve</a>
                      <a href="{{ route('admin.properties.interests.decline', ['userId' => $applicant->id, 'propertyId' => $property->id]) }}" class="btn btn-danger">Decline</a>
                    </div>
                  </li>
                @empty
                  <p>No one has indicated interest on this property</p>
                @endforelse
              </ul>
            </div>
          </div>

          <hr>
          <div class="row">
            <div class="col-12">
              <button class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#editPropertyModal">EDIT PROPERTY</button>
              <form action="{{ route('admin.properties.destroy', $property->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-block btn-lg">REMOVE PROPERTY</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('admin.properties.partials.edit')
@endsection
