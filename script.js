$(function(){
    $('#toggle').removeClass('hidden').click(function(){
        var $me = $(this);
        $me.parent().find('ul input:enabled').click();
    });

    $('.dlform').submit(function(){
        $('.row').hide();
        $('.hero-unit').html('<h1>Just a moment, please.</h1><p>We\'re building your download right now</p>');
        return true;
    });
});