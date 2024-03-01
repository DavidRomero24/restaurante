@extends('layouts.applogin')

@section('title','login')

@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Iniciar Sesión</p>
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
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                
            </div>
            <div class="col-6">
                <a href="{{ route('register') }}" class="btn btn-primary btn-block">Registro</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="mb-1">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
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



