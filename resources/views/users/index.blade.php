@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Page Users Admin </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User Admin</li>
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
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahUsers">Tambah Users Admin</a>

                    <!-- Modal Tambah-->
                    <div class="modal fade" id="tambahUsers" tabindex="-1" aria-labelledby="tambahUserAdmin" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="tambahUserAdmin">Tambah Users Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                <input type="text" name="adm_name" class="form-control" placeholder="Nama Lengkap" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                </div>
                                <div class="input-group mb-3">
                                <input type="text" name="adm_username" class="form-control" placeholder="Username" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                </div>
                                <div class="input-group mb-3">
                                <input type="email" name="adm_email" class="form-control" placeholder="Email" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                </div>
                                <div class="input-group mb-3">
                                <input type="number" name="adm_phone" class="form-control" placeholder="No Handphone" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                                </div>
                                <div class="input-group mb-3">
                                <input type="password" name="password1" class="form-control" placeholder="Password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                </div>
                                <div class="input-group mb-3">
                                <input type="password" name="password2" class="form-control" placeholder="Konfirmasi Password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                <select class="form-control" name="role_id">
                                    @foreach ($role as $row)
                                    <option value="{{ $row->id }}">{{ $row->role }}</option> 
                                    @endforeach
                                </select>
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
                      <th>Nama</th>
                      <th>No Handphone</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Created</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->adm_name }}</td>
                        <td>{{ $row->adm_phone }}</td>
                        <td>{{ $row->adm_email }}</td>
                        <td>{{ $row->adm_username }}</td>
                        <td>{{ $row->role }}</td>
                        <td>{{ date("d/m/Y", strtotime($row->adm_create)) }}</td>
                        <td>

                          {{-- Edit --}}
                          <a href="#" class="badge bg-warning" data-toggle="modal" data-target="#editBuilder{{ $row->adm_id }}">ubah</a>

                          <!-- Modal Edit-->
                          <div class="modal fade" id="editBuilder{{ $row->adm_id }}" tabindex="-1" aria-labelledby="editBuilderLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="editBuilderLabel">Ubah Tukang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('users.update', [$row->adm_id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="input-group mb-3">
                                      <input type="text" name="adm_name" class="form-control" placeholder="Nama Lengkap" value="{{ $row->adm_name }}" required>
                                      <div class="input-group-append">
                                          <div class="input-group-text">
                                          <span class="fas fa-user"></span>
                                          </div>
                                      </div>
                                      </div>
                                      <div class="input-group mb-3">
                                      <input type="text" name="adm_username" class="form-control" placeholder="Username" value="{{ $row->adm_username }}" required>
                                      <div class="input-group-append">
                                          <div class="input-group-text">
                                          <span class="fas fa-user"></span>
                                          </div>
                                      </div>
                                      </div>
                                      <div class="input-group mb-3">
                                      <input type="email" name="adm_email" class="form-control" placeholder="Email" value="{{ $row->adm_email }}" required>
                                      <div class="input-group-append">
                                          <div class="input-group-text">
                                          <span class="fas fa-envelope"></span>
                                          </div>
                                      </div>
                                      </div>
                                      <div class="input-group mb-3">
                                      <input type="number" name="adm_phone" class="form-control" placeholder="No Handphone" value="{{ $row->adm_phone }}" required>
                                      <div class="input-group-append">
                                          <div class="input-group-text">
                                          <span class="fas fa-phone"></span>
                                          </div>
                                      </div>
                                      </div>
                                      <div class="form-group">
                                      <select class="form-control" name="role_id">
                                          @foreach ($role as $item)
                                            <option value="{{ $item->id }}" 
                                              @if ($item->id == $row->role_id)
                                                selected
                                              @endif
                                            >{{ $item->role }}
                                            </option> 
                                          @endforeach
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
                          <a href="#" class="badge bg-danger ml-2" data-toggle="modal" data-target="#hapusUser{{ $row->adm_id }}">delete</a>

                          <!-- Modal Hapus-->
                          <div class="modal fade" id="hapusUser{{ $row->adm_id }}" tabindex="-1" aria-labelledby="hapusAdminLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="hapusAdminLabel">Hapus Tukang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('users.destroy',[$row->adm_id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <p>Apakah anda yakin ingin menghapus <strong>{{ $row->adm_name }}</strong> ?</p> 
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