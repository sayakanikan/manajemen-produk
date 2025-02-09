@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Category</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card p-4">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <div class="grid gap-3">
              <a href="/category/create" class="btn btn-primary btn-sm mb-3 font-weight-bold my-auto"><i class="ti-plus mr-2"></i>Add Category</a>
              <button type="button" class="btn btn-success btn-sm mb-3 font-weight-bold my-auto" data-toggle="modal" data-target="#exportModal"><i class="ti-download mr-2"></i> Export</button>
              <button type="button" class="btn btn-success btn-sm mb-3 font-weight-bold my-auto" data-toggle="modal" data-target="#importModal"><i class="ti-upload mr-2"></i> Import Excel</button>
            </div>
            <form action="/category" method="get">
              <input type="text" name="search" class="form-control" placeholder="Search Category..." aria-label="Search...">
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
                  <th scope="col">Action</th>
                  <th scope="col">Name</th>
                </tr>
              </thead>
              <tbody>
                @if ($data->count() > 0)
                @foreach ($data as $item)
                  <tr>
                    <td>
                      <a href="/category/{{ $item->id }}/edit" class="btn btn-warning btn-sm"><i class="ti-pencil-alt"></i></a>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="handleDelete({{ $item->id }})"><i class="ti-trash"></i></button>
                    </td>
                    <td>{{ $item->name }}</td>
                  </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="2" class="text-center">
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
          <h3 class="text-center text-muted">Are you sure want to delete this category?</h3>
        </div>
        <div class="modal-footer mx-auto mb-4">
          <form id="formDelete" method="POST">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Yes</button>
          </form>
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Export -->
  <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div>
          <button type="button" class="close mt-4 mr-5 justify-content-end " data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex flex-column ">
          <h3 class="text-center text-muted">Export As</h3>
        </div>
        <div class="modal-footer mx-auto mb-4">
          <a href="/category/export/excel" class="btn btn-success">Excel</a>
          <a href="/category/export/csv" class="btn btn-success">CSV</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Import -->
  <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
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
          <h3 class="text-center text-muted">Upload excel to import data Category</h3>
        </div>
        <div class="modal-footer mx-auto mb-4">
          <form id="formImport" method="POST" action="/category/import" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="file" name="file" id="file" accept=".xlsx" class="form-control" required>
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-success mr-2">Import File</button>
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function handleDelete(id){
      document.getElementById('formDelete').action = `/category/${id}`
    }
  </script>
@endsection