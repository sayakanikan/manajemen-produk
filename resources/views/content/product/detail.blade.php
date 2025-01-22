@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Product Detail</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card p-4">
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-md-4">
              @if (!asset('storage/' . $data->image) || $data->image == null)
                <img src="../../template/images/no-product.png" alt="profile" style="max-width: 100%; max-height: 100%; display:block;">                    
              @else
                <img src="{{ asset('storage/' . $data->image) }}" alt="profile" style="width: 300px; height: 300px; display:block; object-fit:cover">                    
              @endif
            </div>
            <div class="col-md-8 d-flex my-auto">
              <table class="table table-borderless table-responsive">
                <tbody>
                  <tr>
                    <td>Category</td>
                    <td>:</td>
                    <td>{{ $data->category->name }}</td>
                  </tr>
                  <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>{{ $data->name }}</td>
                  </tr>
                  <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td>{{ $data->description }}</td>
                  </tr>
                  <tr>
                    <td>Price</td>
                    <td>:</td>
                    <td>{{ $data->price }}</td>
                  </tr>
                  <tr>
                    <td>Stock</td>
                    <td>:</td>
                    <td>{{ $data->stock_quantity }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="flex">
            <a href="/product" class="btn btn-primary">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection