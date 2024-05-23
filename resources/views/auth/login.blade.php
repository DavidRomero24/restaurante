@extends('layouts.applogin')

@section('title','login')

@section('content')
<div class="login-box" >
    <div class="card card-outline " >
        <div class="card-header text-center w-100 h-100">
            <img src="{{asset('backend/dist/img/logo.png')}}" style="width: 60%; height: auto;" alt="">
        </div>
        <div class="card-body">
            <p class="login-box-msg"><b>Welcome to the best restaurant</b></p>
            <form action="{{route('login')}}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="usuario@example.com" >
                
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="current-password">
          
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-block " style="background-color: #A6774E;" >Ingresar</button>
                
            </div>
            <div class="col-6">
                <a href="{{ route('register') }}" class="btn btn-block " style="background-color: #A6774E;" >Registro</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="mb-1 mt-2">
                    @if (Route::has('password.request'))
                    <a style="color: #A6774E;" href="{{ route('password.request') }}">Olvidé mi contraseña</a>
                    @endif
                </p>
            </div>
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection



