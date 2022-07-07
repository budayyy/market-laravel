<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Marketplace | Login </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  {{-- <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  {{-- Css Login --}}
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
<body>
  <div id="auth">
    <div class="row h-100">
      <div class="col-lg-8 col-12">
        <div id="auth-left" class="position-relative">
          <img class="position-absolute top-50 start-50 translate-middle card-img" src="{{ asset('img/background.png') }}" alt="background.png">
        </div>
      </div>
      <div class="col-lg-4 row justify-content-center align-items-center">
        <div id="auth-right">
            <div class="card-body login-card-body ">
              <div class="login-logo">
                <a href="#">Bina <b>App</b></a>
              </div>
              <p class="login-box-msg"><i>Silahkan login terlebih dahulu</i></p>

              @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if (session()->has('loginerror'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginerror') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              <form action="/proseslogin" method="post">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" name="adm_username" class="form-control @error('adm_username')is-invalid @enderror" placeholder="Username" autocomplete="off" value="{{ old('adm_username') }}" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  @error('adm_username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <input type="password" name="adm_password" class="form-control myinput" placeholder="Password" id="password" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span><i class="fas fa-eye" id="tooglePassword"></i></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- /.col -->
                  <div class="col-lg">
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
              <p class="mt-2 text-center">
                <a href="/forgot-password">Lupa password?</a>
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
<script>

  const tooglePassword = document.querySelector('#tooglePassword');
  const password       = document.querySelector('#password');

  tooglePassword.addEventListener('click', function (e) {
    // toggle type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toogle eye slash icon
    this.classList.toggle('fa-eye-slash');
  });

</script>
</body>
</html>
