$(function(){
    // 二级菜单
    $('.ul_sort .on').click(function(){
        if(!$(this).hasClass('block')){
            $(this).addClass('block')
        } else{
            $(this).removeClass('block')
        }
    });

    // 添加购物车
    $(".add").click(function(){
        var t=$(this).parent().find('input[class*=text_box]');
        t.val(parseInt(t.val())+1)
    })
    $(".min").click(function() {
        var t = $(this).parent().find('input[class*=text_box]');
        t.val(parseInt(t.val()) - 1)
        if (parseInt(t.val()) < 0) {
            t.val(0);
        }
    })

    // 详情页轮播
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        loop:true,
        loopedSlides: 4,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },


    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        // spaceBetween: 10,
        slidesPerColumn : 1,
        loop:true,
        loopedSlides: 4,
        direction: 'vertical',
        centeredSlides: true,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true,
        on: {
            init: function(){
                //Swiper初始化了
            },
            transitionEnd: function(){
                console.log(this.realIndex);
                $('.big img').eq(this.realIndex).addClass('block').siblings().removeClass('block');
            }
        },
    });
    galleryTop.controller.control = galleryThumbs;
    galleryThumbs.controller.control = galleryTop;

    $(function(){
        $('.small').hover(function(){

            $('.shade').show();
            $('.big').show();
            $('.big_img').hide();

        },function(){

            $('.shade').hide();
            $('.big').hide();
            $('.big_img').show();

        });

        $('.small').mousemove(function(e){

            e = event || window.event;

            //鼠标距离浏览器的距离
            var x=e.pageX;
            var y=e.pageY;

            //small距离视窗的距离  offset
            var small_x= 462;
            var small_y=$('.small').offset().top;

            //获取遮罩层的宽度和高度
            var shade_w=$('.shade').width();
            var shade_h=$('.shade').height();

            //准备赋值
            var newtop=y-small_y-shade_h/2;
            var newleft=x-small_x-shade_w/2;

            //判断是否超出最大的活动范围
            var max_top=$('.small').height()-$('.shade').height();
            var max_left=$('.small').width()-$('.shade').width();

            if(newtop>=max_top){
                newtop=max_top;
            }

            if(newleft>=max_left){
                newleft=max_left;
            }

            if(newleft<=0){
                newleft=0;
            }

            if(newtop<=0){
                newtop=0;
            }

            $('.shade').css({top:newtop, left:newleft});


            //小图的比值
            var bizhi_x=newleft/max_left;
            var bizhi_y=newtop/max_top;

            //大图的移动坐标
            var bigx=bizhi_x*($('.big img').width()-$('.big').width());
            var bigy=bizhi_y*($('.big img').height()-$('.big').height());

            console.log($('.big img').width());

            $('.big img').css({left:-bigx, top:-bigy});

        });

    });
});
