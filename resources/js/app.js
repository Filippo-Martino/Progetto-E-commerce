import './bootstrap';
import 'bootstrap';
// import 'swiper';
/* import animate.css */
import 'animate.css';
// import Swiper from 'swiper';


// funzione per navbar che si nasconde con lo scroll
const navbar = document.querySelector('.navbar');
let previousScroll = window.scrollY;

window.addEventListener('scroll', () => {
  const currentScroll = window.scrollY;
// !!cambiare il valore di currentScroll>0 quando sappiamo di che lunghezza è l'header
  if (currentScroll > previousScroll && currentScroll > 0) {
    // L'utente sta scendendo, mostra la navbar
    navbar.classList.add('d-none');
  } else {
    // L'utente sta salendo, nascondi la navbar
    navbar.classList.remove('d-none');
  }
  // Aggiorna lo stato precedente dello scroll
  previousScroll = currentScroll;
});

// carosello ultimi articoli in home

var swiper2 = new Swiper(".mySwiper-latest", {
  slidesPerView: 2,
  spaceBetween: 10,
  freeMode: true,
  pagination: {
    el: ".swiper-pagination-latest",
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-latest-next',
    prevEl: '.swiper-button-latest-prev',
  },
  breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 10,
          },
          970: {
            slidesPerView: 4,
            spaceBetween: 10,
          },
          1024: {
            slidesPerView: 5,
            spaceBetween: 10,
          },
        },
});

// Swiper categorie
let swiper = new Swiper('.swiper-categories', {
    slidesPerView: 3,
    direction: 'horizontal',
    navigation: {
      nextEl: '.swiper-button-categories-next',
      prevEl: '.swiper-button-categories-prev',
    },
    breakpoints: {
      1024: {
        slidesPerView: 5,
       
      },
    },
    loop: true,
  
  });
// // carousel ultimi articoli in home
//   const swiperElHome = document.querySelector('.mySwiper-latest')
//   Object.assign(swiperElHome, {
//     slidesPerView: 2,
//     spaceBetween: 10,
//     pagination: {
//       clickable: true,
//     },
//     breakpoints: {
//       640: {
//         slidesPerView: 2,
//         spaceBetween: 20,
//       },
//       768: {
//         slidesPerView: 3,
//         spaceBetween: 10,
//       },
//       970: {
//         slidesPerView: 3,
//         spaceBetween: 10,
//       },
//       1024: {
//         slidesPerView: 5,
//         spaceBetween: 10,
//       },
//     },
    
//     navigation: {
//       nextEl: '.swiper-button-latest-next',
//       prevEl: '.swiper-button-latest-prev',
//     },
    

//   });
//   swiperElHome.initialize();

//   function getDirection() {
//     let windowWidth = window.innerWidth;
    // let direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

    // return direction;}
  

 
/* 
  // ? Swiper prodotti correlati categoria
  const swiperEl = document.querySelector('.mySwiper-correlati')
    Object.assign(swiperEl, {
      slidesPerView: 2,
      spaceBetween: 10,
      pagination: {
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 10,
        },
        970: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 10,
        },
      },
    });
    swiperEl.initialize(); */