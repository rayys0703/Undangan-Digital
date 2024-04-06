pesanwhatsapp = "Boleh nih, mau PAP? ><";

const body = document.querySelector("body"); const swalst = Swal.mixin({timer: 2777, allowOutsideClick: false, showConfirmButton: false, timerProgressBar: true, imageHeight: 90,}); initom.style="opacity:0;bottom:0;transition:none"; audio = new Audio('' + linkmp3.src); 

/* Hati Berjatuhan */
function berjatuhan() {
  const heart = document.createElement("div");
  heart.innerHTML = "<svg class='line' style='opacity:.5' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><g transform='translate(2.550170, 3.550158)'><path d='M0.371729633,8.89614246 C-0.701270367,5.54614246 0.553729633,1.38114246 4.07072963,0.249142462 C5.92072963,-0.347857538 8.20372963,0.150142462 9.50072963,1.93914246 C10.7237296,0.0841424625 13.0727296,-0.343857538 14.9207296,0.249142462 C18.4367296,1.38114246 19.6987296,5.54614246 18.6267296,8.89614246 C16.9567296,14.2061425 11.1297296,16.9721425 9.50072963,16.9721425 C7.87272963,16.9721425 2.09772963,14.2681425 0.371729633,8.89614246 Z'></path><path d='M13.23843,4.013842 C14.44543,4.137842 15.20043,5.094842 15.15543,6.435842'></path></g></svg>";
  heart.className = "heart-icon";
  heart.style.left = (Math.random() * 95) + "vw";
  heart.style.animationDuration = (Math.random() * 3) + 2 + "s";
  document.body.appendChild(heart);
}

setInterval(function() {
  var heartArr = document.querySelectorAll(".heart-icon");
  if (heartArr.length > 100) {
    heartArr[0].remove();
  }
}, 100);
/* Akhir Hati Berjatuhan */

  function mulaitextseco(){
    new TypeIt("#textsec2", {
      strings: ["" + initextsec2], startDelay: 50, speed: 55, cursor: true,
      afterComplete: function(){
        textsec2.innerHTML = initextsec2;
          setInterval(berjatuhan,200);
          //smn();
      },}).go();
   }

  function mulaitextsec(){setTimeout(katateksnimasi,2500);stikerdouble.style="opacity:0;transform:scale(0)";setTimeout(gantifotodouble,400);textsec3.style="opacity:0";setTimeout(lanjtextsec,400)}
  function lanjtextsec(){textsec3.style="display:none";textsec3b.style="opacity:1";}
  function gantifotodouble(){stikerdouble.src=stikerdouble2.src;stikerdouble.style="";}
  function gantifotodouble2(){textsec3b.style="display:none";stikerdouble.src=stikerdouble3.src;stikerdouble.style="";}
  function gantifotodouble3(){stikerdouble.src=stikerdouble4.src;stikerdouble.style="";}

function katateksnimasi(){
    stikerdouble.style="opacity:0;transform:scale(0)";setTimeout(gantifotodouble2,400);
    textsec3b.style="opacity:0;transform:scale(0)";

    new TypeIt("#teksnimasi", {
      strings: ["" + initeksnimasi], startDelay: 500, speed: 55, cursor: true,
      afterComplete: function(){
        teksnimasi.innerHTML = initeksnimasi;
          stikerdouble.style="opacity:0;transform:scale(0)";setTimeout(gantifotodouble3,400);
          //setTimeout(smn,200);
          setTimeout(muncultombol2,500);
      },}).go();
}
function gantifotodua(){stikerdua.src=stikerdua2.src;stikerdua.style="";}

fungsi=0;fungsiklik=0;skrg=1;iniaja=0;
function tes(){
  if(fungsi==0){
    initom.style="opacity:0;bottom:0;";
    window.scrollBy({top: tinggi,behavior: 'smooth'});
    fungsi = 1;
    skrg++;
    if(skrg==2){setTimeout(smn,700);}
    if(skrg==3){setTimeout(smn,700);}
    //if(skrg==3){fungsi=0;setTimeout(mulaitextseco,800);}
    //if(skrg==4){setTimeout(katateksnimasi,700);}
    if(skrg==5){}
    if(skrg>=6){initom.style="opacity:0;bottom:0;";}
  }
}
  function smn(){fungsi=0;initom.style="";}
  initom.style="opacity:0;bottom:0;transition:none";

  function muncultombol(){fungtom=1;Tombol.style="opacity:1;transform:scale(1)";}
  function muncultombol2(){Tombol2.style="opacity:1;transform:scale(1)";}

function aksiakhir() {
  if(fungsiklik==0){
    fungsiklik=1;
    setTimeout(katajudul,100)
  }
}

