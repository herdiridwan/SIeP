<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="{{ url('img/logo.ico')}}">
  <title>Login E-Payroll Hadiyani & Partner Law Firm</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href=<link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body
  style="background-image: url({{ URL::asset('img/gambarlogin.jpg') }}); background-repeat : no-repeat; background-position: center bottom; background-size: cover;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row left-content-center mt-5">

      <div class="col-xl-5 col-lg-5 col-md-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="p-5">
              <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4 mt-2" style="font-family: 'Readex Pro', sans-serif; font-size: 24px;">Silahkan Masuk</h2>
                @error('blocked')
                <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ $message }}
                </div>
                @enderror
              </div>
              <form class="user" action="/login" method="post">
                @csrf
                <div class="form-group">
                  <input type="email"
                    class="@error('email') is-invalid @enderror form-control form-control-user text-center"
                    id="exampleInputEmail" placeholder="Email" name="username" value="{{ old('username') }}">
                  @error('username')
                  <div class="invalid-feedback text-center">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password"
                    class="@error('password') is-invalid @enderror form-control form-control-user text-center"
                    id="exampleInputPassword" placeholder="Password" name="password">
                  <div class="valid-feedback text-center">

                  </div>
                  @error('password')
                  <div class="invalid-feedback text-center">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember_token">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-info btn-user btn-block" style="font-size:20px">Login</button>
                <hr>

                <div class="valid-feedback text-center d-block text-info">
                <a data-toggle="modal" data-target=".bd-example-modal-sm" href="#">Lupa Password ?</a>
                </div>

                 <!-- Small modal -->
                <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <hr>
                      <center>Silahkan menghubungi Admin ^_^</center>
                      <hr>
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script>
    $(function(){
        $(".alert").delay(3000).slideUp(300);
    });
  </script>

</body>

</html>
