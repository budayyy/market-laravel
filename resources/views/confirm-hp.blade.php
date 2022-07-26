<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Marketplace | Confirm HP </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  {{-- <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <link
  rel="icon"
  href="img/bina-icon.png"
  type="image/gif"
  sizes="16x16"
/>
  {{-- Css Login --}}
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
<body>
  <div id="auth">
    <div class="row h-100">
      <div class="col-lg-8 col-12">
        <div id="auth-left" class="position-relative">
          <img class="position-absolute top-50 start-50 translate-middle card-img" src="{{ asset('img/forgot-password.png') }}" alt="background.png">
        </div>
      </div>
      <div class="col-lg-4 row justify-content-center align-items-center">
        <div id="auth-right">
            <div class="card-body login-card-body ">
              <div class="login-logo">
                <a href="#"><b>Konfirmasi Password</b></a>
              </div>
              <p class="login-box-msg"><i>Silahkan masukan no handphone yang terdaftar sebelumnya</i></p>
              <p class="login-box-msg">{{ $nohp }}</p>

              @if (session()->has('loginerror'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginerror') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              <form action="/confirm-hp" method="POST">
                @csrf
                <div class="input-group mb-3">
                  <input type="number" name="number" class="form-control" placeholder="No Handphone" autocomplete="off" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- /.col -->
                  <div class="col-lg">
                    <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
              <p class="mt-2 text-center">
                <a href="/">Kembali</a>
              </p>
            </div>
          </div>
      </div>
    </div>
  </div>
  
<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
