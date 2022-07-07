@extends('layouts.main')

@section('content')
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Laporan Penjualan Terbanyak</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a target="_blank" href="/laporan/terbanyak_pdf" class="btn btn-primary mr-3"><i class="fas fa-print"></i> Print</a>
              <a href="/laporan/terbanyak_export" class="btn btn-success"><i class="fas fa-file-excel"></i> Export</a>
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
                <span class="info-box-text">Jumlah Barang</span>
                <span class="info-box-number">{{ $jumlah_barang }}</span>
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
                                <div class="col-lg-3">
                                    <div class="row">
                                      <div class="col">
                                        <div class="form-group ">
                                            <select class="form-control" id="kategoriTerbanyak" name="">
                                              <option value="" disabled selected hidden>Pilih Kategori</option>
                                              @foreach ($category as $row)
                                                  <option value="{{ $row->ctg_id }}">{{ $row->ctg_name }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                {{-- ./col-lg-3 --}}
                            </div>
                            {{-- ./row --}}
                            <table id="dataTable" class="terbanyak table table-hover table-striped text-center">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Total Terjual</th>
                                    <th>Harga Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach ($terbanyak as $row)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->odd_prd_name }}</td>
                                        <td>{{ $row->odd_qty }}</td>
                                        <td>Rp.{{ number_format($row->odd_totalprice) }}</td>
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