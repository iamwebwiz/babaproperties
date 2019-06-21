@extends('layouts.dashboard')

@section('title', 'Properties')

@section('page_title', 'Properties')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">Add Property</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Type</th>
                  <th scope="col">Price</th>
                  <th scope="col">Availability</th>
                  <th scope="col">Added On</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($properties as $property)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->type }}</td>
                    <td>{{ number_format($property->price) }}</td>
                    <td>
                      {!! $property->available
                        ? "<span class='badge badge-success'>Available</span>"
                        : "<span class='badge badge-secondary'>Rented Out</span>" !!}
                    </td>
                    <td>{{ $property->created_at->toDateString() }}</td>
                    <td>
                      <a href="{{ route('admin.properties.show', $property->id) }}" class="btn btn-primary btn-sm">
                        View
                      </a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center">No property yet.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          {{ $properties->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
