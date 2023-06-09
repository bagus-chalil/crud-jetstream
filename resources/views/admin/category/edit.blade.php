@extends('layouts.admin.app', ['title' => 'Kategori'])

@section('content')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
          <div class="card w-100">
            <div class="card-body">
              <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                <div class="mb-3 mb-sm-0">
                  <h5 class="card-title fw-semibold">Tabel Kategori</h5>
                </div>
              </div>
              <form action="{{ url('category', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
            
                <div class="m-2">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update Kategori</button>
            

            </form>
            
            </div>
          </div>
        </div>
    </div>
      
@endsection