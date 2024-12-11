document.addEventListener("DOMContentLoaded", () => {
    // Elements selectors
    const searchForm = document.querySelector('.search-form');
    const loginForm = document.querySelector('.login-form');
    const navBar = document.querySelector('.navbar');
    const menu = document.querySelector('#menu-btn');
    const navbar = document.querySelector('.header .navbar');
    const header = document.querySelector('.header');
  
    // Search button functionality
    const searchBtn = document.querySelector('#search-btn');
    if (searchBtn) {
      searchBtn.onclick = () => {
        searchForm?.classList.toggle('active');
        loginForm?.classList.remove('active');
        navBar?.classList.remove('active');
      };
    }
  
    // Cart button functionality
    const cartBtn = document.querySelector('#cart-btn');
    if (cartBtn) {
      cartBtn.onclick = () => {
        searchForm?.classList.remove('active');
        loginForm?.classList.remove('active');
        navBar?.classList.remove('active');
      };
    }
  
    // Login button functionality
    const loginBtn = document.querySelector('#login-btn');
    if (loginBtn) {
      loginBtn.onclick = () => {
        loginForm?.classList.toggle('active');
        searchForm?.classList.remove('active');
        navBar?.classList.remove('active');
      };
    }
  
    // Menu toggle functionality
    if (menu && navbar) {
      menu.onclick = () => {
        navbar.classList.toggle('active');
      };
    }
  
    // Sticky header functionality
    if (header) {
      window.onscroll = () => {
        header.classList.toggle('sticky', window.scrollY > 100);
        searchForm?.classList.remove('active');
        loginForm?.classList.remove('active');
        navBar?.classList.remove('active');
      };
    } else {
      console.error('Error: .header element not found in the DOM.');
    }
  
    // Initialize Swiper slider
    const swiper = new Swiper('.swiper', {
      loop: true,
      spaceBetween: 20,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
      },
    });
  });