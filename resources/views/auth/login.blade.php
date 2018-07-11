@extends('layout')

@section('content')
<div class="container">
    <div class="row auth__row">
        <div class="col-md-4 auth__form-container">
            <h2 class="title auth__form-title">Login</h2>

            <!-- login form -->
            <form method="POST" action="{{ route('login') }}" class="auth__form">
                {{ csrf_field() }}
                
                <!-- email field -->
                <div class="row">
                    <div class="col-md-12 auth__field">
                        <label for="email">Email</label>
                        <input class="auth__input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

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
                        <input class="auth__input" id="password" type="password"  name="password" required>

                        @if ($errors->has('password'))
                            <span class="auth__errors">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- remember me -->
                <div class="row">
                    <div class="col-md-12">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                        </label>
                    </div>
                </div>

                <!-- login button and reset pass link -->
                <div class="row">
                    <div class="col-md-12 auth__links">
                        <button type="submit" class="btn auth__button">
                            Login
                        </button>

                        <a class="auth__password-reset-link" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
