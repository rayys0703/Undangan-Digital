<!doctype html>
<html lang="id" data-bs-theme="dark">

<head>
    <!-- Common Tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Undangan Pernikahan Digital</title>


    <!-- Preconnect CDN -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Dependencies CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css"
        integrity="sha256-WAgYcAck1C1/zEl5sBl5cfyhxtLgKGdpI3oKyJffVRI=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha256-MBffSnbbXwHCuZtgPYiwMQbfE7z+GOZ7fBPCNB06Z98=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/all.min.css"
        integrity="sha256-CTSx/A06dm1B063156EVh15m6Y67pAjZZaQc89LLSrU=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"
        integrity="sha256-GqiEX9BuR1rv5zPU5Vs2qS/NSHl1BJyBcjQYJ6ycwD4=" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&display=swap">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('template/template2/css/style.css') }}">
</head>

<body data-email="user@example.com" data-password="12345678" data-url="https://api.ulems.my.id/"
    style="overflow-y: hidden;">

    <!-- Navbar Bottom -->
    <nav class="navbar navbar-dark bg-dark navbar-expand fixed-bottom rounded-top-4 p-0" id="navbar-menus"
        style="display: none">
        <ul class="navbar-nav nav-justified w-100 align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="#home">
                    <i class="fas fa-home"></i>
                    <span class="d-block" style="font-size: 0.7rem;">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#mempelai">
                    <i class="fa-solid fa-user-group"></i>
                    <span class="d-block" style="font-size: 0.7rem;">Mempelai</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tanggal">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span class="d-block" style="font-size: 0.7rem;">Tanggal</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#galeri">
                    <i class="fa-solid fa-images"></i>
                    <span class="d-block" style="font-size: 0.7rem;">Galeri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#ucapan">
                    <i class="fa-solid fa-comments"></i>
                    <span class="d-block" style="font-size: 0.7rem;">Ucapan</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="text-light" data-bs-spy="scroll" data-bs-target="#navbar-menus" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" tabindex="0">

        <!-- Home -->
        <section class="container" id="home">

            <div class="text-center pt-4">
                <h1 class="font-esthetic my-4" style="font-size: 2.5rem;">{{ isset($data->nama_acara) ?
                    $data->nama_acara : 'Pernikahan' }}</h1>

                <div class="py-4">
                    <div class="img-crop border border-3 border-light shadow mx-auto">
                        <img src="{{ isset($data->foto_cover) ? asset($data->foto_cover) : asset('images/users_template/default_cover.webp') }}"
                            alt="bg" onclick="util.modal(this)">
                    </div>
                </div>

                <h1 id="awalan" class="font-esthetic my-4" style="font-size: 3rem;">{{ isset($data->nama_pria) ?
                    $data->nama_pria : 'Nama Pria' }} & {{ isset($data->nama_wanita) ? $data->nama_wanita : 'Nama
                    Wanita' }}</h1>

                @if (isset($data->tanggal_akad))
                <h4 style="margin-top: 15px;margin-bottom: 15px">{{
                    \Carbon\Carbon::parse($data->tanggal_akad)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</h4>
                @endif

                <a class="d-none btn btn-outline-light btn-sm shadow rounded-pill px-3 my-2" target="_blank"
                    href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=The%20Wedding%20of%20Wahyu%20and%20Riski&details=The%20Wedding%20of%20Wahyu%20and%20Riski%20%7C%2015%20Maret%202023%20%7C%20RT%2010%20RW%2002,%20Desa%20Pajerukan,%20Kec.%20Kalibagor,%20Kab.%20Banyumas,%20Jawa%20Tengah%2053191%20%7C%2010.00%20-%2011.00%20WIB&dates=20230315T100000/20230315T110000&location=https://goo.gl/maps/ALZR6FJZU3kxVwN86">
                    <i class="fa-solid fa-calendar-check me-2"></i>Save The Date
                </a>

                <div class="d-flex justify-content-center align-items-center mt-4 mb-2">
                    <div class="mouse-animation">
                        <div class="scroll-animation"></div>
                    </div>
                </div>

                <p class="m-0">Scroll ke bawah ya!</p>
            </div>
        </section>

        <!-- Wave Separator -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1"
                d="M0,160L48,144C96,128,192,96,288,106.7C384,117,480,171,576,165.3C672,160,768,96,864,96C960,96,1056,160,1152,154.7C1248,149,1344,75,1392,37.3L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>

        <!-- Mempelai -->
        <section class="dark-section" id="mempelai">

            <div class="text-center">
                <h1 class="font-arabic py-4 px-2" style="font-size: 2rem">{{ isset($data->teks_konten_1) ? $data->teks_konten_1 : 'بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ' }}</h1>
                <h1 class="font-esthetic py-4 px-2" style="font-size: 2rem">{{ isset($data->teks_konten_2) ? $data->teks_konten_2 : 'Assalamualaikum Warahmatullahi Wabarakatuh' }}</h1>

                <p class="pb-3 px-3">
                    {{ isset($data->teks_konten_3) ? $data->teks_konten_3 : 'Tanpa mengurangi rasa hormat. Kami mengundang Bapak/Ibu/Saudara/i serta kerabat sekalian untuk menghadiri acara pernikahan kami:' }}
                </p>

                <div class="overflow-x-hidden">

                    <div data-aos="fade-right" data-aos-duration="2000">
                        <div class="img-crop border border-3 border-light shadow my-4 mx-auto">
                            <img src="{{ isset($data->foto_pria) ? asset($data->foto_pria) : asset('images/users_template/default_pria.webp') }}"
                                alt="cowo" onclick="util.modal(this)">
                        </div>
                        <h1 class="font-esthetic" style="font-size: 3rem;">{{ isset($data->nama_pria) ? $data->nama_pria
                            : 'Nama Pria' }}</h1>
                        <h5 class="mt-3 mb-0">{{ isset($data->bio_pria) ? $data->bio_pria : 'Deskripsi Pria' }}</h5>
                        <p class="d-none mb-0">Bapak ... & Ibu ...</p>
                    </div>

                    <h1 class="font-esthetic my-4" style="font-size: 4rem;">&</h1>

                    <div data-aos="fade-left" data-aos-duration="2000">
                        <div class="img-crop border border-3 border-light shadow my-4 mx-auto">
                            <img src="{{ isset($data->foto_wanita) ? asset($data->foto_wanita) : asset('images/users_template/default_wanita.webp') }}"
                                alt="cewe" onclick="util.modal(this)">
                        </div>
                        <h1 class="font-esthetic" style="font-size: 3rem;">{{ isset($data->nama_wanita) ?
                            $data->nama_wanita : 'Nama Wanita' }}</h1>
                        <h5 class="mt-3 mb-0">{{ isset($data->bio_wanita) ? $data->bio_wanita : 'Deskripsi Wanita' }}</h5>
                        <p class="d-none mb-0">Bapak ... & Ibu ...</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Wave Separator -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1"
                d="M0,192L40,181.3C80,171,160,149,240,149.3C320,149,400,171,480,165.3C560,160,640,128,720,128C800,128,880,160,960,186.7C1040,213,1120,235,1200,218.7C1280,203,1360,149,1400,122.7L1440,96L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
            </path>
        </svg>

        <!-- Firman Allah Subhanahu Wa Ta'ala -->
        <div class="container">
            <div class="text-center" data-aos="fade-up" data-aos-duration="2000">

                <h1 class="font-esthetic mt-0 mb-3" style="font-size: 2rem">{{ isset($data->teks_konten_4) ? $data->teks_konten_4 : 'Allah Subhanahu Wa Ta`ala berfirman' }}</h1>

                <p style="font-size: 0.9rem;" class="px-2">{{ isset($data->teks_konten_5) ? $data->teks_konten_5 : 'Dan di antara tanda kebesaran-Nya ialah Dia menciptakan pasangan dari jenismu sendiri agar kamu merasa tenteram kepadanya dan Dia menjadikan di antaramu rasa kasih sayang. Sungguh demikian itu terdapat kebesaran Allah bagi kaum yang berpikir.' }}</p>

                <span class="mb-0"><strong>{{ isset($data->teks_konten_6) ? $data->teks_konten_6 : 'QS. Ar-Rum Ayat 21' }}</strong></span>
            </div>
        </div>

        <!-- Wave Separator -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1"
                d="M0,96L30,106.7C60,117,120,139,180,154.7C240,171,300,181,360,186.7C420,192,480,192,540,181.3C600,171,660,149,720,154.7C780,160,840,192,900,208C960,224,1020,224,1080,208C1140,192,1200,160,1260,138.7C1320,117,1380,107,1410,101.3L1440,96L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
            </path>
        </svg>

        <!-- Tanggal -->
        <section class="dark-section" id="tanggal">

            <div class="container">
                <div class="text-center">

                    <h1 class="font-esthetic py-3" style="font-size: 2rem;">Waktu Menuju Acara</h1>
                    <div class="border rounded-pill shadow py-2 px-4 mx-2 mb-4">

                        <!-- Ganti waktunya pada data-waktu (sesuai format tersebut) -->
                        <div class="row justify-content-center"
                            data-waktu="{{ isset($data->tanggal_akad) ? $data->tanggal_akad : '2023-12-12 12:00:00' }}"
                            id="tampilan-waktu">
                            <div class="col-3 p-1">
                                <h2 class="d-inline m-0 p-0" id="hari">0</h2><small
                                    class="ms-1 me-0 my-0 p-0 d-inline">Hari</small>
                            </div>
                            <div class="col-3 p-1">
                                <h2 class="d-inline m-0 p-0" id="jam">0</h2><small
                                    class="ms-1 me-0 my-0 p-0 d-inline">Jam</small>
                            </div>
                            <div class="col-3 p-1">
                                <h2 class="d-inline m-0 p-0" id="menit">0</h2><small
                                    class="ms-1 me-0 my-0 p-0 d-inline">Menit</small>
                            </div>
                            <div class="col-3 p-1">
                                <h2 class="d-inline m-0 p-0" id="detik">0</h2><small
                                    class="ms-1 me-0 my-0 p-0 d-inline">Detik</small>
                            </div>
                        </div>
                    </div>

                    <p style="font-size: 0.9rem;" class="mt-4 py-2">
                        Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta'ala, insyaAllah kami akan menyelenggarakan
                        acara :
                    </p>

                    <div class="overflow-x-hidden">
                        @if (isset($data->tanggal_akad))
                            @if($data->tanggal_resepsi == $data->tanggal_akad)
                                <div class="py-2" data-aos="fade-left" data-aos-duration="1500">
                                    <h1 class="font-esthetic" style="font-size: 2rem;">Akad & Resepsi</h1>
                                    <p>{{ isset($data->tanggal_akad) ? \Carbon\Carbon::parse($data->tanggal_akad)->translatedFormat('l, j F Y - H:i').' WIB' : '12 Desember 2023' }}</p>
                                    <p>{{ isset($data->tempat_akad) ? $data->tempat_akad : 'Hotel Satu Nusantara' }}</p>
                                    <a href="{{ isset($data->link_tempat_akad) ? $data->link_tempat_akad : 'https://goo.gl/maps/ALZR6FJZU3kxVwN86' }}" target="_blank"
                                        class="btn btn-outline-light btn-sm rounded-pill shadow-sm mb-2 px-3">
                                        <i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps
                                    </a>
                                </div>
                            @else
                                <div class="py-2" data-aos="fade-left" data-aos-duration="1500">
                                    <h1 class="font-esthetic" style="font-size: 2rem;">Akad</h1>
                                    <p>{{ isset($data->tanggal_akad) ? \Carbon\Carbon::parse($data->tanggal_akad)->translatedFormat('l, j F Y - H:i').' WIB' : '12 Desember 2023' }}</p>
                                    <p>{{ isset($data->tempat_akad) ? $data->tempat_akad : 'Hotel Satu Nusantara' }}</p>
                                    <a href="{{ isset($data->link_tempat_akad) ? $data->link_tempat_akad : 'https://goo.gl/maps/ALZR6FJZU3kxVwN86' }}" target="_blank"
                                        class="btn btn-outline-light btn-sm rounded-pill shadow-sm mb-2 px-3">
                                        <i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps
                                    </a>
                                </div>

                                <div class="py-2" data-aos="fade-right" data-aos-duration="1500">
                                    <h1 class="font-esthetic" style="font-size: 2rem;">Resepsi</h1>
                                    <p>{{ isset($data->tanggal_resepsi) ? \Carbon\Carbon::parse($data->tanggal_resepsi)->translatedFormat('l, j F Y - H:i'). ' s/d ' . \Carbon\Carbon::parse($data->tanggal_resepsi2)->translatedFormat('H:i') .' WIB' : '13 Desember 2023' }}</p>
                                    <p>{{ isset($data->tempat_resepsi) ? $data->tempat_resepsi : 'Hotel Dua Jakarta' }}</p>
                                    <a href="{{ isset($data->link_tempat_resepsi) ? $data->link_tempat_resepsi : 'https://goo.gl/maps/ALZR6FJZU3kxVwN86' }}" target="_blank"
                                        class="btn btn-outline-light btn-sm rounded-pill shadow-sm mb-2 px-3">
                                        <i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps
                                    </a>
                                </div>
                            @endif
                        @else
                            <div class="py-2" data-aos="fade-left" data-aos-duration="1500">
                                <h1 class="font-esthetic" style="font-size: 2rem;">Akad</h1>
                                <p>{{ isset($data->tanggal_akad) ? \Carbon\Carbon::parse($data->tanggal_akad)->translatedFormat('l, j F Y - H:i').' WIB' : '12 Desember 2023' }}</p>
                                <p>{{ isset($data->tempat_akad) ? $data->tempat_akad : 'Hotel Satu Nusantara' }}</p>
                                <a href="{{ isset($data->link_tempat_akad) ? $data->link_tempat_akad : 'https://goo.gl/maps/ALZR6FJZU3kxVwN86' }}" target="_blank"
                                    class="btn btn-outline-light btn-sm rounded-pill shadow-sm mb-2 px-3">
                                    <i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps
                                </a>
                            </div>

                            <div class="py-2" data-aos="fade-right" data-aos-duration="1500">
                                <h1 class="font-esthetic" style="font-size: 2rem;">Resepsi</h1>
                                <p>{{ isset($data->tanggal_resepsi) ? \Carbon\Carbon::parse($data->tanggal_resepsi)->translatedFormat('l, j F Y - H:i').' WIB' : '13 Desember 2023' }}</p>
                                <p>{{ isset($data->tempat_resepsi) ? $data->tempat_resepsi : 'Hotel Dua Jakarta' }}</p>
                                <a href="{{ isset($data->link_tempat_resepsi) ? $data->link_tempat_resepsi : 'https://goo.gl/maps/ALZR6FJZU3kxVwN86' }}" target="_blank"
                                    class="btn btn-outline-light btn-sm rounded-pill shadow-sm mb-2 px-3">
                                    <i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps
                                </a>
                            </div>
                        @endif
                    </div>

                    {{--<div class="py-2" data-aos="fade-up" data-aos-duration="1500">
                        <a href="https://goo.gl/maps/ALZR6FJZU3kxVwN86" target="_blank"
                            class="btn btn-outline-light btn-sm rounded-pill shadow-sm mb-2 px-3">
                            <i class="fa-solid fa-map-location-dot me-2"></i>Lihat Google Maps
                        </a>
                        <p class="d-none mb-0 mt-1 mx-1 pb-4" style="font-size: 0.9rem;">
                            RT 10 RW 02, Desa Pajerukan, Kec. Kalibagor, Kab. Banyumas, Jawa Tengah 53191
                        </p>
                    </div>--}}
                </div>
            </div>
        </section>

        <!-- Galeri Foto -->
        <section class="dark-section" id="galeri">

            <div class="container pb-2 pt-4">
                {{--<div class="card-body border rounded-4 shadow p-3">

                    <h1 class="font-esthetic text-center py-3" data-aos="fade-down" data-aos-duration="1500"
                        style="font-size: 2rem;">Moments</h1>

                    <div id="carousel-foto-satu" data-aos="fade-up" data-aos-duration="1500" class="carousel slide"
                        data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel-foto-satu" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carousel-foto-satu" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carousel-foto-satu" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>

                        <div class="carousel-inner rounded-4">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/1280/720?random=1" class="d-block w-100"
                                    onclick="util.modal(this)">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1280/720?random=2" class="d-block w-100"
                                    onclick="util.modal(this)">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1280/720?random=3" class="d-block w-100"
                                    onclick="util.modal(this)">
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-foto-satu"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-foto-satu"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="d-none" id="carousel-foto-dua" data-aos="fade-up" data-aos-duration="1500"
                        class="carousel slide mt-4" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel-foto-dua" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carousel-foto-dua" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carousel-foto-dua" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>

                        <div class="carousel-inner rounded-4">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/1280/720?random=4" class="d-block w-100"
                                    onclick="util.modal(this)">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1280/720?random=5" class="d-block w-100"
                                    onclick="util.modal(this)">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1280/720?random=6" class="d-block w-100"
                                    onclick="util.modal(this)">
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-foto-dua"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-foto-dua"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>--}}
            </div>
        </section>

        <!-- Wave Separator -->
        <svg class="d-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1"
                d="M0,192L40,181.3C80,171,160,149,240,149.3C320,149,400,171,480,165.3C560,160,640,128,720,128C800,128,880,160,960,186.7C1040,213,1120,235,1200,218.7C1280,203,1360,149,1400,122.7L1440,96L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
            </path>
        </svg>

        <!-- Firman Allah Subhanahu Wa Ta'ala -->
        <div class="container d-none">
            <div class="text-center" data-aos="fade-up" data-aos-duration="2000">

                <h1 class="font-esthetic mt-0 mb-3" style="font-size: 2rem">
                    Allah Subhanahu Wa Ta'ala berfirman
                </h1>

                <p style="font-size: 0.9rem;" class="px-2">
                    Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari
                    jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu
                    rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda
                    (kebesaran Allah) bagi kaum yang berpikir.
                </p>

                <span class="mb-0"><strong>QS. Ar-Rum Ayat 21</strong></span>
            </div>
        </div>

        <!-- Wave Separator -->
        <svg class="d-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1"
                d="M0,96L30,106.7C60,117,120,139,180,154.7C240,171,300,181,360,186.7C420,192,480,192,540,181.3C600,171,660,149,720,154.7C780,160,840,192,900,208C960,224,1020,224,1080,208C1140,192,1200,160,1260,138.7C1320,117,1380,107,1410,101.3L1440,96L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
            </path>
        </svg>

        <!-- Hadiah -->
        <!-- Wave Separator -->
        <svg class="d-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1"
                d="M0,96L30,106.7C60,117,120,139,180,154.7C240,171,300,181,360,186.7C420,192,480,192,540,181.3C600,171,660,149,720,154.7C780,160,840,192,900,208C960,224,1020,224,1080,208C1140,192,1200,160,1260,138.7C1320,117,1380,107,1410,101.3L1440,96L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z">
            </path>
        </svg>
        @if(isset($rekening))
        <div class="container">
            <div class="py-4">

                <div class="text-center">
                    <h1 class="font-esthetic mt-0 mb-3" style="font-size: 3rem;">Love Gift</h1>

                    <p class="mb-1" style="font-size: 0.9rem;">
                        Tanpa mengurangi rasa hormat, bagi anda yang ingin memberikan tanda kasih untuk kami,
                        dapat melalui :
                    </p>

                    <div class="overflow-x-hidden">
                        <div class="row justify-content-center">

                            @foreach ($rekening as $rek)
                                <div class="col-12 card-body border rounded-4 shadow p-3 m-3" style="max-width: 25rem;"
                                data-aos="fade-down" data-aos-duration="1500">
                                    <img src="{{ asset('images/rekening/' . $rek->bank . '.webp')}}" class="img-fluid rounded" width="150" alt="bni">
                                    <p class="card-text" style="font-size: 0.9rem;margin-top:20px !important">No. <span class="text-warning">{{ $rek->no_rekening}}</span></p>
                                    <p class="card-text" style="font-size: 0.9rem;">a.n {{ $rek->pemilik_rekening}}</p>

                                <!-- Ubah juga data-nomer sesuai dengan no rekening -->
                                <button class="btn btn-light btn-sm rounded-3" data-nomer="{{ $rek->no_rekening}}"
                                    onclick="util.salin(this)" autofocus>Salin No. Rek / e-Wallet</button>
                                </div>
                            @endforeach

                        </div>
                    </div> 
                </div>
            </div>
        </div>
        @endif

        <!-- Ucapan -->
        @if(isset($data))
        <section class="my-5 p-0">
            <div class="container">
                @if(isset($ucapan))
                <h1 class="font-esthetic text-center mb-3" style="font-size: 3rem;">Ucapan & Doa</h1>

                @foreach ($ucapan as $k)
                <div class="card mb-4 rounded-4">
                    <div class="card-body">
                        <p>{{ $k->content }}</p>

                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <img class="d-none" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp"
                                    alt="avatar" width="25" height="25" />
                                <p class="small mb-0">{{ $k->name }} - {{ $k->address }}</p>
                            </div>
                            <div class="d-flex d-none flex-row align-items-center">
                                <p class="small text-muted mb-0">Upvote?</p>
                                <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                                <p class="small text-muted mb-0">3</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

                <h1 class="font-esthetic text-center mb-3" style="font-size: 3rem;margin-top:70px">Kirim Ucapan - Doa</h1>

                <div class="mt-4 card-body border rounded-4 shadow p-3">

                    <div class="mb-1"></div>

                    <form action="{{ route('postComment') }}" method="post">
                        @csrf

                        <input type="hidden" name="users_id" value="{{ $data->id_user }}">
                        <input type="hidden" name="templates_id" value="{{ $data->templates_id }}">

                        <div class="mb-3">
                            <label for="form-nama" class="form-label">Nama</label>
                            <input name="name" type="text" class="form-control shadow-sm" id="form-nama"
                                placeholder="Isikan Nama Anda">
                        </div>

                        <div class="mb-3">
                            <label for="form-alamat" class="form-label">Alamat</label>
                            <input name="address" type="text" class="form-control shadow-sm" id="form-alamat"
                                placeholder="Isikan Alamat Anda">
                        </div>

                        <div class="mb-3">
                            <label for="form-kehadiran" class="form-label" id="label-kehadiran">Kehadiran</label>
                            <select name="status" class="form-select shadow-sm" id="form-kehadiran" required>
                                <option selected disabled>Konfirmasi Kehadiran</option>
                                <option value="Hadir">Hadir</option>
                                <option value="Tidak hadir">Berhalangan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="form-pesan" class="form-label">Ucapan & Doa</label>
                            <textarea name="content" class="form-control shadow-sm" id="form-pesan" rows="4"
                                placeholder="Tulis Ucapan & Doa"></textarea>
                        </div>

                        <div class="d-flex">
                            <button type="submit" class="flex-fill btn btn-primary btn-sm rounded-3 shadow p-2 m-1">
                                Kirim <i class="fa-solid fa-paper-plane ms-1"></i>
                            </button>
                        </div>
                    </form>

                </div>

                {{--
                <nav class="d-flex justify-content-center mb-0">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled" id="previous">
                            <button class="page-link" onclick="pagination.previous(this)" aria-label="Previous">
                                <i class="fa-solid fa-circle-left me-1"></i>Sebelumnya
                            </button>
                        </li>
                        <li class="page-item disabled">
                            <span class="page-link text-light" id="page">1</span>
                        </li>
                        <li class="page-item" id="next">
                            <button class="page-link" onclick="pagination.next(this)" aria-label="Next">
                                Selanjutnya<i class="fa-solid fa-circle-right ms-1"></i>
                            </button>
                        </li>
                    </ul>
                </nav>--}}
            </div>
        </section>
        @endif

        <!-- Wave Separator -->
        <svg class="d-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111111" fill-opacity="1"
                d="M0,224L34.3,234.7C68.6,245,137,267,206,266.7C274.3,267,343,245,411,234.7C480,224,549,224,617,213.3C685.7,203,754,181,823,197.3C891.4,213,960,267,1029,266.7C1097.1,267,1166,213,1234,192C1302.9,171,1371,181,1406,186.7L1440,192L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
            </path>
        </svg>
    </main>

    <!-- Footer Undangan -->
    <footer>
        <div class="container" style="padding-top:50px">
            <div class="text-center">

                <p style="font-size: 0.9rem;" class="pt-2 pb-1 px-2" data-aos="fade-up" data-aos-duration="1500">{{ isset($data->teks_konten_7) ? $data->teks_konten_7 : 'Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila, Bapak / Ibu / Saudara / i berkenan hadir untuk memberikan do`a restunya kami ucapkan terimakasih.' }}</p>

                <h1 class="font-esthetic" data-aos="fade-up" data-aos-duration="2000">{{ isset($data->teks_konten_8) ? $data->teks_konten_8 : 'Wassalamualaikum Warahmatullahi Wabarakatuh' }}</h1>
                <h1 class="d-none font-arabic py-4 px-2" data-aos="fade-up" data-aos-duration="2000" style="font-size: 2rem">
                    اَلْحَمْدُ لِلّٰهِ رَبِّ الْعٰلَمِيْنَۙ</h1>

                <hr class="mt-3 mb-2">

                <div class="row align-items-center justify-content-between flex-column flex-sm-row"
                    style="display: none">
                    <div class="col-auto">
                        <small class="text-light">
                            Build with<i class="fa-solid fa-heart mx-1"></i>
                        </small>
                    </div>
                    <div class="col-auto">
                        <small>
                            <i class="fa-brands fa-github me-1"></i><a target="_blank" href="#">rare.in</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Welcome Page -->
    <div class="loading-page" id="welcome" style="opacity: 1;">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh !important;">

            <div class="text-center">
                <h1 class="font-esthetic mb-4" style="font-size: 2.5rem;">{{ isset($data->nama_acara) ?
                    $data->nama_acara : 'Pernikahan' }}</h1>

                <div class="img-crop border border-3 border-light shadow mb-4 mx-auto">
                    <img src="{{ isset($data->foto_cover) ? asset($data->foto_cover) : asset('images/users_template/default_cover.webp') }}"
                        alt="bg">
                </div>

                <h1 class="font-esthetic my-4" style="font-size: 2.5rem;">{{ isset($data->nama_pria) ? $data->nama_pria
                    : 'Nama Pria' }} & {{ isset($data->nama_wanita) ? $data->nama_wanita : 'Nama Wanita' }}</h1>
                <div id="nama-tamu"></div>

                <button type="button" class="btn btn-light shadow rounded-4 mt-4" onclick="util.buka()">
                    <i class="fa-solid fa-envelope-open me-2"></i>Buka Undangan
                </button>
            </div>
        </div>
    </div>

    <!-- Audio Button -->
    <button type="button" id="tombol-musik" style="display: none;" class="btn btn-light btn-sm rounded-circle btn-music"
        onclick="util.play(this)" data-status="true" data-url="@if(isset($audio)) {{ asset('music/' . $audio->file) }} @else {{ asset('music/Ed Sheeran - Perfect.mp3') }} @endif">
        <i class="fa-solid fa-circle-pause"></i>
    </button>

    <!-- Loading page -->
    <div class="loading-page" id="loading" style="opacity: 1;">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh !important;">
            <div class="text-center w-75">
                <img class="img-fluid mb-3" src="{{ asset('template/template2/images/icon-192x192.png') }}" alt="icon"
                    style="width: 3.5rem;display:none">
                <div class="progress" role="progressbar" style="height: 0.5rem;">
                    <div class="progress-bar" id="bar" style="width: 0%"></div>
                </div>
                <small class="mt-1 text-light" id="progress-info">Tunggu bentar ya..</small>
            </div>
        </div>
    </div>

    <!-- Modal Foto Large -->
    <div class="modal fade" id="modal-image" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                        <img src="{{ isset($data->foto_cover) ? asset($data->foto_cover) : asset('images/users_template/default_cover.webp') }}"
                            class="w-100" alt="foto" id="show-modal-image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dependencies JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha256-gvZPYrsDwbwYJLD5yeBfcNujPhRoGOY831wwbIzz3t0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"
        integrity="sha256-pQBbLkFHcP1cy0C8IhoSdxlm0CtcH5yJ2ki9jjgR03c=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles-confetti@2.12.0/tsparticles.confetti.bundle.min.js"
        integrity="sha256-XG5M9shcLLpu8ct5bVbu6lLVzLpfZChl+csxdyLVP18=" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="{{ asset('template/template2/js/script.js') }}"></script>
</body>

</html>