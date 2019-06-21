@extends('layouts.single_property')

@section('content')
  <div
    class="site-blocks-cover overlay"
    style="background-image: url(/images/hero_bg_2.jpg);"
    data-aos="fade"
    data-stellar-background-ratio="0.5"
  >
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <h1 class="mb-2">{{ $property->title }}</h1>
          <p class="mb-5">
            <strong class="h2 text-success font-weight-bold">&#8358;{{ $property->price }}</strong>
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm">
    <div class="container">
      <div class="row">
        <div class="col-lg-8" style="margin-top: -150px;">
          <div class="mb-5">
            <div class="slide-one-item home-slider owl-carousel">
              <div>
                <img src="/images/properties/{{ $property->image1 }}" alt="{{ $property->title }}" class="img-fluid">
              </div>
              @if ($property->image2)
                <div>
                  <img src="/images/properties/{{ $property->image2 }}" alt="{{ $property->title }}" class="img-fluid">
                </div>
              @endif
              @if ($property->image3)
                <div>
                  <img src="/images/properties/{{ $property->image3 }}" alt="{{ $property->title }}" class="img-fluid">
                </div>
              @endif
            </div>
          </div>
          <div class="bg-white">
            <div class="row mb-5">
              <div class="col-md-6">
                <strong class="text-success h1 mb-3">&#8358;{{ $property->price }}</strong>
              </div>
              <div class="col-md-6">
                <ul class="property-specs-wrap mb-3 mb-lg-0 float-lg-right">
                  <li>
                    <span class="property-specs">Location</span>
                    <span class="property-specs-number">{{ $property->address }}</span>
                  </li>
                  <li>
                    <span class="property-specs">Interests</span>
                    <span
                      class="property-specs-number"
                    >{{ $property->interests ? $property->interests->count() : '' }}</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6 text-left border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                <strong class="d-block">{{ $property->type }}</strong>
              </div>
              <div class="col-md-6 text-left border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Uploaded On</span>
                <strong class="d-block">{{ $property->created_at->toDateString() }}</strong>
              </div>
            </div>
            <h2 class="h4 text-black">Summary</h2>
            <p>{{ $property->summary }}</p>

            <div class="row mt-5">
              <div class="col-12">
                <h2 class="h4 text-black mb-3">Property Gallery</h2>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <a href="/images/properties/{{ $property->image1 }}" class="image-popup gal-item">
                  <img src="/images/properties/{{ $property->image1 }}" alt="{{ $property->title }}" class="img-fluid">
                </a>
              </div>
              @if ($property->image2)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="/images/properties/{{ $property->image2 }}" class="image-popup gal-item">
                    <img src="/images/properties/{{ $property->image2 }}" alt="{{ $property->title }}" class="img-fluid">
                  </a>
                </div>
              @endif
              @if ($property->image3)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="/images/properties/{{ $property->image3 }}" class="image-popup gal-item">
                    <img src="/images/properties/{{ $property->image3 }}" alt="{{ $property->title }}" class="img-fluid">
                  </a>
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="col-lg-4 pl-md-5">
          <div class="bg-white widget border rounded">
            <h3 class="h4 text-black widget-title mb-3">Indicate Interest</h3>
            <form action="{{ route('user.indicate_interest', $property->id) }}" method="post" class="form-contact-agent">
              @csrf
              <button class="btn btn-primary">Apply</button>
            </form>
          </div>

          <div class="bg-white widget border rounded">
            <h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
            <p>{{ $property->summary }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
