@extends('layouts/main')

@section('content')
  <div class="row mb-4">
    <div class="col-md-12 d-flex justify-content-between align-items-center">
      <h3 class="font-weight-bold">Shop Our Products</h3>
      <form action="/shop" method="get">
        <input type="text" name="search" class="form-control" placeholder="Search Product..." aria-label="Search...">
      </form>
    </div>
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
  <div class="row">
    @foreach ($product as $item)
      <div class="col-md-3 mb-3">
        <div class="card">
          @if (!asset('storage/' . $item->image) || $item->image == null)
            <img src="../../template/images/no-product.png" alt="profile" style="max-width: 100%; max-height: 100%; display:block; object-fit:contain">
          @else
            <img src="{{ asset('storage/' . $item->image) }}" alt="profile" style="width: 300px; height: 300px; max-height: 100%; max-width: 100%; display:block; object-fit:contain">
          @endif
          <div class="bg-warning text-center">
            <p class="mt-2 fw-bold">{{ $item->category->name }}</p>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">${{ number_format($item->price, 2, '.', ',') }}</p>
            </div>
            <p class="card-text">{{ $item->description }}</p>
            <div class="flex justify-content-between">
              @if($item->stock_quantity == 0)
                <button type="button" disabled class="btn btn-secondary"><i class="ti-na"></i> Out of stock</button>
              @else
                <input type="number" value="1" min="1" id="input_quantity_{{ $item->id }}">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="handleBuy({{ $item->id }})"><i class="ti-shopping-cart-full"></i> Buy Now</button>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div>
          <button type="button" class="close mt-4 mr-5 justify-content-end " data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex flex-column ">
          <img src="../../template/images/warning.png" width="90px" class="mx-auto" alt="warning">
          <br>
          <h3 class="text-center text-muted">Are you sure want to purchase this product?</h3>
        </div>
        <div class="modal-footer mx-auto mb-4">
          <form id="formBuy" method="POST">
            @csrf
            <input type="hidden" name="quantity" id="quantity">
            <button type="submit" class="btn btn-primary">Yes</button>
          </form>
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    function handleBuy(id){
      var quantityInput = document.getElementById(`input_quantity_${id}`);
      var quantity = quantityInput.value;
      if (quantity <= 0 || quantity === '') {
        alert('Quantity must be at least 1.');
        return;
      }
      document.getElementById('quantity').value = quantity;
      document.getElementById('formBuy').action = `/buy-product/${id}`
    }
  </script>
@endsection