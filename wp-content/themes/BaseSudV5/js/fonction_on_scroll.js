

// function Check offset something and add/remove class on offset
function CheckoffsetTop(ObjScroll, initOffset, target, classAdd)
{
    $(window).on( 'scroll', function()
    {
        //console.log(ObjScroll.offset().top);
        if (ObjScroll.offset().top > initOffset) 
        { 
            $(target).addClass(classAdd);
        } 
        else 
        {
            $(target).removeClass(classAdd); 
        }
    });
}