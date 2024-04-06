@extends('admin/layouts.app')
{{--@section('judul', 'Rayys — Formulir') --}}
@section('judul')
{{-- {!! config('app.name', 'Rayys') !!} <span class="title-animation"> — Beranda</span> --}}
<span class="title-animation">Transaksi</span>
@endsection
@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">

                    <div class="overflow-hidden mb-6">
                        <table class="min-w-full w-full">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        No
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Pengguna
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Nama Template
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Tanggal Pemesanan
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Jumlah Tagihan
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Status
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Bukti
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $d)
                                <tr class="border-b">
                                    <td class="text-sm text-slate-800 font-medium px-6 py-4 whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-sm text-slate-800 font-medium px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-col gap-y-1"><span class="font-medium text-sm">{{
                                                $d->nama_user }}</span><span class="font-medium text-xs">{{
                                                $d->email_user }}</span></div>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 flex gap-5 items-center">
                                        <img src="{{ asset('images/template/' . $d->image) }}"
                                            class="w-8 h-auto rounded-lg" loading="lazy" />
                                        <div class="flex flex-col gap-y-1"><span class="font-medium text-sm">{{
                                                $d->nama_template }}</span></div>
                                    </td>
                                    <td class="text-sm text-slate-800 font-medium px-6 py-4 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($d->tanggal_pemesanan)->locale('id')->isoFormat('dddd,
                                        DD MMMM YYYY') }}
                                    </td>
                                    <td class="text-sm text-slate-800 font-medium px-6 py-4 whitespace-nowrap">
                                        {{ "Rp" . number_format($d->jumlah_tagihan,2,',','.') }}
                                    </td>
                                    <td class="text-sm text-slate-800 font-medium px-6 py-4 whitespace-nowrap">
                                        @if ($d->metode_pembayaran != NULL && $d->gambar != NULL && $d->status != 'Selesai')
                                        Perlu Konfirmasi
                                        @else
                                        {{ $d->status }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        <img src="{{ asset($d->gambar) }}"
                                            class="cursor-pointer hover:opacity-[.8] w-10 h-auto rounded-lg"
                                            loading="lazy" data-modal-target="modalBukti" data-modal-toggle="modalBukti"
                                            onclick="openModal('{{ asset($d->gambar) }}')" />
                                    </td>
                                    <td class="text-sm text-slate-800 font-medium px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('transaksi.konfirmasi') }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="id" value="{{ $d->id }}">
                                            <button type="submit"
                                                class="@if ($d->status == 'Selesai') cursor-not-allowed @endif px-6 py-2 bg-gray-800 border border-transparent text-xs rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 transition ease-in-out duration-150">
                                                @if ($d->status == 'Selesai') TERKONFIRMASI @else KONFIRMASI @endif
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Main modal -->
                        <div id="modalBukti" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Bukti Pembayaran
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="modalBukti">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4 flex justify-center items-center">
                                        <img id="modalImage" class="w-[200px] h-auto rounded-lg" loading="lazy" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function openModal(imageSrc) {
                              var modalImage = document.getElementById("modalImage");
                          
                              modalImage.src = imageSrc;
                            }
                        </script>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection