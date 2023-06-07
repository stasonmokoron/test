$(document).ready(function(){
    //let winSize = $( window ).resize(function() {$( "body" ).prepend( "<div>" + $( window ).width() + "</div>" );});


    if ($(window).width() < 768) {
        $('.slider ul').bxSlider({
            pager: true,
            controls: false,
            touchEnabled: true
        });
    } else {
        $('.slider ul').bxSlider({
            pager: false,
            controls: true
        });
    }
});


$(document).ready(function($){
    $(".nav").on("click","a", function(event){
        event.preventDefault();
        let id = $(this).attr('href'),
            top = $(id).offset().top - 50 + "px";
        $('body,html').animate({scrollTop: top}, 500);
    });
});

$(document).ready(function($){
    $('.primary-nav-trigger').on('click', function(){
        $('.menu-icon').toggleClass('is-clicked');
        $('.primary-nav').toggleClass('is-visible');
        $('body').toggleClass('overflow-hidden');
    });
    $(".primary-nav").on("click","a", function(event){
        event.preventDefault();
        let id = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1000);
        
        $('.menu-icon').toggleClass('is-clicked');
        $('.primary-nav').toggleClass('is-visible');
        $('body').toggleClass('overflow-hidden');
    });

    $('#close').on('click', function(){
        $('.menu-icon').toggleClass('is-clicked');
        $('.primary-nav').toggleClass('is-visible');
        $('body').toggleClass('overflow-hidden');
    });
});

