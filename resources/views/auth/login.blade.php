@extends('layout.menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5" style="padding-right:0px;">
                                <div class="form-check" style="padding-left:20px;padding-top:10px;">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                      
                                </div>
                            </div>
                            <div class="col-md-7" style="padding:0px;margin:0;">
                               @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size:15px;font-family:Times New Roman;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                          <br>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="form-control btn btn-sm btn-success btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div> 
                        </div>
                         <br>
                        <div class="form-group row">
                         <div class="col-md-12">
                             <a href="{{url('auth/google')}}" class="form-control">
                                    <strong style="color:blue">
                                        Login with Google
                                    </strong>
                                </a>
                                 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <b>
             Don't have an account yet? <a href="{{ route('register') }}" style="color:blue;"> Register now</a></b>
        </div>
    </div>
</div>
@endsection

<style type="text/css">
    .form-group label{
        color: black;
        font-size:14px;
        font-family:  Andale Mono ;
    }
</style>