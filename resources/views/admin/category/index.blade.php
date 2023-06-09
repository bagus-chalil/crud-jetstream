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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalKategori">
                    Tambah Data
                </button>
              </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">update at</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data['category'] as $ctg)
                        <tr>
                          <th scope="row">1</th>
                          <td>{{ $ctg->name }}</td>
                          <td>{{ $ctg->created_at }}</td>
                          <td>
                            <a href="{{url('category',$ctg->id)}}" class="btn btn-warning">Edit</a>
                             <form action="{{ url('category', $ctg->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                          </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
      
<!-- Modal -->
<div class="modal fade" id="ModalKategori" tabindex="-1" aria-labelledby="ModalKategori" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{url('category/insert')}}" method="post">
        @csrf
            <label for="">Nama</label>
            <input type="text" class="form-control mt-1" name="name">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
</div>
@endsection