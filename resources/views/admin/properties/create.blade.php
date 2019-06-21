@extends('layouts.dashboard')

@section('title', 'Add Property')

@section('page_title', 'Add Property')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" placeholder="Title" class="form-control" id="title">
            </div>

            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" name="price" placeholder="2000" id="price" class="form-control">
            </div>

            <div class="form-group">
              <label for="image1">Image</label>
              <input type="file" name="image1" id="image1" accept="image/*" class="form-control">
            </div>

            <div class="form-group">
              <label for="image2">Image (Optional)</label>
              <input type="file" name="image2" id="image2" accept="image/*" class="form-control">
            </div>

            <div class="form-group">
              <label for="image3">Image (Optional)</label>
              <input type="file" name="image3" id="image3" accept="image/*" class="form-control">
            </div>

            <div class="form-group">
              <label for="type">Type</label>
              <select name="type" id="type" class="custom-select">
                <option value="">Choose type</option>
                <option value="bungalow">Bungalow</option>
                <option value="flat">Flat</option>
                <option value="self_contained">Self Contained</option>
                <option value="storey_building">Storey Building</option>
                <option value="duplex">Duplex</option>
                <option value="office_space">Office Space</option>
                <option value="event_centre">Event Centre</option>
              </select>
            </div>

            <div class="form-group">
              <label for="address">Location</label>
              <input type="text" name="address" placeholder="Lekki" class="form-control" id="address">
            </div>

            <div class="form-group">
              <label for="summary">Summary</label>
              <textarea name="summary" id="summary" rows="6" class="form-control" placeholder="Write something about the property..."></textarea>
            </div>

            <div class="form-group">
              <label for="availability">Availability</label>
              <select name="availability" id="availability" class="custom-select">
                <option value="1">Available</option>
                <option value="0">Rented Out</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
