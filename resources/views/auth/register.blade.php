<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dating</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('backend/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.ico')}}" />
    <!-- my style -->
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <!-- my style end -->
  </head>
  <body>
    <div class="container-scroller">
      <nav style="background-image: linear-gradient(39deg, #a58787, #6b98a1);" class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background: none;">
          <a class="navbar-brand brand-logo" href="../../index.html"><span class="logo">Dating</span></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="{{asset('backend/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">
                <i class="mdi mdi-login-variant reg-text">&nbsp; Login</i>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container mt-5">
        <div class="row" style="margin-top: 120px;">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-body shadow  bg-white rounded">
                        <h1 class="text-center">Register</h1>
                        <form class="forms-sample" method="POST" action="{{ route('register') }}">
                           @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Username</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="Username" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Email" name="email" value="{{ old('email') }}"  autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password" name="password"  autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password"  autocomplete="new-password">
                            </div>
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> Remember me </label>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Register</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
               <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Discription</h1>
                        <figure class="swing">
                       <img style="width:100%;height:500px" src='https://cdn.dribbble.com/users/1997307/screenshots/5127614/media/407e3a6fd3cd37119202c8d10053a700.gif' />
                        </figure> 
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('backend/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{asset('backend/js/off-canvas.js')}}"></script>
    <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('backend/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('backend/js/file-upload.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
