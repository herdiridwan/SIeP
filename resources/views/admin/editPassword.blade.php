@extends('layouts.admin')

@section('title', 'Edit Password')

@section('head-link')
<!-- Custom fonts for this template-->
<link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link
  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ URL::asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h4>Akun</h4>
              @if (session()->has('password_update'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session()->get('password_update') }}
              </div>
              @endif
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <form action="{{ url('admin/update-passwordd') }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                  <label for="exampleInputPassword1">Old Password</label>
                  <input type="password" class="form-control @if (session()->has('password_salah')) is-invalid @endif"
                    id="exampleInputPassword1" name="oldpassword" required>
                  @if (session()->has('password_salah'))
                  <div class="invalid-feedback">
                    {{ session()->get('password_salah') }}
                  </div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword2">New Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror"
                    id="exampleInputPassword2" name="password" required>
                    <span class="form-text text-muted">* minimal 8 karakter</span>
                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword3">Confirm Password</label>
                  <input type="password" class="form-control @error('cpassword') is-invalid @enderror"
                    id="exampleInputPassword3" name="cpassword" required>
                  @error('cpassword')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group row justify-content-end mr-1">
                  <button name="submit" type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('foot-link')
<!-- Bootstrap core JavaScript-->
<script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL::asset('js/sb-admin-2.min.js') }}"></script>

<script>
  $(function(){
              $(".alert").delay(3000).slideUp(300);
          });
</script>

<script>
  $('#inputGroupFile01').on('change',function(){
              //get the file name
              var fileName = $(this).val();
              var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
              //replace the "Choose a file" label
              $(this).next('.custom-file-label').html(cleanFileName);
          })

          function readURL(input) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
          }

          $("#inputGroupFile01").change(function() {
            readURL(this);
          });
</script>
@endsection
