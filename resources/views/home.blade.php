@extends('layouts.app')
{{--@section('judul', 'Rayys — Formulir') --}}
@section('judul')
{{-- {!! config('app.name', 'Rayys') !!} <span class="title-animation"> — Beranda</span> --}}
<span class="title-animation">Beranda</span>
@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="flex flex-col lg:flex-row justify-center w-full gap-5">

    <div class="flex flex-col max-w-[768px]">
        <div
            class="inline-grid sm:grid-cols-2 md:grid-cols-4 overflow-hidden w-full rounded-3xl bg-transparent md:bg-white shadow">

            <a href="{{ route('tambah') }}"
                class="inline-grid border-gray-200 md:border-e w-full p-4 sm:col-span-1 bg-white hover:bg-slate-50 md:bg-transparent sm:border-e gap-x-4 hover:scale-105 transition ease-in-out duration-200">
                <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="hidden inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                </div>
                <div class="col-start-1 whitespace-nowrap text-slate-500">Total Undangan</div>
                <div class="col-start-1 text-blue-600 whitespace-nowrap text-4xl font-extrabold my-2">{{
                    $totalUndangan }}</div>
                <div class="hidden col-start-1 text-slate-400 whitespace-nowrap text-xs">2 undangan aktif</div>
            </a>

            <a href="{{ route('pembayaran.index') }}"
                class="inline-grid border-gray-200 w-full p-4 sm:col-span-1 bg-white hover:bg-slate-50 md:bg-transparent border-t sm:border-0 md:border-e gap-x-4 hover:scale-105 transition ease-in-out duration-200">
                <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-pink-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="hidden inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="col-start-1 whitespace-nowrap text-slate-500">Total Transaksi</div>
                <div class="col-start-1 text-pink-500 whitespace-nowrap text-4xl font-extrabold my-2">{{
                    $totalTagihan }}</div>
                <div class="col-start-1 text-slate-400 whitespace-nowrap text-xs hidden"></div>
            </a>

            {{--<a href="{{ route('tamu.index') }}"
                class="inline-grid border-gray-200 w-full p-4 sm:col-span-1 bg-white hover:bg-slate-50 md:bg-transparent border-t sm:border-0 md:border-e gap-x-4 hover:scale-105 transition ease-in-out duration-200">
                <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-pink-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="hidden inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="col-start-1 whitespace-nowrap text-slate-500">Total Tamu</div>
                <div class="col-start-1 text-sky-700 whitespace-nowrap text-4xl font-extrabold my-2">{{
                    $totalTamu }}</div>
                <div class="col-start-1 text-slate-400 whitespace-nowrap text-xs hidden"></div>
            </a>--}}

            <a href="{{ route('ucapan') }}"
                class="inline-grid border-gray-200 border-t md:border-0 md:border-e w-full p-4 sm:col-span-2 md:col-span-1 bg-white hover:bg-slate-50 md:bg-transparent gap-x-4 hover:scale-105 transition ease-in-out duration-200">
                <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-teal-600">
                    <svg fill="none" class="hidden inline-block w-8 h-8 stroke-current stroke-2"
                        xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                        <g transform='translate(2.000000, 2.000000)'>
                            <line x1='13.9394' y1='10.413' x2='13.9484' y2='10.413'></line>
                            <line x1='9.9304' y1='10.413' x2='9.9394' y2='10.413'></line>
                            <line x1='5.9214' y1='10.413' x2='5.9304' y2='10.413'></line>
                            <path
                                d='M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z'>
                            </path>
                        </g>
                    </svg>
                </div>
                <div class="col-start-1 whitespace-nowrap text-slate-500">Ucapan & Do'a</div>
                <div class="col-start-1 text-teal-600 whitespace-nowrap text-4xl font-extrabold my-2">{{
                    $totalKomentar }}</div>
                <div class="col-start-1 text-slate-400 whitespace-nowrap text-xs hidden"></div>
            </a>

            <a href="{{ route('profil') }}"
                class="inline-grid border-gray-200 w-full p-4 sm:col-span-2 md:col-span-1 order-first md:order-last bg-white hover:bg-slate-50 md:bg-transparent border-b md:border-0 md:border-e gap-x-4 hover:scale-105 transition ease-in-out duration-200">
                <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-pink-500">
                    <div class="relative inline-flex ">
                        <div class="w-16 rounded-full">
                            @if (auth()->user()->image)
                            <img src="{{ asset(auth()->user()->image) }}" alt="Profile image">
                            @else
                            <img src="{{ asset('images/profile/default.webp') }}" alt="Profile image">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="text-gray-700 text-xl font-bold md:max-w-[10ch] md:text-ellipsis md:overflow-hidden">{{
                    Auth::user()->name }}</div>
                <div class="col-start-1 whitespace-nowrap text-slate-500 my-2">Pengguna</div>
                <div class="col-start-1 text-pink-500 whitespace-nowrap text-xs hidden"></div>
            </a>

        </div>

        {{--@forelse ($dataTemplate as $tmp)
        @if ($tmp->link !== null)
        <div class="card bg-white rounded-2xl p-5 pt-2 shadow mt-5">
            @foreach ($dataTemplate as $tmp)
            @if ($tmp->link !== null)
            <div class="text-sm mt-3" role="alert">
                {{ $loop->iteration }}. <span class="font-medium">{{ $tmp->nama_acara }}</span> - <a
                    class="text-blue-700 font-medium hover:text-blue-500" href="{{ url('play/' . $tmp->link) }}" target="_blank">Lihat hasil</a>
            </div>
            @endif
            @endforeach
        </div>
        @endif
        @empty
        @endforelse
        --}}
        <div class="card bg-white rounded-2xl p-5 shadow mt-5">
            <div class="font-bold text-slate-800 text-3xl text-center justify-center flex flex-col px-0"
                data-waktu="{{ isset($dataAcara->tanggal_akad) ? $dataAcara->tanggal_akad : '2023-12-12 12:00:00' }}"
                id="tampilan-waktu">

                <div class="grid grid-cols-4 gap-4">
                    <div class="col">
                        <h2 id="hari">0</h2>
                        <p class="text-sm font-medium">Hari</p>
                    </div>
                    <div class="col">
                        <h2 id="jam">0</h2>
                        <p class="text-sm font-medium">Jam</p>
                    </div>
                    <div class="col">
                        <h2 id="menit">0</h2>
                        <p class="text-sm font-medium">Menit</p>
                    </div>
                    <div class="col">
                        <h2 id="detik">0</h2>
                        <p class="text-sm font-medium">Detik</p>
                    </div>
                </div>
            </div>
            <script>
                let countDownDate = (new Date(document.getElementById('tampilan-waktu').getAttribute('data-waktu').replace(' ', 'T'))).getTime();

                setInterval(() => {
                    let now = new Date().getTime();
                    let distance = Math.abs(countDownDate - now);

                    if (now > countDownDate) {
                        document.getElementById('tampilan-waktu').innerHTML = "Acara Telah Selesai";
                        document.getElementById('tampilan-waktu').style.fontSize = "25px";
                    } else {
                        document.getElementById('hari').innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
                        document.getElementById('jam').innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        document.getElementById('menit').innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        document.getElementById('detik').innerText = Math.floor((distance % (1000 * 60)) / 1000);
                    }
                }, 1000);
            </script>
        </div>

        <div class="card bg-white rounded-2xl p-5 mt-5 shadow">
            <div class="flex flex-col sm:flex-col justify-between gap-0">
                <div class="flex p-4 w-full">
                    <div class="w-full">
                        <h3 class="font-medium text-lg text-gray-900 mt-0 mb-5">Data Acara</h3>

                        <div class="relative z-0 w-full mb-5 group">
                            <input value="{{ $dataAcara->nama_acara ?? 'Pernikahan Wahyu & Riski' }}" type="text"
                                disabled
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Judul Acara
                            </label>
                        </div>

                        <div class="w-full flex flex-col sm:flex-row gap-5 sm:gap-x-7">
                            <div class="relative z-0 w-full mb-5 group">
                                <input value="{{ $dataAcara->nama_pria ?? 'Wahyu' }}" type="text" disabled
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Nama Pria
                                </label>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                <input value="{{ $dataAcara->nama_wanita ?? 'Riski' }}" type="text" disabled
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Nama Wanita
                                </label>
                            </div>
                        </div>

                        <div class="w-full flex flex-col sm:flex-row gap-5 sm:gap-x-7">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" disabled
                                    value="{{ $dataAcara->bio_pria ?? 'Saya seorang UI/UX Designer' }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Biodata Pria
                                </label>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" disabled
                                    value="{{ $dataAcara->bio_wanita ?? 'Saya seorang SEO Specialist' }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Biodata Wanita
                                </label>
                            </div>
                        </div>

                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                        <div class="w-full flex flex-col sm:flex-row gap-5 sm:gap-x-7">
                            <div class="relative z-0 w-full mb-5 group">
                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input type="text" disabled
                                    value="{{ \Carbon\Carbon::parse($dataAcara->tanggal_akad)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}"
                                    placeholder="Tanggal dan waktu akad" id="akad"
                                    class="border-0 border-b-2 border-gray-300 text-gray-900 text-sm focus:border-blue-500 focus:outline-none focus:ring-0 block w-full ps-7 py-2.5 px-0 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-500 dark:text-white dark:focus:border-blue-500">
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 z-10 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Tanggal dan waktu akad
                                </label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" disabled
                                    value="{{ $dataAcara->tempat_akad ?? 'Hotel Bunga Indah Indramayu' }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Lokasi Akad
                                </label>
                            </div>
                        </div>

                        <div class="w-full flex flex-col sm:flex-row gap-5 sm:gap-x-7">
                            <div class="relative z-0 w-full mb-5 group">
                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input type="text" disabled
                                    value="{{ \Carbon\Carbon::parse($dataAcara->tanggal_resepsi)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}"
                                    placeholder="Tanggal dan waktu resepsi" id="resepsi"
                                    class="border-0 border-b-2 border-gray-300 text-gray-900 text-sm focus:border-blue-500 focus:outline-none focus:ring-0 block w-full ps-7 py-2.5 px-0 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-500 dark:text-white dark:focus:border-blue-500">
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 z-10 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Tanggal dan waktu resepsi
                                </label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" disabled
                                    value="{{ $dataAcara->tempat_resepsi ?? 'Hotel Bunga Indah Indramayu' }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Lokasi Resepsi
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="flex flex-col w-full lg:max-w-[300px] gap-y-5">
        <div
            class="w-full p-6 bg-white border border-gray-200 rounded-2xl shadow dark:bg-gray-800 dark:border-gray-700">
            <svg class="hidden w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
            </svg>
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Eh kamu.. Kapan
                    nikah? Nunggu jodoh turun dari langit? 🤣</h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Mending segera deh! Kami siap mendesain
                undangan pernikahan digital untuk Anda ;)</p>
            <a href="/demo/1" target="_blank" class="inline-flex items-center text-blue-600 hover:underline">
                Lihat demo
                <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                </svg>
            </a>
        </div>
        <div
            class="w-full h-fit p-6 bg-white border border-gray-200 rounded-2xl shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Statistik Tamu
            </h5>
            <canvas id="donutChart" width="100" height="100"></canvas>
            <script>
                var ctx = document.getElementById('donutChart').getContext('2d');
                var data = @json(array_values($countByKehadiran));
                var labels = @json(array_keys($countByKehadiran));
        
                var donutChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)', // Hadir
                                'rgba(255, 99, 132, 0.7)', // Tidak Hadir
                            ],
                        }],
                    },
                });
            </script>
        </div>
    </div>

</div>

@endsection