function katajudul(){
    new TypeIt("#judulakhir", {
      strings: ["" + teksjudulakhir], startDelay: 50, speed: 50, cursor: true,
      afterComplete: function(){
        judulakhir.innerHTML = teksjudulakhir;
          setTimeout(katakata,400);
      },}).go();
}
function katakata(){
    new TypeIt("#kalimatakhir", {
      strings: ["" + tekskalimatakhir], startDelay: 50, speed: 48, cursor: true,
      afterComplete: function(){
        kalimatakhir.innerHTML = tekskalimatakhir;
          //judulakhir.style="opacity:0;transform:scale(0);";
          setTimeout(teksmuncul,20);
          setInterval(berjatuhan,200);
          setTimeout(kataakhir,700);
      },}).go();
}
function teksmuncul(){
  //teksjudulakhir2 = "I Love You âœ¨";
  //judulakhir.innerHTML=teksjudulakhir2;
  //judulakhir.style="font-family:var(--caveat);font-size:27px";
  //setTimeout(jjteksnim,300);
  stikerakhir.style="opacity:0;transform:scale(0)";
  setTimeout(gantifotoakhir,400);
}
function jjteksnim(){judulakhir.style.animation="rto .8s infinite alternate";}
function gantifotoakhir(){stikerakhir.src=stikerakhir2.src;stikerakhir.style="";}
function kataakhir(){
    new TypeIt("#palingakhir", {
      strings: ["" + tekspalingakhir], startDelay: 50, speed: 50, cursor: true,
      afterComplete: function(){
        palingakhir.innerHTML = tekspalingakhir;
          setTimeout(muncultombol3,500);
      },}).go();
}
function muncultombol3(){fungtom2=1;TombolWA.style="opacity:1;transform:scale(1)";}
function menuju(){if(fungtom2==1){window.location = "https://api.whatsapp.com/send?phone=&text=" + pesanwhatsapp;}}

tinggi = inifirst.offsetHeight;
function tentukantinggi(){tinggi = inifirst.offsetHeight;}
setInterval(tentukantinggi,200);
console.log(tinggi);

fungsiAud=0;function playaud(){if(fungsiAud==0){fungsiAud=1;audio.play();}}
function keatas(){window.scrollTo(0, 0);}

window.addEventListener("load", (event) => {
//function mulaiyuk(){
    window.scrollTo(0, 0);
    setTimeout(keatas,500);

    var overlay = document.querySelector(".loading-message");
    overlay.style.display = "none";
    var tomlv = document.querySelector(".blocklove");
    tomlv.style.display = "flex";
    mulaimulai();
});
//setTimeout(mulaiyuk,3000);
//document.getElementById("loveIn").onclick = function() {
function mulaimulai(){
    //playaud();

    var overlay = document.querySelector(".overlay");
    overlay.style.display = "none";
    //initom.style="";
    //first_stiker.style="opacity:1;transition:all 2s ease";
    ScrollReveal({ reset: true });
    ScrollReveal().reveal(".show-once", { reset: false});
    ScrollReveal().reveal(".title", {duration: 2500,origin: "top",distance: "50px", easing: "cubic-bezier(0.5, 0, 0, 1)", rotate: { x: 20, z: -10 }});
    ScrollReveal().reveal(".fade-in", {delay: 200, duration: 2400,move: 0});
    ScrollReveal().reveal(".scaleUp", {duration: 2500, scale: 0.85});
    ScrollReveal().reveal(".flip", {delay: 200, duration: 2000, rotate: { x: 20, z: 20}});
    ScrollReveal().reveal(".slide-right", {duration: 1000,origin: "right",distance: "300px",easing: "ease-in-out"});
    ScrollReveal().reveal(".slide-left", {duration: 1000,origin: "left",distance: "300px",easing: "ease-in-out"});
    ScrollReveal().reveal(".slide-up", {duration: 1000, origin: "bottom", distance: "100px", easing: "cubic-bezier(.37,.01,.74,1)", opacity: 0, scale: 0.5});
    ScrollReveal().reveal(".slide-down", {duration: 1000, origin: "top", distance: "100px", easing: "cubic-bezier(.37,.01,.74,1)", opacity: 0, scale: 0.5});

    document.addEventListener('scroll', function(e) {
        let documentHeight = document.body.scrollHeight;
        let currentScroll = window.scrollY + window.innerHeight;
        let modifier = 200; 
        if(currentScroll + modifier > documentHeight) {
            console.log('Sudah sampai bawah!');
            initom.style="opacity:0;bottom:0";
            //setTimeout(aksiakhir,10);
            document.body.style.overflowY = "auto";
        } else {
            //initom.style="";
        }
    })
}