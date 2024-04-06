@extends('layouts.app')
{{--@section('judul', 'Rayys — Formulir') --}}
@section('judul')
{{-- {!! config('app.name', 'Rayys') !!} <span class="title-animation"> — Beranda</span> --}}
<span class="title-animation">Proses Pembayaran</span>
@endsection
@section('content')
<div class="max-w-[768px] mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
        <form method="post" action="{{ route('pembayaran.store') }}" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" name="id" value="{{ $pembayaran->id }}">
            <div>
                <label for="nama">Nama Pemesan</label>
                <input id="nama" type="text" value="{{ Auth::user()->name }}" disabled
                    class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <div>
                <label for="template">Nama Template</label>
                <input id="template" type="text" value="{{ $pembayaran->nama_template }}" disabled
                    class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <div>
                <label for="tanggal">Tanggal Pemesanan</label>
                <input id="date" type="datetime" value="{{ \Carbon\Carbon::parse($pembayaran->tanggal_pemesanan)->format('Y-m-d') }}" disabled
                    class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div>
                <label for="tagihan">Jumlah Tagihan</label>
                <input id="tagihan" type="text" value="Rp {{ $pembayaran->jumlah_tagihan }}" disabled
                    class="bg-gray-50 mt-2 border border-gray-300 font-medium text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Bayar sesuai nominal di atas. Tidak boleh kurang atau lebih.</p>
            </div>


            <div>
                <label for="metode">Metode Pembayaran</label>
                <select id="metode" name="metode_pembayaran"
                    class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>Pilih metode pembayaran</option>
                    <option value="DANA">Dana</option>
                    {{--<option value="GOPAY">GOPAY</option>
                    <option value="SHOPEEPAY">SHOPEEPAY</option>--}}
                </select>
            </div>

            <div id="gambarMetodePembayaran" class="mt-4"></div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var metodePembayaranSelect = document.getElementById('metode');
                    var gambarMetodePembayaran = document.getElementById('gambarMetodePembayaran');
            
                    metodePembayaranSelect.addEventListener('change', function () {
                        var selectedMetode = metodePembayaranSelect.value;
                        gambarMetodePembayaran.innerHTML = '';
            
                        var namaGambar;
                        switch (selectedMetode) {
                            case 'DANA':
                                namaGambar = 'dana.jpg';
                                break;
                            case 'GOPAY':
                                namaGambar = 'gopay.jpg';
                                break;
                            case 'SHOPEEPAY':
                                namaGambar = 'shopeepay.jpg';
                                break;
                            default:
                                namaGambar = 'default.jpg';
                                break;
                        }
            
                        var img = document.createElement('img');
                        img.src = '{{ asset('images/pembayaran') }}' + '/' + namaGambar;
                        img.alt = 'Metode Pembayaran';
                        img.className = 'md:max-w-[400px] h-auto rounded-2xl';
                        gambarMetodePembayaran.appendChild(img);
                    });
                });
            </script>

            <div>
                <label for="file_input">Bukti Pembayaran</label>
                <input
                    name="gambar" class="block w-full mt-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file">
                <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Harap sertakan bukti pembayaran yang valid.</p>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection