$(document).ready(function(){
  $(".dropdown-button").dropdown({hover: true});
  $(".button-collapse").sideNav();

  $('.parallax').parallax();
  $('select').material_select();
  $('.datepicker').pickadate({
    selectMonths: true,
    selectYears: 15
  });

  $('.bxslider').bxSlider({
    minSlides: 6,
    maxSlides: 6,
    slideWidth: 220,
    slideMargin: 20,
    ticker: true,
    speed: 1000 * 20,
    caption: true
  });
});