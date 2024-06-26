@extends('templates.main')

@section('container')
<div class="container-login">
  <div class="row justify-content-center align-item-center">
    <div class="col-lg-8 col-md-8 col-sm-11 py-md-5">
      <div class="row shadow">
        <div class="col-lg-6 col-md-6 col-sm-12 p-4 p-md-5 order-1 order-md-0">
          <div class="text-center text-md-start">
            <img src="img/undip.png" class="img-fluid mb-3 ml-md-4 ml-sm-5" width="60px" alt="Logo">
            <p class="mb-0">Selamat Datang</p>
            <h4 style="font-weight: bolder;">di Sistem Informasi Akademik BMW-M3 </h4>
            <!-- <p style="font-size: small; color: grey;">merupakan aplikasi untuk memonitoring prestasi akademik mahasiswa Informatika Universitas Diponegoro.</p> -->
          </div>
          <form class="mb-3 mt-md-3" action="/login" method="POST">
            @csrf
            <!-- Identifier -->
            <div class="mb-3">
              <label for="username" class="form-label" style="font-size: small"> NIM atau Email <span style="color: red;">*</span></label>
              <input type="text" class="form-control" style="font-size: small" id="username" name="username" placeholder="Masukkan NIM atau Email" required>
            </div>
            <!-- Password -->
            <div class="mb-3 position-relative">
              <label class="form-label" style="font-size: small"> Password <span style="color: red;">*</span></label>
              <div class="input-group">
                <input type="password" class="form-control fakepassword" style="font-size: small" id="password" name="password" placeholder="Masukkan Password" required>
                <span class="input-group-text p-0">
                  <!-- <i class="fakepasswordicon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i> -->
                </span>
              </div>
            </div>
            <!-- Button -->
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">LOGIN</button>
            </div>

            <!-- <div class="small garis mt-4">
                                <p>atau masuk dengan</p>
                            </div>

                            <div class="d-grid gap-2 mt-3">
                                <a href="" class="btn btn-outline-primary" style="font-weight: bold;" type="button"><img src="https://siap.undip.ac.id/assets/app/images/img-microsoft-365.png" style="width: 20px; margin-right: 10px;"> Masuk dengan SSO</a>
                            </div> -->

          </form>
        </div>
        <div class="col-lg-6 col-md-7 col-sm-10 p-0 p-md-0 order-1 order-md-0">
          <img src="img/image-side-login.png" class="img-fluid mb-3 ml-md-4 ml-sm-5" width="400px" alt="...">
        </div>
      </div>
    </div>
  </div>
</div> @if (session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('loginError') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
</div>



@endsection