@extends('layouts.main')

@section('content')
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

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

        {{-- alert --}}
        <div class="content">
          <div class="container-fluid">
          <div class="row">
              <div class="col-12">
              @if (session()->has('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
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
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset('storage/'. $session->picture) }}"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{ $session->adm_name }}</h3>
  
                  <p class="text-muted text-center">IT Engineer</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-12">
                          <div class="text-center">
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubah-foto-{{ $session->adm_id }}">
                            <i class="fas fa-upload"></i>  Ganti Image
                          </button>
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="ubah-foto-{{ $session->adm_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ubah Foto</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form action="/profile/ubah-foto/{{ $session->adm_id }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('put')
                                  <div class="form-group">
                                    <label for="exampleInputFile">Pilih foto</label>
                                    <div class="input-group">
                                      {{-- <input type="hidden" name="oldImage" value="{{ $session->picture }}"> --}}
                                        @if ($session->picture)
                                            <img src="{{ asset('storage/' . $session->picture) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block rounded-lg">
                                        @else
                                            <img class="img-preview img-fluid mb-3 col-sm-5 rounded-lg">
                                        @endif
                                    </div>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" onchange="previewImage()">
                                        <label class="custom-file-label" for="exampleInputFile">pilih dari komputer</label>
                                      </div>
                                    </div>
                                  </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    <!-- <li class="list-group-item">
                      <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="float-right">13,287</a>
                    </li> -->
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card card-primary card-outline">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#setting" data-toggle="tab">Setting</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ubahPassword" data-toggle="tab">Ubah Password</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="setting">
                      <form action="/profile/{{ $session->adm_id }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="adm_name" value="{{ $session->adm_name }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" name="adm_email" value="{{ $session->adm_email }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">No. Handphone</label>
                          <div class="col-sm-10">
                            <input type="nummber" class="form-control" name="adm_phone" value="{{ $session->adm_phone }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="adm_username" value="{{ $session->adm_username }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form> 
  
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="ubahPassword">
                      
                    <form action="/ubahPassword/{{ $session->adm_id }}" method="POST" class="form-horizontal">
                      @csrf
                      @method('put')
                        <div class="form-group row">
                          <label for="passwordLama" class="col-sm-2 col-form-label">Password Lama</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="passwordLama" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="passwordBaru1" class="col-sm-2 col-form-label">Password Baru</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" name="passwordBaru1" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="passwordBaru2" class="col-sm-2 col-form-label">Ulangi Password Baru</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" name="passwordBaru2">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Ubah Password</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->


      <script>
        
        function previewImage(){
          const image = document.querySelector('#image');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
          }

        }
      </script>

@endsection