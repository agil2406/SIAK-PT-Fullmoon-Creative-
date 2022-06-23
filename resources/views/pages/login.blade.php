<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> @yield('title')  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  @include('includes.styling')

</head>

<body>


  <main id="main" class="main">

  
@if(session()->has('succes'))
<div class="alert alert-succes alert-dismissible fade show" role="alert">
  {{session('succes')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
</button>
</div>
@endif

@if(session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('loginError')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
</button>
</div>
@endif

<div class="container">
  <div class="row justify-content-center">
          <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
               <img src="assets/img/logo.png" alt="">
              <span class="d-none d-lg-block">Fullmoon Creative</span>
              </a>
          </div>
      <div class="col-md-6">    
       <div class="card mb-3">
          <div class="card-body">
            <div class="col-md-12">
              <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
              <p class="text-center small">Enter your username & password to login</p>
            </div>
                <form action="/login" method="post">
                  @csrf
                  <div class="col-md-12">
                    <label for="email" class="form-label @error('email') is-invalid @enderror">Masukkan Email</label>       
                      <input type="email" name="email" class="form-control" id="email" required value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror

                  </div>

                  <div class="col-md-12">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

              <div class="col-md-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
              </div>
              <div class="col-md-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
              </div>
              <div class="col-md-12">
                <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
              </div>
            </form>

          </div>
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">@OnePieceProject</a>
      </div>
      </div>
      
  </div>
</div>

  </main><!-- End #main -->

  @include('includes.footer')
  @include('includes.script')


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


</body>

</html>
@section('title')
    Login Page
@endsection

@section('content')


  @endsection