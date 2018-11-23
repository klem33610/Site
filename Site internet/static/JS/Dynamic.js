$(function(){
    $('.nav-link').click(function(){
        $(this).addClass('active');
        $(this).parent().siblings().children().removeClass('active');
    }) 
})