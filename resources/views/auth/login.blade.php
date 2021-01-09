@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-50">
    <div class="w-96 bg-blue-900 rounded-lg shadow-lg p-6">

        <h1 class="text-white text-4xl mb-8">Login</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="relative">
                <label for="email" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">E-mail</label>

                <div>
                    <input id="email" type="email"
                        class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700  @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}"  autocomplete="email" autofocus
                        placeholder="your@gmail.com">

                    @error('email')
                    <span class="text-red-600 text-sm pt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-4">
                <label for="password"
                    class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Password</label>

                <div>
                    <input id="password" type="password"
                        class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700 @error('password') is-invalid @enderror"
                        name="password"  autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="text-red-600 text-sm pt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="pt-2">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="text-gray-100" for="remember" >
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="pt-6">
                <button type="submit" class="bg-gray-100 p-2 rounded uppercase text-blue-600 font-bold w-full">
                    Login
                </button>
            </div>
            <div class="flex justify-between pt-6 text-white text-sm font-bold">
                <a href="{{ route('password.request') }}">
                    Forgot Your Password ?
                </a>
                <a href="{{ route('register') }}">
                    Register
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
