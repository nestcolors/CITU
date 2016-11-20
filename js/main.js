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
        slidesToShow: 1.5
      }
    }]
  });

});
