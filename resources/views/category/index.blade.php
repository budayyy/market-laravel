@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Page Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- alert --}}
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahCategory">Tambah Category</a>

                    <!-- Modal Tambah-->
                    <div class="modal fade" id="tambahCategory" tabindex="-1" aria-labelledby="tambahCategoryLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="tambahCategoryLabel">Tambah Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="ctg_name">Nama Category</label>
                                    <input type="text" class="form-control" id="ctg_name" name="ctg_name" required>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                              </form>
                            </div>
                        </div>
                        </div>
                    </div>

                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="dataTable" class="table table-striped table-hover">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Category</th>
                      <th>Created</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($category as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->ctg_name }}</td>
                        <td>{{ date("d/m/Y", strtotime($row->ctg_create)) }}</td>
                        <td>

                          {{-- Edit --}}
                          <a href="#" class="badge bg-warning" data-toggle="modal" data-target="#editCategory{{ $row->ctg_id }}">ubah</a>

                          <!-- Modal Edit-->
                          <div class="modal fade" id="editCategory{{ $row->ctg_id }}" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="editCategoryLabel">Ubah Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('category.update', [$row->ctg_id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="ctg_id">ID Category</label>
                                        <input type="text" class="form-control" id="ctg_id" name="ctg_id" value="{{ $row->ctg_id }}" disabled>
                                    </div>  
                                    <div class="form-group">
                                        <label for="ctg_name">Nama Category</label>
                                        <input type="text" class="form-control" id="ctg_name" name="ctg_name" value="{{ $row->ctg_name }}">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                  </form>
                                </div>
                            </div>
                            </div>
                        </div>

                          {{-- Hapus --}}
                          <a href="#" class="badge bg-danger ml-2" data-toggle="modal" data-target="#hapusCategory{{ $row->ctg_id }}">delete</a>

                          <!-- Modal Hapus-->
                          <div class="modal fade" id="hapusCategory{{ $row->ctg_id }}" tabindex="-1" aria-labelledby="hapusCategoryLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="hapusCategoryLabel">Hapus Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('category.destroy',[$row->ctg_id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <p>Apakah anda yakin ingin menghapus <strong>{{ $row->ctg_name }}</strong> ?</p> 
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Hapus Data</button>
                                  </form>
                                </div>
                            </div>
                            </div>
                        </div>

                        </td>
                      </tr>
                      @endforeach
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection