$(document).ready(function () {
    "use strict";

    if ($(".awards-slider").length > 0) {
        $(".awards-slider").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            prevArrow:
                '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow:
                '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 2,
                    },
                },
            ],
        });
    }

    $(".home-header .mobile").on("click", function () {
        $(".home-header .main-menu .menu-content .list").slideToggle();
    });

    if ($(".testimonial-slider-wrapper").length > 0) {
        $(".testimonial-slider-wrapper").slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 800,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }



    // Comment;
    if ($(".comment-section").length > 0) {
        let replyIcon = $('.comment ul li .contant h4 a');
        let commentForm = document.getElementById('comment-form');
        let replyText = document.getElementById('reply-text');

        replyIcon.click(function(e) {
            e.preventDefault();
            commentForm.scrollIntoView({behavior: "smooth"});
            console.log($(this).attr('data-pid'));

            $('#pid').val($(this).attr('data-pid'));
            checkPid();
        });

        $('.comment-title a').on('click', function(e) {
            e.preventDefault();
            $('#pid').val(0);
            checkPid();
        });

        function checkPid() {
            let pidVal = $('#pid').val();

            if(pidVal == 0) {
                $('#reply-text').text('Leave a comment');
                $('#close-reply').hide();
            } else {
                $('#reply-text').text('Leave a reply');
                $('#close-reply').show();
            }

        }

        checkPid();

    }


    $('.course-image .drop-btn').on('click', function() {
        $('.course-menu').removeClass('active');
        $(this).parents('.course-image').find('.course-menu').addClass('active');
    })

    $('.course-image .close-btn').on('click', function() {
        $(this).parents('.course-image').find('.course-menu').removeClass('active');
    })





});
