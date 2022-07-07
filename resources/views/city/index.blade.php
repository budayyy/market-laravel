@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Page City & Province</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">City & Province</li>
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
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahCity">Tambah City & Province</a>

                        <!-- Modal Tambah-->
                        <div class="modal fade" id="tambahCity" tabindex="-1" aria-labelledby="tambahCityLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="tambahCityLabel">Tambah City & Province</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('city.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="prv_name">Nama Provinsi</label>
                                        <select class="form-control" name="prv_id">
                                            @foreach ($province as $row)
                                            <option value="{{ $row->prv_id }}">{{ $row->prv_name }}</option> 
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="cty_name">Nama Kota / Kabupaten</label>
                                        <input type="text" class="form-control" id="cty_name" name="cty_name">
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
                      <th>Nama Provinsi</th>
                      <th>Nama Kota & Kabupaten</th>
                      <th>Created</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($city as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->prv_name }}</td>
                        <td>{{ $row->cty_name }}</td>
                        <td>{{ date("d/m/Y", strtotime($row->cty_create)) }}</td>
                        <td>

                          {{-- Edit --}}
                          <a href="#" class="badge bg-warning" data-toggle="modal" data-target="#editCity{{ $row->cty_id }}">ubah</a>

                          <!-- Modal Edit-->
                          <div class="modal fade" id="editCity{{ $row->cty_id }}" tabindex="-1" aria-labelledby="editCityLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="editCityLabel">Ubah Kota</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('city.update', [$row->cty_id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="cty_id" value="{{ $row->cty_id }}">
                                    <div class="form-group">
                                        <label for="nama">Nama Provinsi</label>
                                        <select class="form-control" name="prv_name">
                                            <option value="{{ $row->cty_prv_id }}">{{ $row->prv_name }}</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="namaKota">Nama Kota / Kabupaten</label>
                                        <input type="text" class="form-control" id="namakota" name="cty_name" value="{{ $row->cty_name }}">
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
                          <a href="#" class="badge bg-danger ml-2" data-toggle="modal" data-target="#hapusCity{{ $row->cty_id }}">delete</a>

                          <!-- Modal Hapus-->
                          <div class="modal fade" id="hapusCity{{ $row->cty_id }}" tabindex="-1" aria-labelledby="hapusCityLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="hapusCityLabel">Hapus City</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('city.destroy',[$row->cty_id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <p>Apakah anda yakin ingin menghapus <strong>{{ $row->cty_name }}</strong> ?</p> 
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