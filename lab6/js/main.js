$(document).ready(function () {
    $('div').on('mouseover', function(){
        $(this).animate({width: "300px"}, 300);
    });
    $('div').on('mouseleave', function(){
        $(this).animate({width: "100px"}, 300);
    });
    $('div').on('click', function(){
        alert($(this).attr('title'));
    });
});