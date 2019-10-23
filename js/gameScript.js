$(function () {


    $("nav a").mouseover(function () {
        $("nav a").finish();
        $(this).animate({left: '50px', right: '50px'}, 50);
        $(this).animate({fontSize: '2em'}, 50);
    });
    $("nav a").mouseleave(function () {
        $("nav a").finish();
        $(this).animate({left: '50px', right: '50px'}, 250);
        $(this).animate({fontSize: '1em'}, 250);
    });


});