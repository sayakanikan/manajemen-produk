@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">
            @if ($data == null)
              Add Product
            @else
              Edit Product
            @endif
          </h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card p-4">
        <div class="card-body">
          @if ($data == null)
          <form method="POST" action="/product">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required value="{{ old('price') }}">
              @error('price')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mt-3">
              <a href="/product" class="btn btn-primary">Back</a>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
          @else
          <form method="POST" action="/product/{{ $data->id }}">
            @method('put')
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $data->name) }}" required>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required value="{{ old('name', $data->price) }}">
              @error('price')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mt-3">
              <a href="/product" class="btn btn-primary">Back</a>
              <button type="submit" class="btn btn-warning">Update</button>
            </div>
          </form>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection