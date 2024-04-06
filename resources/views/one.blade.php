<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>rare.in - Undangan Digital Paling Unik</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Poppins:wght@400;700&display=swap"
    rel="stylesheet">
  <link href="css/fontawesome-all.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lp.css') }}">
  <link rel="icon" type="image/x-icon" href="https://feeldreams.github.io/main-icon.png">

</head>
<style>

.parallax-window {
    width: 100%;
    height: 100vh;
    position: relative;
    display: flex;
    flex-direction: column ;
    background: url("https://rayyarr.github.io/proyek2/frontend/landingpage-bawah/bromo.jpg");
    background-size: cover;
    background-position: center;
}

.parallax-window:before{
    content: "";
    position: absolute;
    width: 100%;
    height: 60vh;
    bottom: 0;
    left: 0;
    background: linear-gradient(to top, rgb(0,0,0), rgba(0,0,0,0));
}

.header-bottom{
    display: flex;
    justify-content: space-between;
    padding: 2rem;
    position: relative;
}

.logo a {
    color: #fff;
    font-size: 2rem;
}

.header-tittle{
    margin: auto auto;
    font-size: 5rem;
    position: relative;
    font-weight: 700;
    letter-spacing: 2px;
}

.today-date{
    font-size: 2rem;
    font-weight: 500;
}
.today-date span{
    font-size: 1.5rem;
}

.social-media{
    display:flex;
    list-style: none;
    width: 350px;
    justify-content: space-between;
    align-items: center;
}

.social-media li a{
    color: #fff;
} 

   #about{
    width: 100%;
    padding: 2.5rem 0;
   }

   .about-container{
    width: 900px;
    margin: auto auto;
   }

   .image-gallery{
    display: flex;
    width: 100%;
    min-height: 300px;
    justify-content: space-between;
    margin-bottom: 2rem;
   }

   .image-box{
    width: 22%;
    height: 250px;
    position: relative;
   }

   .image-box img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    transition: 0.8s;
   }

   .image-box:nth-child(odd){
    align-self: flex-end;
   }

   .image-box img hover{
    opacity: 0.5;
   }

   .gunung{
    position: absolute;
    bottom: -7%;
    left:  50%;
    font-style: italic;
    font-weight: 500;
   }

   .about-info{
    text-align: center;
    font-size: 1rem;
    line-height: 1.5rem;
   }

   .about-info{
    text-align: center;
    font-size: 1rem;
    line-height: 1.5rem;
   }

   footer{
    width: 100%;
    padding: 1.5rem 1rem;
    text-align: center;
   }

   footer i{
    color:#ff2929;
   }

   @media only screen and (max-width: 950px){

    .about-container{
        width: 90%;
    }
   }

   @media only screen and (max-width: 768px){
    .today-date{
        display: none;
    }

    .social-media{
        width: 100%;
    }
    .image-gallery{
        flex-direction: column;
        margin-bottom: 1rem;
    }

    .image-box{
        width: 100%;
        height: 400px;
        margin: 1rem 0;
    }
    .gunung{
        display: none;
    }
   }
</style>
<body>
  <!-- Navigation -->
  <nav>
    <div class="container-prim">
      <!-- Image Logo -->
      <a class="logo-image" href="index.html">rare.in</a>

      <!-- Text Logo - Use this if you don't have a graphic logo -->
      <!-- <a class="logo-text" href="index.html">Name</a> -->

      <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div> <!-- end of hamburger -->

      <div class="navbar">
        <!--<ul>
          <li><a href="features.html">Features</a></li>
          <li><a href="pricing.html">Pricing</a></li>
          <li><a href="article.html">Article</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>-->
        @if (Route::has('login'))
        <div class="access-buttons">
          @if (Route::has('login'))
          <a class="btn btn-outline btn-sm" href="{{ route('login') }}">Masuk</a>
          @endif
          @if (Route::has('register'))
          <a class="btn btn-sm" href="{{ route('register') }}">Daftar</a>
          @endif
        </div>
        @endif
      </div> <!-- end of navbar -->
    </div> <!-- end of container-prim -->
  </nav> <!-- end of nav -->
  <!-- end of navigation -->

  <!-- Home Hero -->
  <header class="hero bgcolor">
    <div class="container-prim grid">
      <div class="text-container home">
        <h1 class="h1-large">Platform Undangan <span class="animated-text">Digital</span></h1>
        <p class="p-large mb-4">Solusi undangan online untuk acara Anda. Ciptakan undangan kreatif dan manajemen tamu
          yang efisien.</p>
        <a class="btn btn-sm extL" href="{{ route('login') }}">Mulai Sekarang<svg xmlns='http://www.w3.org/2000/svg'
            viewBox='0 0 24 24' fill='none' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
            <line x1='7' y1='17' x2='17' y2='7' />
            <polyline points='7 7 17 7 17 17' />
          </svg></a>
        <!--<p><strong>Dipercayai oleh</strong></p>
          <div class="logo-container">
            <img src="images/company-logo-1.png" alt="alternative">
            <img src="images/company-logo-2.png" alt="alternative">
            <img src="images/company-logo-3.png" alt="alternative">
            <img src="images/company-logo-4.png" alt="alternative">
          </div>-->
      </div> <!-- end of text-container -->

      <div class="image-container home">
        <section class="carousel">
          <ol class="carousel__viewport">
            <li class="carousel__slide">
              <div class="carousel__snapper" style="background-image: url('images/wi_1.jpg')"></div>
            </li>
            <li class="carousel__slide">
              <div class="carousel__snapper" style="background-image: url('images/wi_2.jpg')"></div>
            </li>
            <li class="carousel__slide">
              <div class="carousel__snapper" style="background-image: url('images/wi_3.jpg')"></div>
            </li>
            <li class="carousel__slide">
              <div class="carousel__snapper" style="background-image: url('images/wi_1.jpg')"></div>
            </li>
          </ol>
        </section>
      </div> 
    </div> 
  </header> 

  <div class="parallax-window" data-parallax="scroll" data-image-src="images/kamera.jpg">
    <div class="header-tittle"><span class="invitation-text">Undangan Digital</span></div>
    <div class="header-bottom">
      <div class="about-container">
        <div class="image-gallery">
          <div class="image-box">
            <img src="{{ asset('images/landingpage/demo-1.webp') }}" alt="blank" style="border-radius: 12px">
            <h2 class="gunung"></h2>
          </div>
          <div class="image-box">
            <img src="{{ asset('images/landingpage/demo-2.webp') }}" alt="blank" style="border-radius: 12px">
            <h2 class="gunung"></h2>
          </div>
          <div class="image-box">
            <img src="{{ asset('images/landingpage/demo-3.webp') }}" alt="blank" style="border-radius: 12px">
            <h2 class="gunung"></h2>
          </div>
          <div class="image-box">
            <img src="{{ asset('images/landingpage/demo-4.webp') }}" alt="blank" style="border-radius: 12px">
            <h2 class="gunung"></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{--<section id="about">
    <div class="about-container">
      <div class="image-gallery">
        <div class="image-box">
          <img src="{{ asset('images/landingpage/demo-1.webp') }}" alt="blank">
          <h2 class="gunung"></h2>
        </div>
        <div class="image-box">
          <img src="{{ asset('images/landingpage/demo-2.webp') }}" alt="blank">
          <h2 class="gunung"></h2>
        </div>
        <div class="image-box">
          <img src="{{ asset('images/landingpage/demo-3.webp') }}" alt="blank">
          <h2 class="gunung"></h2>
        </div>
        <div class="image-box">
          <img src="{{ asset('images/landingpage/demo-4.webp') }}" alt="blank">
          <h2 class="gunung"></h2>
        </div>
      </div>
    </div>
  </section>--}}

  <!-- Scripts -->
  <script src="js/scripts.js"></script>
  <script src="js/scrollreveal.js"></script>
  <script>
    function scrollActive() {
      const scrollY = window.pageYOffset

      sections.forEach(current => {
        const sectionHeight = current.offsetHeight
        const sectionTop = current.offsetTop - 50;
        sectionId = current.getAttribute('id')

        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
          document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active');
          inilogo.innerHTML = sectionId;
        } else {
          document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active')
        }

        if (sectionId == "Beranda") { inilogo.innerHTML = idweb; }
      })
    }
    window.addEventListener('scroll', scrollActive)

    // Animasi

    const sr = ScrollReveal({
      origin: 'left',
      distance: '40px',
      duration: 1500,
      delay: 10,
      reset: false
    });

    sr.reveal('.text-container.home', {});
    sr.reveal('.homeR, .about__text, .skills__img, video', {});

    const srR = ScrollReveal({
      origin: 'right',
      distance: '100px',
      duration: 1500,
      delay: 10,
      reset: false
    });

    srR.reveal('.image-container.home', {});

    ////

    document.addEventListener("DOMContentLoaded", function () {
      const carouselViewport = document.querySelector(".carousel__viewport");
      const slides = document.querySelectorAll(".carousel__slide");
      let currentIndex = 0;

      function changeSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        carouselViewport.scrollTo({
          left: slides[currentIndex].offsetLeft,
          behavior: "auto", // Menggunakan "auto" daripada "smooth"
        });
      }

      const interval = setInterval(changeSlide, 1000);

      carouselViewport.addEventListener("scroll", () => {
        clearInterval(interval);
      });
    });

  </script>
</body>

</html>