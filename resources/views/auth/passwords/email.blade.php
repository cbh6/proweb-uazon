@extends('layout')

@section('content')
<div class="container">
    <div class="row auth__row">
        <div class="col-md-4 auth__form-container">
            <h2 class="title auth__form-title">Reset password</h2>

            @if (session('status'))
                <p>{{ session('status') }}</p>
            @endif

            <form class="auth__form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-12 auth__field">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="auth__input" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="auth__errors">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn auth__button">
                            Enviar email
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
