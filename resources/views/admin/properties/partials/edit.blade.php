<div class="modal fade" id="editPropertyModal" tabindex="-1" role="dialog" aria-labelledby="editPropertyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPropertyModalLabel">Edit Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.properties.update', $property->id) }}" method="post">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Title" value="{{ $property->title }}" class="form-control" id="title">
          </div>

          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" placeholder="2000" value="{{ $property->price }}" id="price" class="form-control">
          </div>

          <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="custom-select">
              <option value="">Choose type</option>
              <option value="bungalow" {{ $property->type == 'bungalow' ? 'selected' : '' }}>Bungalow</option>
              <option value="flat" {{ $property->type == 'flat' ? 'selected' : '' }}>Flat</option>
              <option value="self_contained" {{ $property->type == 'self_contained' ? 'selected' : '' }}>Self Contained</option>
              <option value="storey_building" {{ $property->type == 'storey_building' ? 'selected' : '' }}>Storey Building</option>
              <option value="duplex" {{ $property->type == 'duplex' ? 'selected' : '' }}>Duplex</option>
              <option value="office_space" {{ $property->type == 'office_space' ? 'selected' : '' }}>Office Space</option>
              <option value="event_centre" {{ $property->type == 'event_centre' ? 'selected' : '' }}>Event Centre</option>
            </select>
          </div>

          <div class="form-group">
            <label for="address">Location</label>
            <input type="text" name="address" placeholder="Lekki" value="{{ $property->address }}" class="form-control" id="address">
          </div>

          <div class="form-group">
            <label for="summary">Summary</label>
            <textarea name="summary" id="summary" rows="6" class="form-control">{{ $property->summary }}</textarea>
          </div>

          <div class="form-group">
            <label for="availability">Availability</label>
            <select name="availability" id="availability" class="custom-select">
              <option value="1" {{ $property->available == 1 ? 'selected' : '' }}>Available</option>
              <option value="0" {{ $property->available == 0 ? 'selected' : '' }}>Rented Out</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
