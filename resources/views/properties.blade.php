@extends('layouts.dashboard')

@section('title', 'My Properties')

@section('page_title', 'My Properties')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive-md">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Property</th>
                  <th scope="col">Location</th>
                  <th scope="col">Price</th>
                  <th scope="col">Rent Due At</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($properties as $property)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->address }}</td>
                    <td>{{ $property->price }}</td>
                    <td>{{ date('Y-m-d', strtotime($property->tenancy_expires_at)) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
