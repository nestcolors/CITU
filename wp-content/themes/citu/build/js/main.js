$('document').ready(function(){
  console.log('ready');

  $('#blog-slider').slick({
    dots: true,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 300,
    responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 2.45
      }
    },{
      breakpoint: 769,
      settings: {
        slidesToShow: 1.85
      }
    },{
      breakpoint: 415,
      settings: {
        slidesToShow: 1.1
      }
    }]
  });

  $('#blogPage-slider').slick({
    dots: true,
    infinite: false,
    slidesToShow: 2,
    slidesToScroll: 1,
    speed: 300,
    responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 1.45
      }
    },{
      breakpoint: 769,
      settings: {
        slidesToShow: 1.15
      }
    },{
      breakpoint: 415,
      settings: {
        slidesToShow: 1.1
      }
    }]
  });

  $('.clients-container').slick({
    dots: true,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 300,
    responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 3
      }
    },{
      breakpoint: 769,
      settings: {
        slidesToShow: 2
      }
    },{
      breakpoint: 415,
      settings: {
        slidesToShow: 2
      }
    }]
  });

  if($( window ).width() < 1025){
    $('#its-project-type').slick({
      dots: true,
      infinite: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      speed: 300,
      adaptiveHeight: true,
      responsive: [
      {
        breakpoint: 1025,
        settings: {
          slidesToShow: 2.1
        }
      },{
        breakpoint: 769,
        settings: {
          slidesToShow: 2.1
        }
      },{
        breakpoint: 415,
        settings: {
          slidesToShow: 1.1
        }
      }]
    });
  }

  if($( window ).width() < 415){
    $('#its-services, #bds-services').slick({
      dots: true,
      infinite: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      speed: 300,
      adaptiveHeight: true,
      responsive: [{
        breakpoint: 415,
        settings: {
          slidesToShow: 1.3
        }
      }]
    });
  }

  $('#mobile-services-slider').slick({
    dots: true,
    infinite: false,
    slidesToShow: 1.2,
    adaptiveHeight: true
  })

  var navbarPage = $('body').hasClass('full-navbar-page');
  if(navbarPage){
    $(document).scroll(function(){
      var showNavbar = $(document).scrollTop() > $('.intro').height() - 40
      var el = $('.nav-bar-full-width');
      if(showNavbar){
        el.fadeIn();
      }else{
        el.fadeOut();
      }
    });
  }

  $('.mobile-menu-toggle').click(function(){
    $('.mobile-overlay').fadeIn('slow', 'swing', function(){
      console.log('done');
    });
  });
  $('.close-mobile-overlay').click(function(){
    $('.mobile-overlay').fadeOut();
  });

  var showHideNavbar = function(){
  }

  $('#show-sorting').click(function(){
    $('.sorting-container').slideToggle();
  });

  // ************************************** scroll animation section **************************************
  var navbarPage = $('body').hasClass('service-page');
  if(navbarPage){
    $(document).scroll(function(){
      var initAnimationServices = $(document).scrollTop() > 530;
      var initAnimationTheWay = $(document).scrollTop() > 1760;
      if(initAnimationServices){
        $('#its-services, #bds-services').addClass('show-from-bottom');
      }
      if(initAnimationTheWay){
        $('#its-project-type').addClass('show-from-bottom');
      }
    });
  }
  var homePage = $('body').hasClass('home');
  if(homePage){
    $(document).scroll(function(){
      var initAdvantages = $(document).scrollTop() > 630;
      if(initAdvantages){
        $('#advantages').addClass('show-from-bottom');
      }
      var initSevices = $(document).scrollTop() > 1350;
      if(initSevices){
        console.log('show');
        $('#move-service-item').addClass('move-service-item');
      }
    });
  }
});
