// Section banner
// ===========================

$(document).ready(function () {
    $('.banner__slick').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        appendDots:$('.banner__dots')


    });
});