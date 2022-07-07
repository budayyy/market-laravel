@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Page Dashboard Retail</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Retail</li>
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
                {{-- <div class="card-header">
                  <h3 class="card-title">
                    <p class="h5">Daftar Retail</p>
                  </h3>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="dataTable" class="table table-striped table-hover">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Retail</th>
                      <th>Alamat</th>
                      <th>No HP</th>
                      <th>Nama Member</th>
                      <th>Kota</th>
                      <th>Created</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($retail as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="/retail/detail/{{ $row->rtl_id }}">{{ $row->rtl_name }}</a></td>
                        <td>{{ $row->rtl_addres }}</td>
                        <td>{{ $row->rtl_phone }}</td>
                        <td>{{ $row->mb_name }}</td>
                        <td>{{ $row->cty_name }}</td>
                        <td>{{ date("d/m/Y", strtotime($row->rtl_create)) }}</td>
                        <td>
                            @if ($row->rtl_status == 'Review')
                            <a href="#" class="badge badge-primary">Review</a>
                            @elseif($row->rtl_status == 'Validate')
                            <a href="#" class="badge badge-success">Validate</a>
                            @elseif($row->rtl_status == 'Rejected')
                            <a href="#" class="badge badge-danger">Rejected</a>
                            @elseif($row->rtl_status == 'Nonactive')
                            <a href="#" class="badge badge-secondary">Nonactive</a>
                            @endif
                        </td>
                        <td>

                          {{-- Validasi --}}
                          <a href="#" class="btn btn-info" data-toggle="modal" data-target="#validasiRetail{{ $row->rtl_id }}">Validasi</a>

                          <!-- Modal Edit-->
                          <div class="modal fade" id="validasiRetail{{ $row->rtl_id }}" tabindex="-1" aria-labelledby="validasiRetailLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="validasiRetailLabel">Form Validasi Status Retail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/retail/validasi/{{ $row->rtl_id }}">
                                    @csrf
                                    
                                    <label> Nama Retail : {{ $row->rtl_name }}</label>
                                    <div class="form-group">
                                      <label for="status">Status</label>
                                      <select class="form-control" name="rtl_status">
                                        <option value="Review" {{ ($row->rtl_status == 'Review') ? 'Selected' : '' }}>Review</option>
                                        <option value="Validate" {{ ($row->rtl_status == 'Validate') ? 'Selected' : '' }}>Validate</option>
                                        <option value="Rejected" {{ ($row->rtl_status == 'Rejected') ? 'Selected' : '' }}>Rejected</option>
                                        <option value="Nonactive" {{ ($row->rtl_status == 'Nonactive') ? 'Selected' : '' }}>Nonactive</option>
                                      </select>
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
                          <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusRetail{{ $row->rtl_id }}"><i class="far fa-trash-alt"></i></a>

                          <!-- Modal Hapus-->
                          <div class="modal fade" id="hapusRetail{{ $row->rtl_id }}" tabindex="-1" aria-labelledby="hapusRetailLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="hapusRetailLabel">Hapus Retail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/retail/hapus/{{ $row->rtl_id }}" >
                                    @csrf
                                    <p>Apakah anda yakin ingin menghapus <strong>{{ $row->rtl_name }}</strong> ?</p> 
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