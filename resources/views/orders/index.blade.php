@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Page Orders</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Orders</li>
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

    {{-- content --}}
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <h5><b>Daftar Orders</b></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="dataTable" class="table table-striped text-center">
                    <thead>
                    <tr>
                      <th>ID order</th>
                      <th>Tanggal</th>
                      <th>Nama</th>
                      <th>Pengiriman</th>
                      <th>Retail</th>
                      <th>Payment</th>
                      <th>Alamat</th>
                      <th>Orders Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($order as $row)
                      <tr>
                        <td><a href="/orders/detail/{{ $row->odr_id }}">{{ $row->odr_id }}</a></td>
                        <td>{{ date("d/m/Y", strtotime($row->odr_date)) }}</td>
                        <td>{{ $row->mb_name }}</td>
                        <td>{{ $row->shp_name }}</td>
                        <td>{{ $row->rtl_name }}</td>
                        <td>{{ $row->shp_name }}</td>
                        <td>{{ $row->adr_address }}</td>
                        <td>
                          @if ($row->odr_status == 'Belum Dibayar')
                            <p class="badge badge-danger">Belum Dibayar</p>
                          @elseif($row->odr_status == 'Dikirim')
                            <p class="badge badge-primary">Dikirim</p>
                          @elseif($row->odr_status == 'Dikemas')
                            <p class="badge badge-warning">Dikemas</p>
                          @elseif($row->odr_status == 'Selesai')
                            <p class="badge badge-success">Selesai</p>
                          @elseif($row->odr_status == 'Dibatalkan')
                            <p class="badge badge-secondary">Dibatalkan</p>
                          @endif
                        </td>
                        <td>
                          <a href="/orders/validasi/{{ $row->odr_id }}" class="btn btn-primary" data-toggle="modal" data-target="#validasiModalOrder{{ $row->odr_id }}" >Validasi</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->

@endsection