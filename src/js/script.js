

////////////////// SWIPER INIT //////////////////

// document.addEventListener('DOMContentLoaded', () => {
//     const swiper = new Swiper('.swiper-container', {
//         loop: true, // Enable looping
//         autoplay: {
//             delay: 3000, // Slide delay in ms
//         },
//         pagination: {
//             el: '.swiper-pagination',
//             clickable: true,
//         },
//         navigation: {
//             nextEl: '.swiper-button-next',
//             prevEl: '.swiper-button-prev',
//         },
//     });
// });

////////////////// NAVIGATION SCRIPTS //////////////////

const menuBtn = document.querySelector('.hamburger');
const nav = document.querySelector('.navigationMenu');


document.querySelector('.hamburger').addEventListener('click', function() {
    this.classList.toggle('is-active');
});

let isOpen = false;

if (!isOpen) {
    document.querySelector('.navigationMenu').style.top = "-100%"    
}

// GSAP Animations
const openNav = () => {
    gsap.to(nav, {
      duration: 0.45,
      top: 0, // Bring navigation fully into view
      ease: "expo.in",
    });
    document.body.style.overflow = "hidden"; // Disable scrolling
};
  
const closeNav = () => {
    gsap.to(nav, {
      duration: 0.45,
      top: "-100%", // Move navigation fully out of view
      ease: "expo.in",
    });
    document.body.style.overflow = "auto"; // Disable scrolling

};
  
  // Toggle Navigation
  menuBtn.addEventListener("click", () => {
    isOpen = !isOpen;
    if (isOpen) {
      openNav();
    } else {
      closeNav();
    }
  });
  