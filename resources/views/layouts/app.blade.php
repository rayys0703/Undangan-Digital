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
                                    <a href="{{ route('profil') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Profil</a>
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
    @if(request()->path() !== 'setup')
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 sm:w-[170px] h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ url('/') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('beranda*')) bg-gray-100 @endif @if(request()->is('beranda*')) bg-gray-100 @endif">
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
                    <a href="{{ route('tambah') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('tambah*')) bg-gray-100 @endif">
                        <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-black stroke-[1.5]'
                            xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                            <g transform='translate(2.300000, 2.300000)'>
                                <line x1='9.73684179' y1='6.162632' x2='9.73684179' y2='13.3110531'>
                                </line>
                                <line x1='13.3146315' y1='9.73684179' x2='6.158842' y2='9.73684179'>
                                </line>
                                <path
                                    d='M-3.55271368e-14,9.73684211 C-3.55271368e-14,2.43473684 2.43473684,2.13162821e-14 9.73684211,2.13162821e-14 C17.0389474,2.13162821e-14 19.4736842,2.43473684 19.4736842,9.73684211 C19.4736842,17.0389474 17.0389474,19.4736842 9.73684211,19.4736842 C2.43473684,19.4736842 -3.55271368e-14,17.0389474 -3.55271368e-14,9.73684211 Z'>
                                </path>
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Buat') }}</span>
                        <span
                            class="@if(request()->is('tambah*')) hidden @endif inline-flex items-center justify-center px-2 py-1 ms-3 text-xs font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">New</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tautan') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('tautan*')) bg-gray-100 @endif">
                        <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-black stroke-[1.5]' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><g transform='translate(2.800000, 2.800000)'><path d='M8.69324995,9.63816777 C8.69324995,9.63816777 -3.28340005,7.16056777 0.878549946,4.75801777 C4.39069995,2.73071777 16.4946499,-0.75483223 18.1856499,0.14576777 C19.0862499,1.83676777 15.6006999,13.9407178 13.5733999,17.4528678 C11.1708499,21.6148178 8.69324995,9.63816777 8.69324995,9.63816777 Z'></path><line x1='8.69325' y1='9.638168' x2='18.18565' y2='0.145768'></line></g></svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Tautan') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('hadiah.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('hadiah*')) bg-gray-100 @endif">
                        <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-black stroke-[1.5]' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><g transform='translate(2.000000, 3.000000)'><path d='M19.1711429,11.6755238 L15.2844762,11.6755238 C13.8692381,11.6755238 12.721619,10.5279048 12.721619,9.11171429 C12.721619,7.69647619 13.8692381,6.54885714 15.2844762,6.54885714 L19.1406667,6.54885714'></path><line x1='15.722' y1='9.05314286' x2='15.4248571' y2='9.05314286'></line><line x1='5.60619048' y1='5.14371429' x2='9.66619048' y2='5.14371429'></line><path d='M0.714095238,9.25314286 C0.714095238,2.84838095 3.03885714,0.714095238 10.0150476,0.714095238 C16.9902857,0.714095238 19.3150476,2.84838095 19.3150476,9.25314286 C19.3150476,15.6569524 16.9902857,17.7921905 10.0150476,17.7921905 C3.03885714,17.7921905 0.714095238,15.6569524 0.714095238,9.25314286 Z'></path></g></svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Rek. u/ Gift') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ucapan') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('ucapan*')) bg-gray-100 @endif">
                        <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-black stroke-[1.5]' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><g transform='translate(2.000000, 2.000000)'><line x1='13.9394' y1='10.413' x2='13.9484' y2='10.413'></line><line x1='9.9304' y1='10.413' x2='9.9394' y2='10.413'></line><line x1='5.9214' y1='10.413' x2='5.9304' y2='10.413'></line><path d='M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z'></path></g></svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Ucapan') }}</span>
                    </a>
                </li>
                {{--<li>
                    <a href="{{ route('tamu.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('tamu*')) bg-gray-100 @endif">
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
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Tamu') }}</span>
                    </a>
                </li>--}}
                <li>
                    <a href="{{ route('pembayaran.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('pembayaran*')) bg-gray-100 @endif">
                        <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-black stroke-[1.5]' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><g transform='translate(3.650200, 2.850200)'><path d='M2.044,3.58024493 C7.3705141,2.243 13.9926469,2.32498848 15.5231061,4.06777179 C17.0535652,5.8105551 17.0220031,11.638 15.2330031,13.237 C13.4450031,14.836 5.68,14.988 3.22,13.237 C0.621,11.386 2.129,5.692 2.044,2.243 C2.095,0.313 -1.13686838e-13,0 -1.13686838e-13,0'></path><line x1='10.5059' y1='7.8696' x2='13.2789' y2='7.8696'></line><path d='M3.6138,17.2773 C3.9138,17.2773 4.1578,17.5213 4.1578,17.8213 C4.1578,18.1223 3.9138,18.3663 3.6138,18.3663 C3.3128,18.3663 3.0688,18.1223 3.0688,17.8213 C3.0688,17.5213 3.3128,17.2773 3.6138,17.2773 Z'></path><path d='M13.9453,17.2773 C14.2463,17.2773 14.4903,17.5213 14.4903,17.8213 C14.4903,18.1223 14.2463,18.3663 13.9453,18.3663 C13.6453,18.3663 13.4013,18.1223 13.4013,17.8213 C13.4013,17.5213 13.6453,17.2773 13.9453,17.2773 Z'></path></g></svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __('Pembayaran') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profil') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if(request()->is('profil*')) bg-gray-100 @endif">
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
    @endif
    @endauth

    <div class="p-4 @auth @if(request()->path() !== 'setup') sm:ml-[170px] @endif @endauth">
        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-16 border-none">
            @yield('content')
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    
    @auth
    <div class="fixed bottom-4 right-4 z-50 transition-transform duration-200 transform hover:scale-110">
        <a href="https://api.whatsapp.com/send?phone=6282126983296&text=Hai%2C%20Admin%20rare.in%21%0A%0ASaya%20ingin%20bertanya%20..." target="_blank">
            <img src="{{ asset('images/whatsapp-logo.png') }}" alt="WhatsApp Logo" class="w-12 h-auto rounded-full shadow-md">
        </a>
    </div>
    @endauth

</body>

</html>