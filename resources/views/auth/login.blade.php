@extends('layout')

@section('content')
<div class="container">
    <div class="row auth__row">
        <div class="col-md-4 auth__form-container">
            <h2 class="title auth__form-title">Login</h2>

                    <form method="POST" action="{{ route('login') }}" class="auth__form">
                        {{ csrf_field() }}
                        
                        <!-- email field -->
                        <div class="row">
                            <div class="col-md-12 auth__field">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
    
                                @if ($errors->has('email'))
                                    <span class="auth__errors">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- password field -->
                        <div class="row">
                            <div class="col-md-12 auth__field">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
    
                                @if ($errors->has('password'))
                                    <span class="auth__errors">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 auth__links">
                                <button type="submit" class="btn auth__button">
                                    Login
                                </button>

                                <a class="auth__password-reset-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
