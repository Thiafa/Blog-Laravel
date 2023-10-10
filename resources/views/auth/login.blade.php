@extends('layouts.app')

@section('content')
    <div class="page page-center">
        <div class="container container-tight py-4 col-4">
            <div class="card bg-white card-md">
                <div class="card-body  mx-4 ">
                    <h2 class="h2 text-center mb-4">Login</h2>
                    <form action="{{ route('login') }}" method="post" autocomplete="off" novalidate class="">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="" autocomplete="off">
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Senha
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password" class="form-control mb-2" placeholder=""
                                    autocomplete="off">
                            </div>
                            @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            <a href="#" class="link-offset-2 link-underline link-underline-opacity-0">Forgot
                                password</a>
                        </div>
                        <div class="form-footer text-center">
                            <button type="submit" class="btn btn-primary w-25 m-2">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center text-secondary mt-3">
        Ainda não possui uma conta? <a href="{{ route('register') }}" tabindex="-1"
            class="link-offset-2 link-underline link-underline-opacity-0">Registrar</a>
    </div>
@endsection
