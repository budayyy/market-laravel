@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Page Payment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Payment</li>
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
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahPayment">Tambah Payment</a>

                    <!-- Modal Tambah-->
                    <div class="modal fade" id="tambahPayment" tabindex="-1" aria-labelledby="tambahPaymentLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="tambahPaymentLabel">Tambah Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('payment.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="pay_name">Nama Payment</label>
                                    <input type="text" class="form-control" id="pay_name" name="pay_name" required>
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
                      <th>Nama Payment</th>
                      <th>Created</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($payment as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->pay_name }}</td>
                        <td>{{ date("d/m/Y", strtotime($row->pay_create)) }}</td>
                        <td>

                          {{-- Edit --}}
                          <a href="#" class="badge bg-warning" data-toggle="modal" data-target="#editPayment{{ $row->pay_id }}">ubah</a>

                          <!-- Modal Edit-->
                          <div class="modal fade" id="editPayment{{ $row->pay_id }}" tabindex="-1" aria-labelledby="editPaymentLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="editPaymentLabel">Ubah Shipping</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('payment.update', [$row->pay_id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="pay_id">ID Payment</label>
                                        <input type="text" class="form-control" id="pay_id" name="pay_id" value="{{ $row->pay_id }}" disabled>
                                    </div>  
                                    <div class="form-group">
                                        <label for="pay_name">Nama Shipping</label>
                                        <input type="text" class="form-control" id="pay_name" name="pay_name" value="{{ $row->pay_name }}">
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
                          <a href="#" class="badge bg-danger ml-2" data-toggle="modal" data-target="#hapusPayment{{ $row->pay_id }}">delete</a>

                          <!-- Modal Hapus-->
                          <div class="modal fade" id="hapusPayment{{ $row->pay_id }}" tabindex="-1" aria-labelledby="hapusPaymentLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="hapusPaymentLabel">Hapus Payment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('payment.destroy',[$row->pay_id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <p>Apakah anda yakin ingin menghapus <strong>{{ $row->pay_name }}</strong> ?</p> 
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