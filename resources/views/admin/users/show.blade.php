@extends('layouts.dashboard')

@section('title', 'User data')

@section('page_title', 'User data')

@section('content')
  <div class="row">
    <div class="col-12 pb-5 mb-5">
      <div class="card">
        <div class="card-body">
          <table class="table">
            <tr>
              <th scope="row">Name</th>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <th scope="row">Email</th>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <th scope="row">Phone</th>
              <td>{{ $user->phone }}</td>
            </tr>
            <tr>
              <th scope="row">Address</th>
              <td>{{ $user->address }}</td>
            </tr>
            <tr>
              <th scope="row">Occupation</th>
              <td>{{ $user->occupation }}</td>
            </tr>
          </table>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Rented Properties</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive-sm">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Property</th>
                  <th scope="col">Type</th>
                  <th scope="col">Rental Expiry</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($user->properties as $property)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->type }}</td>
                    <td>{{ date('Y-m-d', strtotime($property->tenancy_expires_at)) }}</td>
                    <td>
                      <a href="{{ route('admin.users.teminate_tenancy', ['id' => $user->id, 'propertyId' => $property->id]) }}" class="btn btn-danger btn-sm">Terminate tenancy</a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" class="text-center">User has not rented any property</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Properties of Interest</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive-sm">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Property</th>
                  <th scope="col">Type</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($user->interests as $property)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->type }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" class="text-center">No interests</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-block btn-lg">
          DELETE USER
        </button>
      </form>
    </div>
  </div>
@endsection
