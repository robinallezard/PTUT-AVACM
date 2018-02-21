  $(document).ready(init);

    function init() {
      $(".carousel").slick({
        infinite: false,
        arrows: true,
        adaptiveHeight: true,
        prevArrow: '<button class="prev nav-btn"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button class="next nav-btn"><i class="fas fa-chevron-right"></i></button>',
      })
    }
