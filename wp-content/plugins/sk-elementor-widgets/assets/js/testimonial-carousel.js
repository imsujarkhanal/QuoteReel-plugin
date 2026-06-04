(function ($) {
    'use strict';

    var initTestimonialCarousel = function ($scope) {
        var wrapper = $scope.find('.sk-testimonial-carousel-wrapper');
        var carousel = $scope.find('.sk-testimonial-carousel');

        if (!carousel.length) {
            return;
        }

        var slidesPerView = parseInt(wrapper.data('slides'), 10) || 2;
        var slidesPerScroll = parseInt(wrapper.data('scroll'), 10) || 1;
        var spaceBetween = parseInt(wrapper.data('space'), 10) || 40;
        var paginationType = wrapper.data('pagination') || 'bullets';
        var hasPagination = paginationType !== 'none';
        var hasNavigation = carousel.find('.swiper-button-next').length && carousel.find('.swiper-button-prev').length;
        var autoplay = wrapper.data('autoplay') === true || wrapper.data('autoplay') === 'true';
        var pauseOnHover = wrapper.data('pause-hover') === true || wrapper.data('pause-hover') === 'true';
        var swiperPaginationType = paginationType === 'numbers' ? 'bullets' : paginationType;
        var swiperOptions = {
            slidesPerView: slidesPerView,
            slidesPerGroup: slidesPerScroll,
            spaceBetween: spaceBetween,
            loop: wrapper.data('loop') === true || wrapper.data('loop') === 'true',
            centeredSlides: wrapper.data('center') === true || wrapper.data('center') === 'true',

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: slidesPerView,
                    slidesPerGroup: slidesPerScroll,
                    spaceBetween: spaceBetween,
                }
            }
        };

        if (hasPagination) {
            swiperOptions.pagination = {
                el: carousel.find('.swiper-pagination')[0],
                type: swiperPaginationType,
                clickable: true,
            };

            if (paginationType === 'numbers') {
                swiperOptions.pagination.renderBullet = function (index, className) {
                    return '<button class="' + className + ' sk-pagination-number" type="button">' + (index + 1) + '</button>';
                };
            }
        }

        if (hasNavigation) {
            swiperOptions.navigation = {
                nextEl: carousel.find('.swiper-button-next')[0],
                prevEl: carousel.find('.swiper-button-prev')[0],
            };
        }

        if (autoplay) {
            swiperOptions.autoplay = {
                delay: parseInt(wrapper.data('autoplay-speed'), 10) || 3000,
                pauseOnMouseEnter: pauseOnHover,
                disableOnInteraction: false,
            };
        }

        new Swiper(carousel[0], swiperOptions);
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction(
            'frontend/element_ready/sk-testimonial-carousel.default',
            initTestimonialCarousel
        );
    });

})(jQuery);
