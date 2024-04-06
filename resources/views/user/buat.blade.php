@extends('layouts.app')
@section('judul')
<span class="title-animation">Buat</span>
@endsection
@section('content')
<div class="flex flex-row justify-center pt-10">
    <div class="max-w-full md:max-w-[800px] mx-auto">
        <div class="flex flex-col bg-white m-auto p-2 rounded-2xl mb-5 shadow">
            <h1 class="flex py-5 lg:px-20 md:px-10 px-5 mx-auto font-bold text-lg md:text-2xl text-gray-800">
                Temukan Tema Pilihan Anda
            </h1>
            <div class="flex overflow-x-scroll pb-5">
                <div class="flex flex-nowrap mx-10 snap-x snap-mandatory overflow-x-auto">
                    <!-- For Each -->
                    @foreach ($templates as $t)
                    <div class="my-5 snap-center px-3">
                        <div class="flex font-sans w-[500px]">
                            <div class="flex-none w-56 relative scale-105 -rotate-1">
                                <img src="{{ asset('images/template/' . $t->image) }}" alt=""
                                    class="absolute inset-0 w-full h-[270px] object-cover shadow rounded-lg" loading="lazy" />
                            </div>
                            <form class="h-[270px] flex-auto p-6 bg-white rounded-e-2xl shadow">
                                <div class="flex flex-wrap">
                                    <h1 class="flex-auto font-medium text-xl text-slate-900">
                                        {{ $t->name }}
                                    </h1>
                                    <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
                                        Rp{{ $t->price }}
                                    </div>
                                </div>
                                <p class="mt-4 text-sm text-slate-500">
                                    {{ $t->desc }}
                                </p>
                                <div class="flex items-baseline mb-6 pb-6 border-b border-slate-200">

                                </div>
                                <div class="flex space-x-4 mb-5 text-sm font-medium">
                                    <div class="flex-auto flex space-x-4">
                                        <!--<button class="h-10 px-6 font-semibold rounded-full bg-violet-600 text-white" type="submit">
                                            Gunakan
                                        </button>-->

                                        @if ($t->price == 0)
                                        <a href="/tambah/edit/{{ $t->id }}"
                                            class="flex items-center h-10 px-6 font-semibold rounded-full bg-violet-600 text-white">
                                            Gunakan
                                        </a>
                                        @else
                                        @if ($t->price != 0 && isset($pembayaran->status) && $pembayaran->status == 'Belum Bayar')
                                        <a href="{{ route('pembayaran.index') }}"
                                            class="flex items-center justify-center h-10 px-6 font-semibold rounded-full bg-violet-600 text-white">
                                            Bayar
                                        </a>
                                        @elseif ($t->price != 0 && isset($pembayaran->status) && $pembayaran->status == 'Selesai')
                                        <a href="/tambah/edit/{{ $t->id }}"
                                            class="flex items-center h-10 px-6 font-semibold rounded-full bg-violet-600 text-white">
                                            Gunakan
                                        </a>
                                        @else
                                        <a href="/beli/{{ $t->id }}"
                                            class="flex items-center justify-center h-10 px-6 font-semibold rounded-full bg-violet-600 text-white">
                                            <svg class='flex-shrink-0 w-5 h-5 fill-none stroke-white stroke-[1.5] mr-1'
                                                xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                                                <g transform='translate(3.650200, 2.850200)'>
                                                    <path
                                                        d='M2.044,3.58024493 C7.3705141,2.243 13.9926469,2.32498848 15.5231061,4.06777179 C17.0535652,5.8105551 17.0220031,11.638 15.2330031,13.237 C13.4450031,14.836 5.68,14.988 3.22,13.237 C0.621,11.386 2.129,5.692 2.044,2.243 C2.095,0.313 -1.13686838e-13,0 -1.13686838e-13,0'>
                                                    </path>
                                                    <line x1='10.5059' y1='7.8696' x2='13.2789' y2='7.8696'></line>
                                                    <path
                                                        d='M3.6138,17.2773 C3.9138,17.2773 4.1578,17.5213 4.1578,17.8213 C4.1578,18.1223 3.9138,18.3663 3.6138,18.3663 C3.3128,18.3663 3.0688,18.1223 3.0688,17.8213 C3.0688,17.5213 3.3128,17.2773 3.6138,17.2773 Z'>
                                                    </path>
                                                    <path
                                                        d='M13.9453,17.2773 C14.2463,17.2773 14.4903,17.5213 14.4903,17.8213 C14.4903,18.1223 14.2463,18.3663 13.9453,18.3663 C13.6453,18.3663 13.4013,18.1223 13.4013,17.8213 C13.4013,17.5213 13.6453,17.2773 13.9453,17.2773 Z'>
                                                    </path>
                                                </g>
                                            </svg>
                                            Beli
                                        </a>
                                        @endif
                                        @endif
                                        <a href="{{ route('demonstrasi', ['id' => $t->id]) }}" target="_blank"
                                            class="flex items-center h-10 px-6 font-semibold rounded-full border border-slate-200 text-slate-900">
                                            Demo
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    <!-- End For Each -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection