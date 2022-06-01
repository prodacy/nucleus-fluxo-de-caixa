@extends('layouts.auth')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12 col-sm-8 col-md-6 col-lg-4">

            <div class="text-center py-3 px-0 text-white">
                <span class="h3 text-uppercase mb-0">{{ config('app.name', 'Laravel 5') }}</span>
                <div class="h5">Avaliação Técnica</div>
            </div>

            <div class="card o-hidden border-0 shadow-lg my-2 mx-3 bg-white-01 show-down">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-4">
                                <div class="text-center">
                                    <h1 class="h5 text-gray-900 mb-4">{{ __('LOGIN') }}</h1>
                                </div>

                                @if ($errors->any())
                                <div class="alert alert-danger border-left-danger" role="alert">
                                    <ul class="pl-2 my-2">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}" class="user">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('User') }}" value="{{ old('email') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Pass') }}" required>
                                    </div>

                                    <div class="form-group text-center">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember" style="width:auto;">{{ __('Manter conectado') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark btn-user btn-block">
                                            entrar
                                        </button>
                                    </div>
                                    
                                </form>

                                <hr>

                                @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a class="small text-dark" href="{{ route('password.request') }}">
                                        {{ __('Não lembro a senha') }}
                                    </a>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="invert text-center mt-3">
                <img src="https://nucleus.eti.br/wp-content/themes/nucleus/assets/images/logo.png" height="20px">
            </div>

            <div class="mt-3 text-center">
                user: <b>admin@admin.com</b> <br>
                pass: <b>123</b>
            </div>


        </div>
    </div>
</div>


@endsection
