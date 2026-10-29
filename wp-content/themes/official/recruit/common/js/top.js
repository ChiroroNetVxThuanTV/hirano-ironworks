jQuery(function($) {

const mySwiper = new Swiper('.card02 .swiper', {
  pagination: {
    el: '.card02 .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.card02 .swiper-button-next',
    prevEl: '.card02 .swiper-button-prev',
  },
		spaceBetween: 0,
		slidesPerView: 1,
		
  breakpoints: {
    1180: {
     slidesPerView: 'auto',
     spaceBetween: 16,
     grabCursor: true,
    }
  },
});

});