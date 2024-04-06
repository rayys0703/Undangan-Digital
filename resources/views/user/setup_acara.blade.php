@extends('layouts.app')
@section('judul')
<span class="title-animation">Lengkapi Formulir</span>
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/pasangan.css') }}">

<div class="w-full max-w-[700px] mx-auto mt-10 bg-white rounded-[5px] shadow py-4 px-6">
    <ol class="flex items-center w-full space-x-2 text-base font-medium text-center text-gray-500 sm:space-x-6">
        <li class="flex items-center">
            <span
                class="flex items-center justify-center w-6 h-6 me-2 text-xs border border-gray-500 rounded-full shrink-0">
                1
            </span>
            Mulai
        </li>
        <li class="flex items-center">
            <span
                class="flex items-center justify-center w-6 h-6 me-2 text-xs border border-gray-500 rounded-full shrink-0">
                2
            </span>
            Data <span class="hidden sm:inline-flex sm:ms-1">Pasangan</span>
        </li>
        <li class="flex items-center text-blue-600">
            <span
                class="flex items-center justify-center w-6 h-6 me-2 text-xs border border-blue-600 rounded-full shrink-0">
                3
            </span>
            Waktu & Lokasi Acara
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
                <h2 class="font-bold text-xl text-black mb-5">WAKTU & LOKASI ACARA</h2>
            </div>
            <div class="user-details flex-col !gap-2">
                <div class="input-box">
                    <span class="details">Tanggal & Waktu Akad</span>
                    <input type="datetime-local" name="tanggal_akad" id="tanggal_akad" placeholder="Tanggal Acara"
                    value="{{ $dataAcara->tanggal_akad ? \Carbon\Carbon::parse($dataAcara->tanggal_akad)->format('Y-m-d\TH:i') : '' }}" required>
                </div>
                <div class="input-box">
                    <span class="details">Tempat Akad</span>
                    <input type="text" name="tempat_akad" id="tempat_akad" placeholder="e.g. Hotel 1"
                        value="{{ $dataAcara->tempat_akad ?? '' }}" required>
                </div>
                <div class="input-box">
                    <span class="details">Link Maps Lokasi Akad</span>
                    <input type="text" name="link_tempat_akad" id="link_tempat_akad" placeholder="e.g. google.com/maps/..."
                        value="{{ $dataAcara->link_tempat_akad ?? '' }}" required>
                </div>
                <div class="input-box">
                    <span class="details">Tanggal & Waktu Resepsi (Mulai)</span>
                    <input type="datetime-local" name="tanggal_resepsi" id="tanggal_resepsi" placeholder="Tanggal Acara"
                    value="{{ $dataAcara->tanggal_resepsi ? \Carbon\Carbon::parse($dataAcara->tanggal_resepsi)->format('Y-m-d\TH:i') : '' }}" required>
                </div>
                <div class="input-box">
                    <span class="details">Tanggal & Waktu Resepsi (Selesai)</span>
                    <input type="datetime-local" name="tanggal_resepsi2" id="tanggal_resepsi2" placeholder="Tanggal Acara"
                    value="{{ $dataAcara->tanggal_resepsi2 ? \Carbon\Carbon::parse($dataAcara->tanggal_resepsi2)->format('Y-m-d\TH:i') : '' }}" required>
                </div>
                <div class="input-box">
                    <span class="details">Tempat Resepsi</span>
                    <input type="text" name="tempat_resepsi" id="tempat_resepsi" placeholder="e.g. Hotel 2"
                    value="{{ $dataAcara->tempat_resepsi }}" required>
                </div>
                <div class="input-box">
                    <span class="details">Link Maps Lokasi Resepsi</span>
                    <input type="text" name="link_tempat_resepsi" id="link_tempat_resepsi" placeholder="e.g. google.com/maps/..."
                        value="{{ $dataAcara->link_tempat_resepsi ?? '' }}" required>
                </div>
                <div class="flex items-center">
                    <input id="sama_dengan_akad" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="sama_dengan_akad" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gunakan Tanggal & Tempat Resepsi yang Sama dengan Akad</label>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Lanjut">
            </div>
        </div>
    </form>
    <script>
        document.getElementById('sama_dengan_akad').addEventListener('change', function () {
            var tanggalAkad = document.getElementById('tanggal_akad').value;
            var tempatAkad = document.getElementById('tempat_akad').value;
            var linktempatAkad = document.getElementById('link_tempat_akad').value;

            if (this.checked) {
                // Jika checkbox dicentang, set nilai Tanggal & Waktu Resepsi dan Tempat Resepsi sama dengan Tanggal & Waktu Akad dan Tempat Akad
                document.getElementById('tanggal_resepsi').value = tanggalAkad;
                document.getElementById('tempat_resepsi').value = tempatAkad;
                document.getElementById('tempat_resepsi').readOnly = true;
                document.getElementById('tempat_resepsi').classList.add('bg-gray-100','cursor-not-allowed');
                document.getElementById('link_tempat_resepsi').value = linktempatAkad;
                document.getElementById('link_tempat_resepsi').readOnly = true;
                document.getElementById('link_tempat_resepsi').classList.add('bg-gray-100','cursor-not-allowed');
            } else {
                // Jika checkbox tidak dicentang, reset nilai Tanggal & Waktu Resepsi dan Tempat Resepsi
                document.getElementById('tanggal_resepsi').value = '';
                document.getElementById('tempat_resepsi').value = '';
                document.getElementById('tempat_resepsi').readOnly = false;
                document.getElementById('tempat_resepsi').classList.remove('bg-gray-100','cursor-not-allowed');
                document.getElementById('link_tempat_resepsi').value = '';
                document.getElementById('link_tempat_resepsi').readOnly = false;
                document.getElementById('link_tempat_resepsi').classList.remove('bg-gray-100','cursor-not-allowed');
            }
        });
        document.getElementById('tanggal_resepsi').addEventListener('change', function () {
            var tanggalResepsiValue = this.value;

            // Dapatkan nilai jam dan menit dari tanggal resepsi
            var jamResepsi = new Date(tanggalResepsiValue).getHours();
            var menitResepsi = new Date(tanggalResepsiValue).getMinutes();

            // Set nilai pada input tanggal resepsi2 dengan waktu yang berbeda (contoh: +1 jam)
            var tanggalResepsi2Value = new Date(tanggalResepsiValue);
            tanggalResepsi2Value.setHours(jamResepsi + 1); // Ganti +1 dengan offset waktu yang diinginkan
            tanggalResepsi2Value.setMinutes(menitResepsi);
            document.getElementById('tanggal_resepsi2').value = tanggalResepsi2Value.toISOString().slice(0, 16);
        });
    </script>
</div>
@endsection