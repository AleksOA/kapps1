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


    $('.recent-projects__slick').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        responsive: [
            {
                breakpoint: 1490,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1

                }
            },
            {
                breakpoint: 840,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    vertical: true,
                    verticalSwiping: true,
                    arrows: false
                }
            }
        ]
    });
});




// FAQ'S start
// =================================================
$(document).ready(function() {
    $('.faq__answer-item').slideUp(500);
    $('.faq__question-item-text').on('click', f_acc);
});


function f_acc(){
    var index = $('h5').index(this);
    var answer = $('.faq__answer-item').eq(index);

    $('.faq__answer-item').slideUp(500);

    setTimeout(function() {
        $(answer).slideDown(800);
    }, 500);
}
// =================================================
// FAQ'S finish



