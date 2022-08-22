

$(document).ready(function () 
{

   $('.btnBurgerMenu').click(function() {
        $('nav.menuHeader').css('left', '0');
        $('.btnBurgerMenu').toggleClass('burger_open');
        if($('.btnBurgerMenu').hasClass('burger_open'))
        {
            $('nav.menuHeader').css('left', '0px');
            $('span.buger1').attr('style', 'transform: rotate(135deg);top: 10px;');
            $('span.buger2').attr('style', 'transform: rotate(135deg);top: 10px;');
            $('span.buger3').attr('style', 'transform: rotate(45deg);top: 10px;');
        }
        else
        {
            $('nav.menuHeader').css('left', '-100%');
            $('span.buger1').attr('style', 'transform: rotate(90deg);top: 0;');
            $('span.buger2').attr('style', 'transform: rotate(90deg);top: 13px;');
            $('span.buger3').attr('style', 'transform: rotate(90deg);top: 25px;');
        }
   });

   if ($(window).width() < 865)
   {
    $('.sub-menu').slideUp();

    $('.menu-item-has-children').click(function (e) 
    { 
        e.preventDefault();
        $(this).find('.sub-menu').slideDown();
        $(this).find('.sub-menu').toggleClass('subMenu-open');

        if ($(this).find('.sub-menu').hasClass('subMenu-open'))
        {
            $(this).find('.sub-menu').slideDown();
        }
        else
        {
            $(this).find('.sub-menu').slideUp();
        }
    });
   }

});