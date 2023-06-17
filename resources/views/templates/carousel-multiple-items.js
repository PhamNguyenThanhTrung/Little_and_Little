$(document).ready(function() {
    var carousel = $('.carousel');
    var slidesToShow = 4;
    var totalItems = carousel.find('.item').length;
    var totalPages = Math.ceil(totalItems / slidesToShow);
    var currentPage = 1;

    carousel.slick({
        slidesToShow: slidesToShow,
        slidesToScroll: slidesToShow,
        autoplay: true,
        autoplaySpeed: 1000,
    });

    function updatePageNumber() {
        var currentSlide = carousel.slick('slickCurrentSlide') + 1;
        if (currentSlide > totalItems) {
            currentSlide = totalItems;
            carousel.slick('slickGoTo', 0);
            currentPage = 1;
        } else {
            currentPage = Math.ceil(currentSlide / slidesToShow);
        }
        $('.current-page').text('Trang ' + currentPage + '/' + totalPages);
    }

    $('.prev-btn').click(function() {
        carousel.slick('slickPrev');
        updatePageNumber();
    });

    $('.next-btn').click(function() {
        carousel.slick('slickNext');
        updatePageNumber();
    });

    carousel.on('afterChange', function(event, slick, currentSlide) {
        updatePageNumber();
    });

    updatePageNumber();
});
