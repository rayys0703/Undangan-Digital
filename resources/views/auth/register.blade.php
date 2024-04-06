@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center mt-16">

        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <a class="inline-flex justify-center items-center absolute w-10	h-10 p-2.5 m-2 rounded-full bg-slate-200 hover:bg-slate-100 shadow-2xl transition" href="{{ route('lp') }}">
                <svg class='fill-none rotate-90 stroke-black stroke-1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                    <g transform='translate(5.000000, 8.500000)'>
                        <path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path>
                    </g>
                </svg>
            </a>
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl text-center">
                    {{ __('Pendaftaran') }}
                </h1>
                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('register') }}" >
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Email')
                            }}</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('email') is-invalid @enderror"
                            placeholder="Masukkan email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Name') }}</label>
                        <input type="text" name="name" id="username" placeholder="Masukkan Nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required autocomplete="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Password')
                            }}</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('password') is-invalid @enderror"
                            placeholder="Masukkan Password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">{{
                            __('Konfirmasi Password') }}</label>
                        <input type="password" name="password_confirmation" id="confirm-password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Konfirmasi Password" required autocomplete="new-password">
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">{{
                        __('Daftar') }}</button>
                    <p class="text-sm font-light text-gray-500">
                        Sudah punya akun? <a href="{{ route('login') }}"
                            class="font-medium text-primary-600 hover:underline">Masuk</a>
                    </p>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
@endsection