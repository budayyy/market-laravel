@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              <a href="/orders"><i class="fas fa-arrow-left"></i></a> Orders / #{{ $orderId->odr_id }}
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- content --}}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{-- main content --}}
                    <div class="invoice p-3 mb-3 callout callout-info">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <small class="float-right"><b>Date: 
                                    {{ date("Y-m-d", strtotime($orderId->odr_date)) }}</b>
                                    </small>
                                </h4>
                            </div>
                            {{-- /.col --}}
                        </div>
                        {{-- /.row --}}
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Dari
                                <address>
                                  <strong>{{ $orderId->rtl_name }}</strong><br>
                                  {{ $orderId->rtl_addres }}
                                  <br>
                                  No HP: {{ $orderId->rtl_phone }}<br>
                                </address>
                            </div>
                            {{-- /.col-4 --}}
                            <div class="col-sm-4 invoice-col">
                                Kepada
                                <address>
                                    <strong>{{ $orderId->mb_name }}</strong><br>
                                    {{ $orderId->adr_address }}
                                    <br>
                                    No HP: {{ $orderId->mb_phone }}
                                    <br>
                                    Email: {{ $orderId->mb_email }}
                                </address>
                            </div>
                            {{-- /.col-4 --}}
                            <div class="col-sm-4 invoice-col">
                                <br>
                                <b>ID Order:</b> #{{ $orderId->odr_id }}
                                <br>
                                <b>Dibayar Pada: </b> {{ date("Y-m-d", strtotime($orderId->odr_date)) }}
                                <br>
                                <b>Pengiriman : </b> {{ $orderId->shp_name }} <br>
                                
                                @if ($orderId->odr_status == 'Belum Dibayar')
                                <p class="badge badge-danger">Belum Dibayar</p>
                                @elseif($orderId->odr_status == 'Dikirim')
                                <p class="badge badge-primary">Dikirim</p>
                                @elseif($orderId->odr_status == 'Dikemas')
                                <p class="badge badge-warning">Dikemas</p>
                                @elseif($orderId->odr_status == 'Selesai')
                                <p class="badge badge-success">Selesai</p>
                                @elseif($orderId->odr_status == 'Dibatalkan')
                                <p class="badge badge-secondary">Dibatalkan</p>
                                @endif
                            </div>
                            {{-- /.col-4 --}}
                        </div>
                        {{-- /.row --}}
                        
                        {{-- row table responsive --}}
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Qty</th>
                                            <th>Produk</th>
                                            <th>Category</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($productId as $row)
                                        <tr>
                                            <td>{{ $row->odd_qty }}</td>
                                            <td>{{ $row->odd_prd_name }}</td>
                                            <td>{{ $row->ctg_name }}</td>
                                            <td>IDR {{ number_format($row->odd_price) }}</td>
                                            <td>IDR {{ number_format($row->odd_totalprice) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- /.row --}}
                        <div class="row">
                            <div class="col-6">
                                <p class="lead">Metode Pembayaran:</p>
                                <b>{{ $orderId->pay_name }}</b>
                            </div>
                            <div class="col-6">
                                <p class="lead">Pembayaran pada  
                                    {{ date("Y-m-d", strtotime($orderId->odr_date)) }}
                                </p>
                                <div class="table-responsive">
                                    <table>
                                        <tr>
                                          <th style="width:50%">Total Produk:</th>
                                          <td>IDR Total</td>
                                        </tr>
                                        <!-- <tr>
                                            <th>Biaya Admin</th>
                                            <td>IDR 2.500</td>
                                        </tr> -->
                                        <tr>
                                          <th>Biaya Pengiriman:</th>
                                          <td>IDR {{ number_format($orderId->odr_ongkir) }}</td>
                                        </tr>
                                        <tr>
                                          <th>Total yang dibayar:</th>
                                          <td>IDR </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- /.row --}}

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                            <a href="/orders/invoice/{{ $orderId->odr_id }}" target="_blank" class="btn btn-primary float-right text-white text-decoration-none">
                                <i class="fas fa-print"></i> Print
                            </a>
                            </div>
                        </div>
                        </div>
                        <!-- /.invoice -->

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection