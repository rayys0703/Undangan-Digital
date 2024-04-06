<!DOCTYPE html>
<html>
<meta charset='UTF-8' />
<meta content='width=device-width, initial-scale=1, user-scalable=1, minimum-scale=1, maximum-scale=5'
    name='viewport' />
<meta content='IE=edge' http-equiv='X-UA-Compatible' />

<link rel="icon" type="image/svg+xml" href="https://feeldreams.github.io/main-icon.png">
<link rel="apple-touch-icon" href="https://feeldreams.github.io/main-icon.png">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/typeit@8.7.0/dist/index.umd.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="{{ asset('template/template1/style.css') }}">

<head>
    <title>Undangan Pernikahan</title>
</head>
<style>
    body {
      overflow: hidden;
    }
    svg{vertical-align: middle;width: 22px;height: 22px;fill: #fff}
    .heart-icon {z-index:100;width: 30px;height: 30px;position: fixed;animation:  heartMove linear 1;top: -10vh;}
    @keyframes heartMove {
    0% {transform: translateY(-10vh);}
    100% {transform: translateY(100vh);}
    }
        svg.line{fill: none;stroke: #ff5370;stroke-width: 2;animation: moving .7s linear infinite alternate;}
        .spin{animation: spin 3s linear infinite alternate;}
    @keyframes spin {
    from {
        transform: rotate(20deg);
    }
    to {
        transform: rotate(-20deg);
    }
    }
</style>
<body>

    <div class="overlay">
        <div class="loading-message">Tunggu dulu ya..</div>
        <div id="loveIn" class="blocklove">
            <label class="lovein">&#10084;</label>
            <p id="ket">Sentuh LOVEnya!</p>
        </div>
    </div>

    <audio src="@if(isset($audio)) {{ asset('music/' . $audio->file) }} @else {{ asset('music/Ed Sheeran - Perfect.mp3') }} @endif" id="linkmp3" class="sembunyi"></audio>

    <section id="inifirst" class="first">
        <div class="wp"><img src="{{ asset('template/template1/images/bg1.jfif') }}" /></div>
        <!--<img id="first_stiker" class="nonstiker fade-in" src="buku.png"/>-->
        <p class="!text-3xl mt-32 md:mt-20 title agbalumo text-blue-700">{{ isset($data->nama_acara) ? $data->nama_acara
            : 'Pernikahan Agung & Dewi' }}</p>
        <img class="title w-64 h-64 mt-10 p-1 rounded-full ring-2 ring-gray-300"
            src="{{ isset($data->foto_cover) ? asset($data->foto_cover) : asset('images/users_template/default_cover.webp') }}"
            alt="Bordered avatar">
        @if (isset($data->tanggal_resepsi))
        <h4 class="mt-8 !text-3xl text-blue-700 agbalumo slide-up">{{
            \Carbon\Carbon::parse($data->tanggal_resepsi)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</h4>
        @else
        <h4 class="mt-8 !text-3xl text-blue-700 agbalumo slide-up">31 Februari 2024</h4>
        @endif
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <button id="buttonbuka" type="button" class="slide-up bg-blue-700 hover:bg-blue-600 shadow-md rounded-2xl mt-12 p-2 z-10 text-base itim" onclick="buka()">
            <i class="fas fa-envelope-open me-2"></i>Buka Undangan
        </button>
        <script>
        var intervalId;audio = new Audio('' + linkmp3.src); 
        function buka() {
            audio.play();
            var body = document.body;
            body.style = 'overflow-y:auto';
            buttonbuka.style.display="none";
            intervalId = setInterval(berjatuhan, 100);

            setTimeout(function() {
                clearInterval(intervalId);
            }, 3000);
        }
        function berjatuhan() {
            const heart = document.createElement("div");
            heart.innerHTML = "<svg class='line spin' style='opacity:1;z-index:100;stroke:#ff5370' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><g transform='translate(2.550170, 3.550158)'><path d='M0.371729633,8.89614246 C-0.701270367,5.54614246 0.553729633,1.38114246 4.07072963,0.249142462 C5.92072963,-0.347857538 8.20372963,0.150142462 9.50072963,1.93914246 C10.7237296,0.0841424625 13.0727296,-0.343857538 14.9207296,0.249142462 C18.4367296,1.38114246 19.6987296,5.54614246 18.6267296,8.89614246 C16.9567296,14.2061425 11.1297296,16.9721425 9.50072963,16.9721425 C7.87272963,16.9721425 2.09772963,14.2681425 0.371729633,8.89614246 Z'></path><path d='M13.23843,4.013842 C14.44543,4.137842 15.20043,5.094842 15.15543,6.435842'></path></g></svg>";
            heart.className = "heart-icon";
            heart.style.left = (Math.random() * 95) + "vw";
            heart.style.animationDuration = (Math.random() * 1) + 2 + "s";
            document.body.appendChild(heart);
        }

        setInterval(function() {
        var heartArr = document.querySelectorAll(".heart-icon");
        if (heartArr.length > 100) {
            heartArr[0].remove();
        }
        }, 100);
        </script>
    </section>

    <section>
        <div class="wp"><img src="{{ asset('template/template1/images/bg3.jfif') }}" /></div>
        <!--<img class="stiker fade-in" src=""/>-->
        <div class="mt-8 absolute flex flex-col items-center justify-center text-center w-full max-w-[600px]">
            <h3 class="title itim black !text-3xl">{{ isset($data->teks_konten_1) ? $data->teks_konten_1 : 'بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ' }}</h3><br>
            <h3 class="title itim black !text-2xl">{{ isset($data->teks_konten_2) ? $data->teks_konten_2 : 'Assalamualaikum Warahmatullahi Wabarakatuh' }}</h3><br>
            <h3 class="title itim black !text-lg">{{ isset($data->teks_konten_3) ? $data->teks_konten_3 : 'Tanpa mengurangi rasa hormat. Kami mengundang Bapak/Ibu/Saudara/i serta kerabat
                sekalian untuk menghadiri acara pernikahan kami:' }}</h3><br>
        </div>
        <div class="mt-8 absolute flex items-center justify-center w-full h-full text-center z-10">
            <div class="extra itim basis-0 grow px-10 min-w-0 max-w-full my-3 black">
                <div class="slide-left w-full flex items-center justify-center"><img
                        class="w-12 h-12 md:w-44 md:h-44 p-1 rounded-full ring-2 ring-gray-300"
                        src="{{ isset($data->foto_pria) ? asset($data->foto_pria) : asset('images/users_template/default_pria.webp') }}"
                        alt="Bordered avatar"></div>
                <h3 class="slide-left !text-5xl my-5 itim black">{{ isset($data->nama_pria) ? $data->nama_pria : 'Agung'
                    }}</h3>
                <p class="slide-up nunito black !text-[14px] leading-6 md:!text-lg md:leading-7">{{
                    isset($data->bio_pria) ? $data->bio_pria : 'Deskripsi Pria' }}</p>
            </div>
            <h1
                class="slide-up text-2xl !md:text-8xl itim basis-0 grow min-w-0 my-3 px-10 flex items-center justify-center flex-[0_0_8%] max-w-[8%] my-3 pink">
                &</h1>
            <div class="basis-0 grow min-w-0 max-w-full px-10 my-3 my-3">
                <div class="slide-right w-full flex items-center justify-center"><img
                        class="w-12 h-12 md:w-44 md:h-44 p-1 rounded-full ring-2 ring-gray-300"
                        src="{{ isset($data->foto_wanita) ? asset($data->foto_wanita) : asset('images/users_template/default_wanita.webp') }}"
                        alt="Bordered avatar"></div>
                <h3 class="slide-right !text-5xl my-5 itim black">{{ isset($data->nama_wanita) ? $data->nama_wanita :
                    'Dewi' }}</h3>
                <p class="slide-up nunito black !text-[14px] leading-6 md:!text-lg md:leading-7">{{
                    isset($data->bio_wanita) ? $data->bio_wanita : 'Deskripsi Wanita' }}</p>
            </div>
        </div>
        <div class="blocktext">
            <p id="textsec2" class="anm title"></p>
        </div>
    </section>

    <section>
        <div class="wp"><img src="{{ asset('template/template1/images/bg2.jpg') }}" /></div>
        <div class="absolute flex flex-col items-center justify-center text-center w-full h-full max-w-[600px]">
            <h3 class="title itim black !text-2xl">{{ isset($data->teks_konten_4) ? $data->teks_konten_4 : 'Allah Subhanahu Wa Ta`ala berfirman' }}</h3><br>
            <h3 class="title itim black !text-lg">{{ isset($data->teks_konten_5) ? $data->teks_konten_5 : 'Dan di antara tanda kebesaran-Nya ialah Dia menciptakan pasangan dari jenismu sendiri agar kamu merasa tenteram kepadanya dan Dia menjadikan di antaramu rasa kasih sayang. Sungguh demikian itu terdapat kebesaran Allah bagi kaum yang berpikir.' }}</h3><br>
            <h3 class="title itim black !text-2xl">{{ isset($data->teks_konten_6) ? $data->teks_konten_6 : 'QS. Ar-Rum Ayat 21' }}</h3><br>
        </div>
    </section>

    <section>
        <div class="wp"><img src="{{ asset('template/template1/images/bg2.jfif') }}" /></div>
        <img class="stiker w-32 slide-down" src="{{ asset('template/template1/images/kembang.png') }}" />
        <h1 class="title agbalumo blue !text-5xl">Waktu Menuju Acara</h1><br>
        <h2 id="timer" class="!hidden mt-10 title itim pink jedag !text-2xl">31 Februari 2024</h2>
        <div class="z-50 itim jedag title font-bold pink text-3xl text-center justify-center flex flex-col px-0"
            data-waktu="{{ isset($data->tanggal_akad) ? $data->tanggal_akad : '2023-12-12 12:00:00' }}"
            id="tampilan-waktu">

            <div class="grid grid-cols-4 gap-4">
                <div class="col">
                    <h2 id="hari">0</h2>
                    <p class="text-black text-sm font-medium">Hari</p>
                </div>
                <div class="col">
                    <h2 id="jam">0</h2>
                    <p class="text-black text-sm font-medium">Jam</p>
                </div>
                <div class="col">
                    <h2 id="menit">0</h2>
                    <p class="text-black text-sm font-medium">Menit</p>
                </div>
                <div class="col">
                    <h2 id="detik">0</h2>
                    <p class="text-black text-sm font-medium">Detik</p>
                </div>
            </div>
        </div>
        <script>
            let countDownDate = (new Date(document.getElementById('tampilan-waktu').getAttribute('data-waktu').replace(' ', 'T'))).getTime();

            setInterval(() => {
                let now = new Date().getTime();
                let distance = Math.abs(countDownDate - now);

                if (now > countDownDate) {
                    document.getElementById('tampilan-waktu').innerHTML = "Acara Telah Selesai";
                    document.getElementById('tampilan-waktu').style.fontSize = "25px";
                } else {
                    document.getElementById('hari').innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
                    document.getElementById('jam').innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    document.getElementById('menit').innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    document.getElementById('detik').innerText = Math.floor((distance % (1000 * 60)) / 1000);
                }
            }, 1000);
        </script>
        @if(isset($data->tanggal_akad))
            @if($data->tanggal_resepsi == $data->tanggal_akad)
                <h2 class="mt-10 slide-up agbalumo !text-lg blue">Akad & Resepsi:<br><span class="itim !text-base black">{{ isset($data->tanggal_akad) ? \Carbon\Carbon::parse($data->tanggal_akad)->translatedFormat('l, j F Y - H:i').' WIB' : '12 Desember 2023' }}<br>{{ isset($data->tempat_akad) ? $data->tempat_akad : 'Hotel Satu Nusantara' }}</span></h2>
                <a href="{{ isset($data->link_tempat_akad) ? $data->link_tempat_akad : 'https://goo.gl/maps/ALZR6FJZU3kxVwN86' }}" target="_blank"
                    class="slide-up bg-blue-700 hover:bg-blue-600 shadow-md rounded-2xl mt-5 p-2 z-10 text-base itim">
                    <i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps
                </a>
            @else
                <h2 class="mt-10 slide-up agbalumo !text-lg blue">Akad:<br><span class="itim !text-base black">{{ isset($data->tanggal_akad) ? \Carbon\Carbon::parse($data->tanggal_akad)->translatedFormat('l, j F Y - H:i').' WIB' : '12 Desember 2023' }}<br>{{ isset($data->tempat_akad) ? $data->tempat_akad : 'Hotel Satu Nusantara' }}</span></h2>
                <a href="{{ isset($data->link_tempat_akad) ? $data->link_tempat_akad : 'https://goo.gl/maps/ALZR6FJZU3kxVwN86' }}" target="_blank"
                    class="slide-up bg-blue-700 hover:bg-blue-600 shadow-md rounded-2xl mt-5 p-2 z-10 text-base itim">
                    <i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps
                </a>
                <h2 class="mt-2 slide-up agbalumo !text-lg blue">Resepsi:<br><span class="itim !text-base black">{{ isset($data->tanggal_resepsi) ? \Carbon\Carbon::parse($data->tanggal_resepsi)->translatedFormat('l, j F Y - H:i').' WIB' : '13 Desember 2023' }}<br>{{ isset($data->tempat_resepsi) ? $data->tempat_resepsi : 'Hotel Dua Jakarta' }}</span></h2>
                <a href="{{ isset($data->link_tempat_resepsi) ? $data->link_tempat_resepsi : 'https://goo.gl/maps/ALZR6FJZU3kxVwN86' }}" target="_blank"
                    class="slide-up bg-blue-700 hover:bg-blue-600 shadow-md rounded-2xl mt-5 p-2 z-10 text-base itim">
                    <i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps
                </a>
            @endif
        @else
            <h2 class="mt-10 slide-up agbalumo !text-lg blue">Akad & Resepsi:<br><span class="itim !text-base black">{{ isset($data->tanggal_akad) ? \Carbon\Carbon::parse($data->tanggal_akad)->translatedFormat('l, j F Y - H:i').' WIB' : '12 Desember 2023' }}<br>{{ isset($data->tempat_akad) ? $data->tempat_akad : 'Hotel Satu Nusantara' }}</span></h2>
            <a href="{{ isset($data->link_tempat_akad) ? $data->link_tempat_akad : 'https://goo.gl/maps/ALZR6FJZU3kxVwN86' }}" target="_blank"
                class="slide-up bg-blue-700 hover:bg-blue-600 shadow-md rounded-2xl mt-5 p-2 z-10 text-base itim">
                <i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps
            </a>
        @endif
    </section>

    <section>
        <div class="wp"><img src="{{ asset('template/template1/images/bg4.jfif') }}" /></div>
        <!--<img class="stiker fade-in" src=""/>-->
        <h1 class="mt-48 md:mt-32 title agbalumo blue">Save The Date</h1><br>
        @if (isset($data->tanggal_akad))
        <h2 class="title itim pink jedag">{{ \Carbon\Carbon::parse($data->tanggal_akad)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</h2>
            @else
            <h2 class="title itim pink jedag">31 Februari 2024</h2>
            @endif
            <div class="mt-10 flex flex-col items-center justify-center text-center w-full max-w-[710px]">
                <h3 class="title itim black !text-lg">{{ isset($data->teks_konten_7) ? $data->teks_konten_7 : 'Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila, Bapak / Ibu / Saudara / i berkenan hadir untuk memberikan do`a restunya kami ucapkan terimakasih.' }}</h3><br>
                <h3 class="title agbalumo blue !text-xl">{{ isset($data->teks_konten_8) ? $data->teks_konten_8 : 'Wassalamualaikum Warahmatullahi Wabarakatuh' }}</h3><br>
            </div>
            <img class="absolute flex items-center justify-center stiker fade-in w-28 md:w-44 left-0"
                src="{{ asset('template/template1/images/kembang2.png') }}" />
            <img class="absolute flex items-center justify-center stiker fade-in w-28 md:w-44 right-0 -scale-x-100"
                src="{{ asset('template/template1/images/kembang2.png') }}" />

            {{--<script>
                @if(isset($event) && $event->event_datetime)
        var countDownDate = new Date("{{ $event->event_datetime->toIso8601String() }}").getTime();
    @else
        var countDownDate = new Date("2028-01-10T07:30:00").getTime();
    @endif

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        if (distance > 0) {
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("timer").innerHTML = days + " hari " + hours + " jam " +
                minutes + " menit " + seconds + " detik ";
        } else {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "Acara telah selesai";
        }
    }, 1000);
            </script>--}}

    </section>

    <!-- Ucapan -->
    @if(isset($data))
    <section class="h-auto bg-white">
        <div class="container px-10 max-w-[800px]">

            <h1 class="agbalumo blue" style="font-size: 3rem;margin-bottom:30px">Ucapan & Doa</h1>
            @if(isset($ucapan))
            @foreach ($ucapan as $k)
            <div class="mb-4">
                <div
                    class="black flex-1 border border-dashed border-black rounded-2xl px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                    <div class="flex items-center"><strong>{{ $k->name }}</strong>&nbsp;-&nbsp;<span class="text-xs">{{ $k->address }}</span></div>
                    <p class="mt-5 text-sm text-left">
                        {{ $k->content }}
                    </p>
                </div>
            </div>
            @endforeach
            @endif

            <div class="mt-4 mb-5 card-body border border-dashed border-black rounded-2xl shadow p-5">

                <form action="{{ route('postComment') }}" method="post">
                    @csrf

                    <input type="hidden" name="users_id" value="{{ $data->id_user }}">
                    <input type="hidden" name="templates_id" value="{{ $data->templates_id }}">

                    <div class="mb-3">
                        <label for="form-nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input name="name" type="text" id="form-nama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                      </div>

                    <div class="mb-3">
                        <label for="form-alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <input name="address" type="text" id="form-alamat" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                      </div>

                    <div class="mb-3">
                        <label for="form-kehadiran"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Kehadiran</label>
                        <select name="status" required id="form-kehadiran"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option selected disabled>Konfirmasi Kehadiran</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Tidak hadir">Berhalangan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ucapan
                            - Doa</label>
                        <textarea name="content" id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Tulis ucapan ataupun doa.."></textarea>
                    </div>

                    <div class="flex">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                    </div>
                </form>

            </div>

        </div>
    </section>
    @endif

    <div id="initom" class="menu">
        <a class='tombol' onclick="tes()">
            <svg class='fill-none stroke-white stroke-2' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                <g transform='translate(5.000000, 8.500000)'>
                    <path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path>
                </g>
            </svg> </a>
    </div>

    <script src="{{ asset('template/template1/script.js') }}"></script>

</body>

</html>