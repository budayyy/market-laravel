@extends('layouts.main')

@section('content')
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Laporan Penjualan Periode</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a target="_blank" href="/laporan/periode_pdf" class="btn btn-primary mr-3"><i class="fas fa-print"></i> Print</a>
              <a href="/laporan/periode_export" class="btn btn-success"><i class="fas fa-file-excel"></i> Export</a>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            <div class="info-box">
              <span class="info-box-icon bg-success">
              <i class="fas fa-sort-amount-up nav-icon"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Terjual</span>
                <span class="info-box-number">{{ $total_terjual }}</span>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger">
              <i class="fas fa-dollar-sign nav-icon"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Harga Total </span>
                <span class="info-box-number">Rp.{{ number_format($harga_total) }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="laporan" class="table table-hover table-striped text-center">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Total Barang Terjual</th>
                                    <th>Harga Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach ($periode as $row)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('F', strtotime($row->odd_create)) }}</td>
                                        <td>{{ $row->terjual }}</td>
                                        <td>Rp.{{ number_format($row->total) }}</td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection