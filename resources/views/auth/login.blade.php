{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}



@extends('admin.base-login')
@section('login')
@section('title', 'Login')
<body class="login">
	<div class="wrapper wrapper-login wrapper-login-full p-0" style=" background-image: url('assets/img/umkm-3.jpg');background-size: cover;background-repeat: no-repeat;background-position: center center;">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center"  >
			<h1 class="title fw-bold text-light mb-3">Rasio Kewirausahaan</h1>
			<p class="subtitle fw-bold text-light op-7">Kementerian Koperasi Dan UMKM</p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
			<div class="container container-login container-transparent animated fadeIn">
                <img src="{{asset('assets/img/kemenkop.png')}}"  width="300" height="80" alt="navbar brand" class="navbar-brand center">
                <br><br>
				<h3 class="text-center">Silahkan Login</h3>
                   <!-- Session Status -->
                    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

                    {{-- <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="login-form">
                        <div class="form-group">
                            <label for="username" class="placeholder"><b>Username</b></label>
                            <input id="username" name="username" type="text" class="form-control"  required>
                            @error('username')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="placeholder"><b>Password</b></label>
                            <div class="position-relative">
                                <input id="password" name="password" type="password" class="form-control" autocomplete="current-password" required>
                                <div class="show-password">
                                    <i class="icon-eye"></i>
                                </div>
                                @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-action-d-flex mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                            </div>
                            <button class="btn btn-success col-md-5 float-right mt-3 mt-sm-0 fw-bold">Login</button>
                        </div>
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </div>
                </form>
			</div>
		</div>
	</div>
</body>
@endsection


@push('script')

@endpush
