@extends('layouts.app')

@section('judul')
<span class="title-animation">Profil</span>
@endsection

@section('content')
<div class="container mx-auto">

    <div class="flex justify-center">
        <div class="w-full md:w-1/2">
            <div class="card bg-white rounded-2xl p-5 shadow">
                <div class="flex items-center">
                    <div class="flex p-4 rounded-2xl bg-slate-50 w-full">
                        <div class="flex items-center flex-shrink-0">
                            @if (auth()->user()->image)
                            <img src="{{ asset(auth()->user()->image) }}" class="w-16 h-16 rounded-full"
                                alt="Profile image">
                            @else
                            <img src="{{ asset('images/profile/default.webp') }}" class="w-16 h-16 rounded-full"
                                alt="Profile image">
                            @endif
                            <div class="mb-2 mr-2">
                                <!-- SVG Upload Icon -->
                                <label for="image"
                                    class="absolute cursor-pointer ml-[-18px] mt-[8px] p-1 bg-white rounded-3xl shadow hover:bg-blue-50">
                                    <svg class='stroke-1 fill-none stroke-black w-5 h-5'
                                        xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                                        <g transform='translate(2.500000, 3.042105)'>
                                            <path
                                                d='M12.9381053,9.456 C12.9381053,7.71915789 11.5296842,6.31073684 9.79284211,6.31073684 C8.056,6.31073684 6.64757895,7.71915789 6.64757895,9.456 C6.64757895,11.1928421 8.056,12.6012632 9.79284211,12.6012632 C11.5296842,12.6012632 12.9381053,11.1928421 12.9381053,9.456 Z'>
                                            </path>
                                            <path
                                                d='M9.79252632,17.158 C17.8377895,17.158 18.7956842,14.7474737 18.7956842,9.52431579 C18.7956842,5.86326316 18.3114737,3.90431579 15.262,3.06221053 C14.982,2.97378947 14.6714737,2.80536842 14.4198947,2.52852632 C14.0135789,2.08326316 13.7167368,0.715894737 12.7356842,0.302210526 C11.7546316,-0.110421053 7.81463158,-0.0914736842 6.84936842,0.302210526 C5.88515789,0.696947368 5.57147368,2.08326316 5.16515789,2.52852632 C4.91357895,2.80536842 4.60410526,2.97378947 4.32305263,3.06221053 C1.27357895,3.90431579 0.789368421,5.86326316 0.789368421,9.52431579 C0.789368421,14.7474737 1.74726316,17.158 9.79252632,17.158 Z'>
                                            </path>
                                            <line x1='14.7045' y1='5.957895' x2='14.7135' y2='5.957895'></line>
                                        </g>
                                    </svg>
                                </label>

                                <form id="uploadForm" action="{{ route('upload.profile.image') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image" id="image" class="hidden">
                                </form>
                            </div>
                        </div>
                        <div class="my-auto	flex-grow ml-4">
                            <h1 class="text-xl font-bold">{{ Auth::user()->name }}</h1>
                            <p class="text-sm">{{ Auth::user()->email }}</p>
                        </div>
                        @error('image')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="flex justify-center mt-4">
        <div class="w-full md:w-8/12 lg:w-6/12">
            <div class="bg-white shadow-md rounded-2xl p-5 mb-4">
                <div class="mb-4 text-xl font-bold hidden">Update Profile</div>

                <form method="POST" action="{{ route('profile.update') }}">
                    @method('patch')
                    @csrf

                    <div class="mb-6">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                        <input type="text" id="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-500 @enderror"
                            name="name" value="{{ old('name', $user->name) }}" autocomplete="name">
                        @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('email') border-red-500 @enderror"
                            name="email" value="{{ old('email', $user->email) }}" autocomplete="email">
                        @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-2xl">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('image').addEventListener('change', function () {
        const fileInput = document.getElementById('image');
        const file = fileInput.files[0];

        if (file) {
            const imageUrl = URL.createObjectURL(file);

            Swal.fire({
                title: 'Anda yakin ingin mengunggah gambar ini?',
                imageUrl: imageUrl,  // Menambahkan gambar ke dalam pesan
                imageAlt: 'Gambar yang akan diunggah',
                imageHeight: 75,  // Sesuaikan tinggi gambar sesuai kebutuhan
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('uploadForm').submit();
                }
            });
        } else {
            Swal.fire({
                title: 'Anda harus memilih gambar terlebih dahulu.',
                icon: 'warning',
            });
        }
    });
</script>
@endsection