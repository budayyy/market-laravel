@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Page Consultant</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Consultant</li>
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
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahConsultant">Tambah Consultant</a>

                    <!-- Modal Tambah-->
                    <div class="modal fade" id="tambahConsultant" tabindex="-1" aria-labelledby="tambahConsultantLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="tambahConsultantLabel">Tambah Consultant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('consultant.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="ac_name">Nama Consultant</label>
                                    <input type="text" class="form-control" name="ac_name" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="ac_email">Email</label>
                                    <input type="email" class="form-control" name="ac_email" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="ac_phone">No Handphone</label>
                                    <input type="number" class="form-control" name="ac_phone" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="name_pt">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="name_pt" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="ac_payment">Harga Jasa</label>
                                    <input type="number" class="form-control" name="ac_payment" required>
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
                      <th>Nama Consultant</th>
                      <th>Email</th>
                      <th>No Handphone</th>
                      <th>Perusahaan</th>
                      <th>Harga Jasa</th>
                      <th>Created</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($consultant as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->ac_name }}</td>
                        <td>{{ $row->ac_email }}</td>
                        <td>{{ $row->ac_phone }}</td>
                        <td>{{ $row->name_pt }}</td>
                        <td>{{ number_format($row->ac_payment) }}</td>
                        <td>{{ date("d/m/Y", strtotime($row->ac_create)) }}</td>
                        <td>

                          {{-- Edit --}}
                          <a href="#" class="badge bg-warning" data-toggle="modal" data-target="#editConsultant{{ $row->ac_id }}">ubah</a>

                          <!-- Modal Edit-->
                          <div class="modal fade" id="editConsultant{{ $row->ac_id }}" tabindex="-1" aria-labelledby="editConsultantLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="editConsultantLabel">Ubah Consultant</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('consultant.update', [$row->ac_id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="ac_name">Nama Consultant</label>
                                        <input type="text" class="form-control" name="ac_name" value="{{ $row->ac_name }}" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="ac_email">Email</label>
                                        <input type="email" class="form-control" name="ac_email" value="{{ $row->ac_email }}" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="ac_phone">No Handphone</label>
                                        <input type="number" class="form-control" name="ac_phone" value="{{ $row->ac_phone }}" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="name_pt">Nama Perusahaan</label>
                                        <input type="text" class="form-control" name="name_pt" value="{{ $row->name_pt }}" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="ac_payment">Harga Jasa</label>
                                        <input type="number" class="form-control" name="ac_payment" value="{{ $row->ac_payment }}" required>
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
                          <a href="#" class="badge bg-danger ml-2" data-toggle="modal" data-target="#hapusConsultant{{ $row->ac_id }}">delete</a>

                          <!-- Modal Hapus-->
                          <div class="modal fade" id="hapusConsultant{{ $row->ac_id }}" tabindex="-1" aria-labelledby="hapusConsultantLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="hapusConsultantLabel">Hapus Consultant</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('consultant.destroy',[$row->ac_id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <p>Apakah anda yakin ingin menghapus <strong>{{ $row->ac_name }}</strong> ?</p> 
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