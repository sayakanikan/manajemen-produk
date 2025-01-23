@extends('layouts/main')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h3 class="font-weight-bold">Dashboard</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin transparent">
    <div class="row">
      <div class="col-lg-6 stretch-card transparent">
        <div class="card card-tale mr-4">
          <div class="card-body">
            <p class="mb-4">Our Products</p>
            <p class="fs-30 mb-2"> {{ $product }}</p>
          </div>
        </div>
        <div class="card card-dark-blue mr-4">
          <div class="card-body">
            <p class="mb-4">Category Products</p>
            <p class="fs-30 mb-2"> {{ $category }}</p>
          </div>
        </div>
        <div class="card card-light-blue mr-4">
          <div class="card-body">
            <p class="mb-4">Shop Purchases</p>
            <p class="fs-30 mb-2"> {{ $purchase }}</p>
          </div>
        </div>
        <div class="card card-light-danger">
          <div class="card-body">
            <p class="mb-4">Product Out of Stocks</p>
            <p class="fs-30 mb-2"> {{ $stock }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection