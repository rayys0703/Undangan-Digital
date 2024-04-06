@extends('admin/layouts.app')
{{--@section('judul', 'Rayys — Formulir') --}}
@section('judul')
{{-- {!! config('app.name', 'Rayys') !!} <span class="title-animation"> — Beranda</span> --}}
<span class="title-animation">Tambah Template</span>
@endsection
@section('content')
<div class="flex flex-row justify-center py-10">

    <div class="max-w-[800px] mx-auto">
        <div class="flex flex-col bg-white m-auto p-2 rounded-2xl mb-5 shadow">
            <h1 class="flex py-5 lg:px-20 md:px-10 px-5 mx-auto font-bold text-2xl text-gray-800">
                Tambah Template
            </h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <p class="flex justify-center py-5 px-5 mx-auto text-md text-gray-800">
                    Whoops! There were some problems with your input.<br><br>
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </p>
            </div>
            @endif

            <div class="flex overflow-x-scroll pb-5">
                <div class="flex flex-nowrap mx-10 snap-x snap-mandatory overflow-x-auto">
                        <form action="{{ route('template.update',$template->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="my-5 snap-center px-3">
                            <div class="flex font-sans max-w-[500px]">
                                <div class="flex-none w-44 md:w-56 relative bg-gray-50 rounded-s-2xl">
                                    <label for="uploadInput"
                                        class="flex flex-col justify-center items-center text-center cursor-pointer h-full z-100">
                                        <svg class='fill-none stroke stroke-1 stroke-black w-[50px] h-[50px]'
                                            xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                                            <g
                                                transform='translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) translate(2.000000, 2.000000)'>
                                                <line x1='19.791' y1='10.1207' x2='7.75' y2='10.1207'></line>
                                                <polyline points='16.8643 7.2047 19.7923 10.1207 16.8643 13.0367'>
                                                </polyline>
                                                <path
                                                    d='M0.2588,5.6299 C0.5888,2.0499 1.9288,0.7499 7.2588,0.7499 C14.3598,0.7499 14.3598,3.0599 14.3598,9.9999 C14.3598,16.9399 14.3598,19.2499 7.2588,19.2499 C1.9288,19.2499 0.5888,17.9499 0.2588,14.3699'
                                                    transform='translate(7.309300, 9.999900) scale(-1, 1) translate(-7.309300, -9.999900) '>
                                                </path>
                                            </g>
                                        </svg>
                                        <input id="uploadInput" type="file" class="hidden"
                                            accept=".png, .jpg, .jpeg, .gif" name="image" value="{{ $template->image }}" />
                                        <span class="mt-2 text-sm">Upload Foto</span>
                                    </label>

                                    <div class="mt-4">
                                        <img id="updateImage" src="{{ asset('images/template/' . $template->image) }}" alt="Silahkan Coba Lagi" class="absolute inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
                                        <button type="button" id="closeButton" class="absolute p-1 top-3 right-3 text-white bg-violet-700 hover:bg-violet-500 rounded-full shadow-xl"><svg class='fill-none stroke-2 stroke-white w-4 h-4' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><g transform='translate(3.500000, 2.000000)'><path d='M15.3891429,7.55409524 C15.3891429,15.5731429 16.5434286,19.1979048 8.77961905,19.1979048 C1.01485714,19.1979048 2.19295238,15.5731429 2.19295238,7.55409524'></path><line x1='16.8651429' y1='4.47980952' x2='0.714666667' y2='4.47980952'></line><path d='M12.2148571,4.47980952 C12.2148571,4.47980952 12.7434286,0.714095238 8.78914286,0.714095238 C4.83580952,0.714095238 5.36438095,4.47980952 5.36438095,4.47980952'></path></g></svg></button>
                                    </div>
                                    <script>
                                    const uploadInput = document.getElementById('uploadInput');
                                    const updateImage = document.getElementById('updateImage');
                                    const closeButton = document.getElementById('closeButton');

                                    uploadInput.addEventListener('change', (event) => {
                                        const file = event.target.files[0];
                                
                                        if (file && /\.(png|jpg|jpeg|gif)$/i.test(file.name)) {
                                            const reader = new FileReader();
                                
                                            reader.onload = function (e) {
                                                updateImage.src = e.target.result;
                                            };
                                
                                            reader.readAsDataURL(file);
                                            updateImage.classList.remove("hidden");

                                            closeButton.style.display = 'block';
                                        } else {
                                            // File tidak valid, tambahkan penanganan kesalahan di sini
                                            alert('File harus berupa gambar dengan format PNG, JPG, JPEG, atau GIF.');
                                            uploadInput.value = ''; // Membersihkan nilai input
                                        }
                                    });

                                    document.getElementById('closeButton').addEventListener('click', function () {
                                        updateImage.classList.add("hidden");
                                        this.style.display = 'none';

                                        document.getElementById('uploadInput').value = '';
                                    });
                                    </script>
                                </div>

                                <div class="flex-auto p-6 bg-white rounded-e-2xl shadow">
                                    <div class="flex flex-wrap">
                                        <h1 class="flex-auto font-medium text-xl text-slate-900">
                                            <input type="text" id="first_name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="Nama Template" name="name" value="{{ $template->name }}" required>
                                        </h1>
                                        <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
                                            <div class="flex gap-5">
                                                <span>Rp</span>
                                                <input type="text" id="first_name"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    placeholder="000" name="price" value="{{ $template->price }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex items-baseline mb-6 pb-6 border-b border-slate-200">
                                        <textarea rows="2"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Deskripsi Template" name="desc" value="">{{ $template->desc }}</textarea>
                                    </div>
                                    <div class="flex space-x-4 mb-5 text-sm font-medium">
                                        <div class="flex-auto flex space-x-4">
                                            <button type="submit"
                                                class="h-10 px-8 font-semibold rounded-full bg-violet-600 border text-white hover:bg-transparent hover:border-slate-200 hover:text-slate-900 transition"
                                                type="submit">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection