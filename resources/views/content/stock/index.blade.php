@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Monitoring Stock</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card p-4">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <form action="/stock" method="get">
              <input type="text" name="search" class="form-control" placeholder="Search Product..." aria-label="Search...">
            </form>
          </div>
          @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="d-flex">
              <svg aria-hidden="true" class="ml-2 mt-1" style="width: 25px; height: 25px;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
              <p class="ml-2 mt-2 font-weight-bold">{{ session('success') }}</p>
            </div>
            <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
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
          <div class="table-responsive">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Change</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                @if ($data->count() > 0)
                  @foreach ($data as $item)
                    <tr>
                      <td>{{ $item->product->name }}</td>
                      <td>{{ $item->quantity }}</td>
                      <td>{{ $item->change_type }}</td>
                      <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6" class="text-center">
                      No data available.
                    </td>
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