@extends('layouts.app')
@section('judul')
<span class="title-animation">Lengkapi Formulir</span>
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/pasangan.css') }}">

<div class="w-full max-w-[700px] mx-auto mt-10 bg-white rounded-[5px] shadow py-4 px-6">

    <ol class="flex items-center w-full space-x-2 text-base font-medium text-center text-gray-500 sm:space-x-6">
        <li class="flex items-center text-blue-600">
            <span
                class="flex items-center justify-center w-6 h-6 me-2 text-xs border border-blue-600 rounded-full shrink-0">
                1
            </span>
            Mulai
        </li>
        <li class="flex items-center">
            <span
                class="flex items-center justify-center w-6 h-6 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                2
            </span>
            Data <span class="hidden sm:inline-flex sm:ms-1">Pasangan</span>
        </li>
        <li class="flex items-center">
            <span
                class="flex items-center justify-center w-6 h-6 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                3
            </span>
            Lokasi Acara
        </li>
    </ol>

    <ol class="flex hidden items-center text-center justify-center w-full">
        <li class="flex w-full text-center text-blue-600">
            Mulai
        </li>
        <li class="flex w-full text-center">
            Data Pasangan
        </li>
        <li class="flex text-center">
            Selesai
        </li>
    </ol>

    <ol class="flex hidden items-center justify-center w-full mt-2">
        <li
            class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
            <span class="flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full shrink-0">
                <svg class="w-[14px] h-[14px] text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 16 12">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5.917 5.724 10.5 15 1.5" />
                </svg>
            </span>
        </li>
        <li
            class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
            <span class="flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full shrink-0">
                <svg class="w-[14px] h-[14px] text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 16">
                    <path
                        d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                </svg>
            </span>
        </li>
        <li class="flex items-center">
            <span class="flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full shrink-0">
                <svg class="w-[14px] h-[14px] text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 18 20">
                    <path
                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                </svg>
            </span>
        </li>
    </ol>
</div>

<div class="container-cus mx-auto mt-5 shadow">
    <form method="POST" action="{{ route('setup.store') }}">
        @csrf
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3" role="alert">
            <strong class="font-bold">Validation Error</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
        </div>
        @endif
        <div class="content-cus">
            <div class="flex flex-col items-center justify-center">
                <h2 class="font-bold text-xl text-black mb-5">DATA ACARA</h2>
            </div>
            <div class="user-details flex-col !gap-4">
                <div class="input-box">
                    <span class="details">Nama Acara</span>
                    <input type="text" name="nama_acara" placeholder=""
                        value="{{ $dataAcara->nama_acara ?? '' }}" required>
                </div>
                {{--<div class="input-box">
                    <span class="details">Tanggal & Waktu Acara</span>
                    <input type="datetime-local" name="tanggal_akad" placeholder="Tanggal Acara"
                    value="{{ $dataAcara->tanggal_akad ? \Carbon\Carbon::parse($dataAcara->tanggal_akad)->format('Y-m-d\TH:i') : '' }}" required>
                </div>--}}
            </div>
            <div class="button">
                <input type="submit" value="Lanjut">
            </div>
        </div>
    </form>
</div>
@endsection