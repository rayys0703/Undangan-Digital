@extends('layouts.app')
{{--@section('judul', 'Rayys — Formulir') --}}
@section('judul')
{{-- {!! config('app.name', 'Rayys') !!} <span class="title-animation"> — Beranda</span> --}}
<span class="title-animation">Ucapan & Doa</span>
@endsection
@section('content')
<div class="flex flex-col justify-center mx-auto w-4/5">

    <div class="hidden my-8">
        <a class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 shadow-md focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200"
            href="{{ route('tambah') }}">Buat</a>
    </div>

    <div class="hidden relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-all" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="p-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3" width="280px">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <section class="px-3 sm:px-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Judul Acara</th>
                                <th scope="col" class="px-4 py-3">Nama Tamu</th>
                                <th scope="col" class="px-4 py-3">Alamat</th>
                                <th scope="col" class="px-4 py-3">Ucapan / Doa</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr class="border-b">
                                <td class="px-4 py-3">
                                    {{ $loop->iteration }}
                                </td>
                                <td
                                    class="px-4 py-3 font-medium text-gray-900 flex gap-5 items-center">
                                    <img src="{{ asset('images/template/' . $d->image) }}"
                                        class="w-10 h-auto rounded-lg" loading="lazy" />
                                    <div class="flex flex-col gap-y-1"><span class="font-medium text-sm">{{
                                            $d->nama_acara }}</span><span class="font-normal text-xs">{{ $d->name
                                            }}</span></div>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $d->nama_tamu }}</td>
                                <td class="px-4 py-3">{{ $d->address }}</td>
                                <td class="px-4 py-3">{{ $d->content }}</td>
                                <td class="px-4 py-3">{{ $d->status }}</td>
                                <td class="px-4 py-3">
                                    <a href="/ucapan/hapus/{{ $d->id_tamu }}"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-sm px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection