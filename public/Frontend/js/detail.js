$('.filtering').slick({
  slidesToShow: 3,
  slidesToScroll: 3,
  infinite: false,
  arrows:true,
  speed:50

});

var filtered = false;

$('.js-filter').on('click', function(){
  if (filtered === false) {
    $('.filtering').slick('slickFilter',':even');
    $(this).text('Unfilter Slides');
    filtered = true;
  } else {
    $('.filtering').slick('slickUnfilter');
    $(this).text('Filter Slides');
    filtered = false;
  }
});

$('.filter').slick({
  slidesToShow: 4,
  slidesToScroll: 3,
  arrows:true,
  speed:1000,
  adaptiveHeight:true,
  infinite: false,
  
});


  $(()=>{
      $('.brbox img').click(function(){
          let imgPath= $(this).attr('src');
          $('#main-images').attr('src',imgPath);
      })
  })


////////////js snow///////////////
document.addEventListener('DOMContentLoaded', function () {
    var script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js';
    script.onload = function () {
        particlesJS("snow", {
            "particles": {
                "number": {
                    "value": 75,
                    "density": {
                        "enable": true,
                        "value_area": 400
                    }
                },
                "color": {
                    "value": "#0014FF"
                },
                "opacity": {
                    "value": 1,
                    "random": true,
                    "anim": {
                        "enable": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": true
                    }
                },
                "line_linked": {
                    "enable": true
                },
                "move": {
                    "enable": true,
                    "speed": 1,
                    "direction": "top",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": true,
                        "rotateX": 300,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "events": {
                    "onhover": {
                        "enable": false
                    },
                    "onclick": {
                        "enable": false
                    },
                    "resize": false
                }
            },
            "retina_detect": true
        });
    }
    document.head.append(script);
});