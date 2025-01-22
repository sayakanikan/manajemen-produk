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
  @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <div class="d-flex">
        <svg aria-hidden="true" class="ml-2 mt-1" style="width: 25px; height: 25px;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <p class="ml-2 mt-2 font-weight-bold">{{ session('error') }}</p>
      </div>
      <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card p-4">
        <div class="card-body">
          @if ($data == null)
          <form method="POST" action="/product" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="category_id">Category <span class="text-danger">*</span></label>
              <select id="category_id" name="category_id" class="form-control" required>
                <option selected hidden disabled>--Select Category--</option>
                @foreach ($category as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="name">Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6">{{ old('description') }}</textarea>
              @error('description')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="price">Price <span class="text-danger">*</span></label>
              <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required value="{{ old('price') }}">
              @error('price')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="stock_quantity">Stock <span class="text-danger">*</span></label>
              <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" id="stock_quantity" name="stock_quantity" required value="{{ old('stock_quantity') }}">
              @error('stock_quantity')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" accept=".jpg, .jpeg, .png">
              @error('image')
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
          <form method="POST" action="/product/{{ $data->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
              <label for="category_id">Category <span class="text-danger">*</span></label>
              <select id="category_id" name="category_id" class="form-control" required>
                <option selected hidden value="{{ $data->category_id }}">{{ $data->category->name }}</option>
                @foreach ($category as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="name">Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $data->name) }}" required>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6">{{ old('description', $data->description) }}</textarea>
              @error('description')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="price">Price <span class="text-danger">*</span></label>
              <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required value="{{ old('price', $data->price) }}">
              @error('price')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="stock_quantity">Stock <span class="text-danger">*</span></label>
              <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" id="stock_quantity" name="stock_quantity" required value="{{ old('stock_quantity', $data->stock_quantity) }}">
              @error('stock_quantity')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $data->image) }}" accept=".jpg, .jpeg, .png">
              @error('image')
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