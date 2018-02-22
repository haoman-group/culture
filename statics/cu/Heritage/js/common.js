$(function(){
    var mySwiper = $('.case .swiper-container').swiper({
        pagination: '.case .swiperpage',
        paginationClickable: true,
        mode: 'vertical',
        loop: true,
        autoplay : 2000
    })

    var swiper = $('.lunbo .swiper-container').swiper({
        slidesPerView: 4,
        loop:true,
    })
    $('.lunbo .arrow-left').on('click', function(e){
        e.preventDefault()
        swiper.swipePrev()
    })
    $('.lunbo .arrow-right').on('click', function(e){
        e.preventDefault()
        swiper.swipeNext()
    })


})
