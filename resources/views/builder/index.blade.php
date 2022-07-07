@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Page Tukang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tukang</li>
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
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahBuilder">Tambah Tukang</a>

                    <!-- Modal Tambah-->
                    <div class="modal fade" id="tambahBuilder" tabindex="-1" aria-labelledby="tambahBuilderLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="tambahBuilderLabel">Tambah Tukang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('builder.store') }}" method="POST">
                                @csrf
                                 <div class="form-group">
                                    <label for="hs_name">Nama Tukang Bangunan</label>
                                    <input type="text" class="form-control" name="hs_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="hs_phone">No Handphone</label>
                                    <input type="number" class="form-control" name="hs_phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="hs_harga">Harga Jasa</label>
                                    <input type="number" class="form-control" name="hs_harga" required>
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
                      <th>Nama Tukang</th>
                      <th>No Handphone</th>
                      <th>Harga Jasa</th>
                      <th>Created</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($builder as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->hs_name }}</td>
                        <td>{{ $row->hs_phone }}</td>
                        <td>{{ number_format($row->hs_harga) }}</td>
                        <td>{{ date("d/m/Y", strtotime($row->hs_create)) }}</td>
                        <td>

                          {{-- Edit --}}
                          <a href="#" class="badge bg-warning" data-toggle="modal" data-target="#editBuilder{{ $row->hs_id }}">ubah</a>

                          <!-- Modal Edit-->
                          <div class="modal fade" id="editBuilder{{ $row->hs_id }}" tabindex="-1" aria-labelledby="editBuilderLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="editBuilderLabel">Ubah Tukang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('builder.update', [$row->hs_id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="hs_name">Nama Tukang Bangunan</label>
                                        <input type="text" class="form-control" name="hs_name" value="{{ $row->hs_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hs_phone">No Handphone</label>
                                        <input type="number" class="form-control" name="hs_phone" value="{{ $row->hs_phone }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hs_harga">Harga Jasa</label>
                                        <input type="number" class="form-control" name="hs_harga" value="{{ $row->hs_harga }}" required>
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
                          <a href="#" class="badge bg-danger ml-2" data-toggle="modal" data-target="#hapusBuilder{{ $row->hs_id }}">delete</a>

                          <!-- Modal Hapus-->
                          <div class="modal fade" id="hapusBuilder{{ $row->hs_id }}" tabindex="-1" aria-labelledby="hapusBuilderLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="hapusBuilderLabel">Hapus Tukang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('builder.destroy',[$row->hs_id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <p>Apakah anda yakin ingin menghapus <strong>{{ $row->hs_name }}</strong> ?</p> 
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