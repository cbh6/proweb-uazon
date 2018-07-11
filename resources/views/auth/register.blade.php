@extends('layout')

@section('content')
<div class="container">
    <div class="row auth__row">
        <div class="col-md-4 auth__form-container">
            <h2 class="title auth__form-title">Registro</h2>

            <!-- register form -->
            <form method="POST" action="{{ route('register') }}" class="auth__form">
                {{ csrf_field() }}

                <!-- nombre -->
                <div class="row">
                    <div class="col-md-12 auth__field">
                        <label for="name">Nombre</label>
                        <input class="auth__input" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="auth__errors">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- email -->
                <div class="row">
                    <div class="col-md-12 auth__field">
                        <label for="email">Email</label>
                        <input class="auth__input" id="email" type="email" name="email" value="{{ old('email') }}" required>

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
                        <input class="auth__input" id="password" type="password" name="password" required>

                        @if ($errors->has('password'))
                            <span class="auth__errors">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- password confirm -->
                <div class="row">
                    <div class="col-md-12 auth__field">                        
                        <label for="password-confirm">Confirmar contraseña</label>
                        <input class="auth__input" id="password-confirm" type="password" name="password_confirmation" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">                        
                        <button type="submit" class="btn auth__button">
                            Registrarse
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
