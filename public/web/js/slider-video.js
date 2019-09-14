//Paramétrage du Plugin "Slick" pour le slider vidéo
$('.slider-video').slick({
    centerMode: true,
    centerPadding: '33vw',
    slidesToShow: 1,
    responsive: [
        {
            breakpoint: 1830,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '30vw',
              slidesToShow: 1
            }
        },
        {
            breakpoint: 1500,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '25vw',
              slidesToShow: 1
            }
        },
        {
            breakpoint: 1110,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '20vw',
              slidesToShow: 1
            }
        },
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });


//Lancer la vidéo du slide active
$('.slider-video').hover(function(){
    $('.slick-active video').get(0).play();
});


      