<<<<<<< HEAD
$(document).ready(function() {
    var carousel = $('.carousel');
    var slidesPerPage = 4; // Số lượng mã trên mỗi trang

    carousel.slick({
        slidesToShow: slidesPerPage,
        slidesToScroll: slidesPerPage,
        autoplay: true,
        autoplaySpeed: 1000,
    });

    $('.prev-btn').click(function() {
        carousel.slick('slickPrev');
        updatePageNumber();
    });

    $('.next-btn').click(function() {
        carousel.slick('slickNext');
        updatePageNumber();
    });

    function updatePageNumber() {
        var currentSlide = carousel.slick('slickCurrentSlide');
        var totalPages = Math.ceil(carousel.slick('getSlick').slideCount / slidesPerPage);
        var pageNumber = currentSlide + 1;
        $('.current-page').text('Trang ' + pageNumber + '/' + totalPages);
    }

    updatePageNumber();
});
=======
$(document).ready(function(){
    $('.carousel').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
    });
  
    $('.prev-btn').click(function() {
      $(this).siblings('.carousel').slick('slickPrev');
    });
  
    $('.next-btn').click(function() {
      $(this).siblings('.carousel').slick('slickNext');
    });
  });
  
>>>>>>> 9586ac960b54d5cd1cb098bed6979b1a1c7934dd
