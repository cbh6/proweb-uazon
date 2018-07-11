@extends('layout')

@section('content')
<div class="container">
    <div class="row auth__row">
        <div class="col-md-4 auth__form-container">
            <h2 class="title auth__form-title">Recuperar contraseña</h2>

            <!-- reset password form -->
            <form method="POST" action="{{ route('password.request') }}" class="auth__form">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <!-- email field -->
                <div class="row">
                    <div class="col-md-12 auth__field">                        
                        <label for="email">Email</label>
                        <input id="email" type="email" class="auth__input" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="auth__errors">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- password -->
                <div class="row">
                    <div class="col-md-12 auth__field">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" class="auth__input" name="password" required>

                        @if ($errors->has('password'))
                            <span class="auth__errors">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- confirm password -->
                <div class="row">
                    <div class="col-md-12 auth__field">                        
                        <label for="password-confirm">Repite contraseña</label>
                        <input id="password-confirm" type="password" class="auth__input" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="auth__errors">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 auth__links">                       
                        <button type="submit" class="btn auth__button">
                            Reset contraseña
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
