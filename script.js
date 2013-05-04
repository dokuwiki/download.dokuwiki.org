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

    var $dl = $('#download');
    if($dl.length){
        window.setTimeout(
            function(){
                $('body').append('<iframe src="'+$dl.attr('href')+'" border="0" height="1" width="1"></iframe>');
            },
            3500 //3.5 seconds
        );
    }
});