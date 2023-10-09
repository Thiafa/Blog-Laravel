@extends('layouts.app')

@section('content')
    <div class=" page page-center">
        <div class="container container-tight py-4">
            <form class="card bg-white card-md" action="{{ route('register') }}" method="post" autocomplete="off" novalidate>
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Register</h2>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter name">
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                autocomplete="off">
                        </div>
                        @error('password')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmation Password</label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirmation Password" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Create new account</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-secondary mt-3">
                Already have account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
            </div>
        </div>
    </div>
@endsection
