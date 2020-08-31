$(window).scroll(function(){
    // console.log(window.pageYOffset)
    if(window.pageYOffset > 278){
        $('.side-bar').css('position', 'sticky');
        $('.side-bar').css('top', 0);
        $('.banner').css('display', 'none')
    }
    else if(window.pageYOffset == 0){
        $('.banner').css('display', 'block')
        $('.side-bar').css('position', 'relative');
    }
})