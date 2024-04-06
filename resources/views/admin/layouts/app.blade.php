<!doctype html>
<html data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'rare.in') }} - Undangan Pernikahan Digital Paling Unik!</title>
    <link rel="icon" type="image/x-icon" href="https://feeldreams.github.io/main-icon.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />

    {{--
    <link href="{{ asset('/css/daisyUI.css') }}" rel="stylesheet" type="text/css" />--}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">

</head>
<style>

</style>

<body>

    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="/" class="flex ms-2 sm:me-16">
                        <img src="https://feeldreams.github.io/main-icon.png" class="h-8 me-3 rotate-on-load"
                            alt="rare.in" />
                        <span
                            class="slide-on-load self-center text-xl font-semibold sm:text-lg whitespace-nowrap dark:text-white">{{
                            config('app.name','rare.in') }}</span>
                    </a>
                    <span class="hidden sm:flex text-lg font-semibold">@yield('judul')</span>
                </div>
                @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="{{ asset(auth()->user()->image) }}"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="{{ route('admin.pengaturan.index') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Pengaturan</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Keluar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    @if(session('success'))
    <div class="flex items-center justify-center">
        <div id="toast-success"
            class="fixed top-5 sm:right-5 flex items-center w-[90%] md:w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-2xl shadow dark:text-gray-400 dark:bg-gray-800 z-50 transition"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-2xl dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>

    <script>
        var navElement = document.querySelector("nav");
      var navHeight = navElement.clientHeight;
      var toastElement = document.querySelector("#toast-success");
      toastElement.style.marginTop = navHeight + "px";
      setTimeout(function() {
      toastElement.style.transform = "translateY(calc(-100%))";
      toastElement.style.opacity = "0";
      setTimeout(function() {
        toastElement.style.display = "none";
      }, 100);
    }, 3000);
    </script>
    @endif

    @auth
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 sm:w-[170px] h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ url('/') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('admin')) bg-gray-100 @endif">
                        <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-black stroke-[1.5]'
                            xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                            <g transform='translate(2.400000, 2.000000)'>
                                <line x1='6.6787' y1='14.1354' x2='12.4937' y2='14.1354'></line>
                                <path
                                    d='M1.24344979e-14,11.713 C1.24344979e-14,6.082 0.614,6.475 3.919,3.41 C5.365,2.246 7.615,0 9.558,0 C11.5,0 13.795,2.235 15.254,3.41 C18.559,6.475 19.172,6.082 19.172,11.713 C19.172,20 17.213,20 9.586,20 C1.959,20 1.24344979e-14,20 1.24344979e-14,11.713 Z'>
                                </path>
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap font-medium">{{ __('Beranda') }}</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">2</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('template.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('admin/template*')) bg-gray-100 @endif">
                        <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-black stroke-[1.5]'
                            xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                            <g>
                                <rect x='5.54615' y='5.54615' width='16.45385' height='16.45385' rx='4'></rect>
                                <path d='M171.33311,181.3216v-8.45385a4,4,0,0,1,4-4H183.787'
                                    transform='translate(-169.33311 -166.86775)'></path>
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Template') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('audio.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('admin/audio*')) bg-gray-100 @endif">
                        <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-black stroke-[1.5]' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><g transform='translate(2.000000, 2.000000)'><path d='M0.75,10.0001 C0.75,16.9371 3.063,19.2501 10,19.2501 C16.937,19.2501 19.25,16.9371 19.25,10.0001 C19.25,3.0631 16.937,0.7501 10,0.7501 C3.063,0.7501 0.75,3.0631 0.75,10.0001 Z' ></path><path d='M13.416,9.8555 C13.416,8.9515 8.832,6.0595 8.312,6.5795 C7.793,7.0995 7.742,12.5625 8.312,13.1315 C8.883,13.7025 13.416,10.7595 13.416,9.8555 Z'></path></g></svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('BG Music') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cruduser.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('admin/pengguna*')) bg-gray-100 @endif">
                        <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-black stroke-[1.5]'
                            xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                            <g transform='translate(1.000000, 3.000000)'>
                                <path
                                    d='M10.9725,17.3682 C7.7335,17.3682 4.9665,16.8782 4.9665,14.9162 C4.9665,12.9542 7.7155,11.2462 10.9725,11.2462 C14.2115,11.2462 16.9785,12.9382 16.9785,14.8992 C16.9785,16.8602 14.2295,17.3682 10.9725,17.3682 Z'>
                                </path>
                                <path
                                    d='M10.9725,8.4487 C13.0985,8.4487 14.8225,6.7257 14.8225,4.5997 C14.8225,2.4737 13.0985,0.7497 10.9725,0.7497 C8.8465,0.7497 7.12248426,2.4737 7.12248426,4.5997 C7.1165,6.7177 8.8265,8.4417 10.9455,8.4487 L10.9725,8.4487 Z'>
                                </path>
                                <path
                                    d='M17.3622,7.3916 C18.5992,7.0606 19.5112,5.9326 19.5112,4.5896 C19.5112,3.1886 18.5182,2.0186 17.1962,1.7486'>
                                </path>
                                <path
                                    d='M17.9432,10.5444 C19.6972,10.5444 21.1952,11.7334 21.1952,12.7954 C21.1952,13.4204 20.6782,14.1014 19.8942,14.2854'>
                                </path>
                                <path
                                    d='M4.5838,7.3916 C3.3458,7.0606 2.4338,5.9326 2.4338,4.5896 C2.4338,3.1886 3.4278,2.0186 4.7488,1.7486'>
                                </path>
                                <path
                                    d='M4.0018,10.5444 C2.2478,10.5444 0.7498,11.7334 0.7498,12.7954 C0.7498,13.4204 1.2668,14.1014 2.0518,14.2854'>
                                </path>
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Pengguna') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaksi') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('admin/transaksi*')) bg-gray-100 @endif">
                        <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-black stroke-[1.5]' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><g transform='translate(3.650200, 2.850200)'><path d='M2.044,3.58024493 C7.3705141,2.243 13.9926469,2.32498848 15.5231061,4.06777179 C17.0535652,5.8105551 17.0220031,11.638 15.2330031,13.237 C13.4450031,14.836 5.68,14.988 3.22,13.237 C0.621,11.386 2.129,5.692 2.044,2.243 C2.095,0.313 -1.13686838e-13,0 -1.13686838e-13,0'></path><line x1='10.5059' y1='7.8696' x2='13.2789' y2='7.8696'></line><path d='M3.6138,17.2773 C3.9138,17.2773 4.1578,17.5213 4.1578,17.8213 C4.1578,18.1223 3.9138,18.3663 3.6138,18.3663 C3.3128,18.3663 3.0688,18.1223 3.0688,17.8213 C3.0688,17.5213 3.3128,17.2773 3.6138,17.2773 Z'></path><path d='M13.9453,17.2773 C14.2463,17.2773 14.4903,17.5213 14.4903,17.8213 C14.4903,18.1223 14.2463,18.3663 13.9453,18.3663 C13.6453,18.3663 13.4013,18.1223 13.4013,17.8213 C13.4013,17.5213 13.6453,17.2773 13.9453,17.2773 Z'></path></g></svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Transaksi') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pengaturan.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('admin/pengaturan*')) bg-gray-100 @endif">
                        <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-black stroke-[1.5]'
                            xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                            <g transform='translate(4.000000, 4.000000)'>
                                <line x1='7.14366842' y1='13.8828263' x2='0.671142105' y2='13.8828263'></line>
                                <path
                                    d='M11.2049684,13.8837211 C11.2049684,15.9255105 11.8858632,16.6055105 13.9267579,16.6055105 C15.9676526,16.6055105 16.6485474,15.9255105 16.6485474,13.8837211 C16.6485474,11.8419316 15.9676526,11.1619316 13.9267579,11.1619316 C11.8858632,11.1619316 11.2049684,11.8419316 11.2049684,13.8837211 Z'>
                                </path>
                                <line x1='10.1765579' y1='3.39418421' x2='16.6481895' y2='3.39418421'></line>
                                <path
                                    d='M6.11525789,3.39284211 C6.11525789,1.35194737 5.43436316,0.671052632 3.39346842,0.671052632 C1.35167895,0.671052632 0.670784211,1.35194737 0.670784211,3.39284211 C0.670784211,5.43463158 1.35167895,6.11463158 3.39346842,6.11463158 C5.43436316,6.11463158 6.11525789,5.43463158 6.11525789,3.39284211 Z'>
                                </path>
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Pengaturan') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    @endauth

    <div class="p-4 @auth @if(request()->path() !== 'setup') sm:ml-[170px] @endif @endauth">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-16 border-none">
            @yield('content')
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>

</body>

</html>