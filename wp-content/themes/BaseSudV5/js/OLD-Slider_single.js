
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: true,
    focusOnSelect: true, 
    prevArrow: '<span class="slick-prev"><</span>',
    nextArrow: '<span class="slick-next">></span>'
  });

  $(document).ready(function () 
  {
      var colorBTNslide = $('.heroMarque').attr("data_color");
      console.log(colorBTNslide);
    if ( $('.heroMarque').attr("data_color") != '' )
    {
      var colorBTNslide = $('.heroMarque').attr("data_color");
      $('.single span.slick-next.slick-arrow').css('background', colorBTNslide);
      $('.single span.slick-prev.slick-arrow').css('background', colorBTNslide);
    }
    
  });