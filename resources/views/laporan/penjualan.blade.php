@extends('layouts.main')

@section('content')
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Laporan Penjualan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a target="_blank" href="/laporan/penjualan_pdf" class="btn btn-primary mr-3"><i class="fas fa-print"></i> Print</a>
              <a href="/laporan/penjualan_export" class="btn btn-success"><i class="fas fa-file-excel"></i> Export</a>
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
              <span class="info-box-icon bg-info">
                <i class="fas fa-clone nav-icon"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Kategori</span>
                <span class="info-box-number">{{ $jml_ctg }}</span>
              </div>
            </div>
          </div>
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
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col">
                                        <div class="form-group ">
                                            <select class="form-control" id="kategoriPenjualan" name="">
                                                <option value="" disabled selected hidden>Pilih Kategori</option>
                                                @foreach ($category as $row)
                                                    <option value="{{ $row->ctg_id }}">{{ $row->ctg_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- ./row --}}
                                </div>
                                {{-- .col-lg-3 --}}
                            </div>
                            {{-- ./row --}}
                            <table id="laporan" class="penjualan table table-hover table-striped text-center">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kategori</th>
                                  <th>Total Terjual</th>
                                  <th>Harga Total</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($penjualan as $row)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $row->ctg_name }}</td>
                                      <td>{{ $row->terjual }}</td>
                                      <td>{{ $row->total }}</td>
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