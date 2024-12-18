/**
* Template Name: FlexStart
* Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
* Updated: Nov 01 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
  }

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  /**
   * Init isotope layout and filters
   */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

})();

document.addEventListener('DOMContentLoaded', function () {
  const labPopUp = document.getElementById('lab-popup');
  const popupTitle = document.getElementById('popup-title');
  const popupDescription = document.getElementById('popup-description');
  const closeBtn = document.querySelector('.popup-close');
  const projectButtons = document.querySelectorAll('.project-button');


  projectButtons.forEach(button => {
     button.addEventListener('click', function() {
      const project = this.getAttribute('data-project');
          showPopup(project);
     })
  })
 function showPopup(project) {
     if (project === 'lab506') {
           popupTitle.textContent = 'Lab 506 - Praktikum Alat';
              popupDescription.textContent = 'Lab 506 adalah laboratorium yang didedikasikan untuk kegiatan praktikum dengan alat-alat fisik. Lab ini dilengkapi dengan berbagai peralatan yang mendukung kegiatan eksperimen dan observasi untuk berbagai mata kuliah. Mahasiswa dapat menggunakan lab ini untuk melakukan praktikum sesuai dengan panduan yang telah ditetapkan.';
              labPopUp.style.display = 'flex';
     } else if (project === 'lab508') {
          popupTitle.textContent = 'Lab 508 - Lab Komputer';
              popupDescription.textContent = 'Lab 508 adalah laboratorium komputer yang diperuntukkan bagi aktivitas perkuliahan dan penggunaan oleh mahasiswa. Lab ini dilengkapi dengan sejumlah komputer dan fasilitas pendukung yang dapat digunakan mahasiswa untuk belajar, mengerjakan tugas, atau melakukan aktivitas lainnya yang membutuhkan fasilitas komputer. Laboratorium ini juga sering digunakan untuk kegiatan praktikum yang menggunakan software atau aplikasi khusus.';
              labPopUp.style.display = 'flex';
     }
 }
closeBtn.addEventListener('click', function () {
        labPopUp.style.display = 'none';
      });

       window.addEventListener('click', function (event) {
        if (event.target == labPopUp) {
             labPopUp.style.display = 'none';
         }
       });
});


    /**
     * Add class scrolled on header
     */
    let header = document.querySelector('.header');
        const scrollOffset = 10;
    if (header) {
      window.addEventListener('scroll', function(){
       if (window.scrollY > scrollOffset) {
               header.closest('body').classList.add('scrolled')
         } else {
              header.closest('body').classList.remove('scrolled')
         }
      })
    }

    /**
     * Scrool top button
     */

    document.addEventListener('DOMContentLoaded', () => {
      const themeToggle = document.getElementById('theme-toggle');
      const html = document.documentElement;
      const icon = themeToggle.querySelector('i');
  
      // Load saved theme
      const savedTheme = localStorage.getItem('theme') || 'light';
      html.setAttribute('data-bs-theme', savedTheme);
      updateIcon(savedTheme);
  
      // Theme toggle handler
      themeToggle.addEventListener('click', () => {
          const currentTheme = html.getAttribute('data-bs-theme');
          const newTheme = currentTheme === 'light' ? 'dark' : 'light';
  
          // Add transition class
          document.body.classList.add('theme-transitioning');
  
          // Update theme
          html.setAttribute('data-bs-theme', newTheme);
          localStorage.setItem('theme', newTheme);
          updateIcon(newTheme);
  
          // Remove transition class
          setTimeout(() => {
              document.body.classList.remove('theme-transitioning');
          }, 500);
      });
  
      function updateIcon(theme) {
          icon.className = theme === 'light' ? 'fas fa-moon' : 'fas fa-sun';
      }
  });


  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 650,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        themeSystem: 'bootstrap5'

    });

    calendar.render();
});