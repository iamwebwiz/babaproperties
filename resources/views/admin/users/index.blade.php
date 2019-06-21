@extends('layouts.dashboard')

@section('title', 'Users')

@section('page_title', 'Users')

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
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Occupation</th>
                  <th scope="col">Properties</th>
                  <th scope="col">Joined On</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $user)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?: 'No Phone' }}</td>
                    <td>{{ $user->occupation }}</td>
                    <td>{{ $user->properties->count() }}</td>
                    <td>{{ $user->created_at->toDateString() }}</td>
                    <td>
                      <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary btn-sm">View</a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center">No users yet.</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
