@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">
              <a href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i></a> Info Retail
            </h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Retail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
          <div class="col-lg-10">
            <div class="card" style="height: 10rem;">
              <div class="card-body">
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-3">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                          src="/img/profile_default.png"
                          alt="User profile picture">
                    </div>
                  </div>
                  
                  <div class="col-sm-3 invoice-col">
                    <b>{{ $retail->rtl_name }}</b><br>
                    <b>Aktif</b><br>
                    {{ $retail->rtl_phone }}<br>
                    <b>Pemilik : </b>{{ $retail->mb_name }}<br>
                    <b>Telp : </b>{{ $retail->rtl_phone }}
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 invoice-col">
                    <b>Alamat :</b><br>
                  <address>
                      {{ $retail->rtl_addres }}
                  <br>
                  {{ $retail->cty_name }}
                    </address>
                    
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 invoice-col">
                    <b>Sejak :</b> {{ date("Y-m-d", strtotime($retail->rtl_create)) }}<br>
                    <b>Location </b><br>
                    Longitude : {{ $retail->rtl_long }}<br>
                    Latitude : {{ $retail->rtl_lat }} <br>
  
                        @if ($retail->rtl_status == 'Review')
                        <a href="#" class="badge badge-primary">Review</a>
                        @elseif($retail->rtl_status == 'Validate')
                        <a href="#" class="badge badge-success">Validate</a>
                        @elseif($retail->rtl_status == 'Rejected')
                        <a href="#" class="badge badge-danger">Rejected</a>
                        @elseif($retail->rtl_status == 'Nonactive')
                        <a href="#" class="badge badge-secondary">Nonactive</a>
                        @endif
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card" style="height: 10rem;">
                <div class="card-body">
                 <b>Total Produk :</b><br>
                 <b>jumlah product</b>
                </div>
            </div>
          </div>
          </div>
        </div>
      </section>
  
      {{-- product retail --}}
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">
                              <table id="dataTable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                      <th>Thumbnail</th>
                                      <th>Nama Produk</th>
                                      <th>Stock</th>
                                      <th>Harga</th>
                                      <th>Berat</th>
                                      </tr>
                                    </thead>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>


@endsection