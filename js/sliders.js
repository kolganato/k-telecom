new Swiper('.tariffs-slider',{
    simulateTouch: true,
    slidesPerView: 3, // можно указать 1.2 и другие размеры 
    watchOverFlow: true, // отключает слайдер, если недостаточно количество 
    spaceBetween: 28, // отступ между слайдами
    grabCursor: true,
    centeredSlides: false,
    initialSlide: 0,
    // setWrapperSize: true,

    breakpoints: {
        250: {
            slidesPerView: 1.3,
        },
        520: {
            slidesPerView: 1.5,
        },
        900: {
            slidesPerView: 2.5,
        }
    },
});