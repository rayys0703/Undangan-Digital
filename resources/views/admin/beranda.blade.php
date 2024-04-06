@extends('admin/layouts.app')
@section('judul')
<span class="title-animation">Beranda</span>
@endsection
@section('content')
<div class="hidden flex flex-row">
    <h1 class="text-2xl font-bold text-gray-700">Selamat datang kembali, {{ Auth::user()->name }}!</h1>
</div>
<div class="flex flex-col lg:flex-row justify-center w-full gap-5">

    <div class="flex flex-col max-w-[768px]">
        <div
            class="inline-grid sm:grid-cols-2 md:grid-cols-4 overflow-hidden w-full rounded-3xl bg-transparent md:bg-white shadow">

            <a href="{{ route('cruduser.index') }}"
                class="inline-grid border-gray-200 md:border-e w-full p-4 sm:col-span-1 bg-white hover:bg-slate-50 md:bg-transparent sm:border-e gap-x-4 hover:scale-105 transition ease-in-out duration-200">
                <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="hidden inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                </div>
                <div class="col-start-1 whitespace-nowrap text-slate-500">Total Pengguna</div>
                <div class="col-start-1 text-blue-600 whitespace-nowrap text-4xl font-extrabold my-2">{{ $userCount }}
                </div>
                <div class="hidden col-start-1 text-slate-400 whitespace-nowrap text-xs"></div>
            </a>

            <a href="{{ route('template.index') }}"
                class="inline-grid border-gray-200 w-full p-4 sm:col-span-1 bg-white hover:bg-slate-50 md:bg-transparent border-t sm:border-0 md:border-e gap-x-4 hover:scale-105 transition ease-in-out duration-200">
                <div class="col-start-2 row-span-3 row-start-1 place-self-center justify-self-end text-pink-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="hidden inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="col-start-1 whitespace-nowrap text-slate-500">Total Template</div>
                <div class="col-start-1 text-pink-500 whitespace-nowrap text-4xl font-extrabold my-2">{{ $templateCount
                    }}</div>
                <div class="col-start-1 text-slate-400 whitespace-nowrap text-xs hidden"></div>
            </a>

            <a href="{{ route('transaksi') }}"
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
                <div class="col-start-1 whitespace-nowrap text-slate-500">Transaksi</div>
                <div class="col-start-1 text-teal-600 whitespace-nowrap text-4xl font-extrabold my-2">{{ $totalTagihan }}</div>
                <div class="col-start-1 text-slate-400 whitespace-nowrap text-xs hidden"></div>
            </a>

            <a href="{{ route('admin.pengaturan.index') }}"
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
                <div class="col-start-1 whitespace-nowrap text-slate-500 my-2">Admin</div>
                <div class="col-start-1 text-pink-500 whitespace-nowrap text-xs hidden"></div>
            </a>

        </div>

        <div class="mt-5 w-full p-6 bg-white border border-gray-200 rounded-2xl shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-lg font-bold leading-none text-gray-900 dark:text-white">Pengguna Terakhir</h5>
                <a href="{{ route('cruduser.index') }}"
                    class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    Tampilkan
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($latestUser as $d)
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="{{ asset($d->image) }}"
                                    alt="{{ $d->name }}">
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $d->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $d->email }}
                                </p>
                            </div>
                            <div
                                class="hidden inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $320
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="flex flex-col w-full lg:max-w-[300px] gap-y-5">

        <div
            class="w-full h-fit p-6 bg-white border border-gray-200 rounded-2xl shadow dark:bg-gray-800 dark:border-gray-700">

            <div class="flex items-center justify-between mb-4">
                <h5 class="text-lg font-bold leading-none text-gray-900 dark:text-white">Rating Situs</h5>
            </div>
            <div class="flex items-center mb-2">

                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 22 20">
                    <path
                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 22 20">
                    <path
                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 22 20">
                    <path
                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 22 20">
                    <path
                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
                <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path
                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">4.95</p>
                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
            </div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">1,745 global ratings</p>
            <div class="flex items-center mt-4">
                <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">5 star</a>
                <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                    <div class="h-5 bg-yellow-300 rounded" style="width: 70%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">70%</span>
            </div>
            <div class="flex items-center mt-4">
                <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">4 star</a>
                <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                    <div class="h-5 bg-yellow-300 rounded" style="width: 17%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">17%</span>
            </div>
            <div class="flex items-center mt-4">
                <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">3 star</a>
                <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                    <div class="h-5 bg-yellow-300 rounded" style="width: 8%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8%</span>
            </div>
            <div class="flex items-center mt-4">
                <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">2 star</a>
                <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                    <div class="h-5 bg-yellow-300 rounded" style="width: 4%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">4%</span>
            </div>
            <div class="flex items-center mt-4">
                <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">1 star</a>
                <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                    <div class="h-5 bg-yellow-300 rounded" style="width: 1%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">1%</span>
            </div>

        </div>
    </div>

</div>

@endsection