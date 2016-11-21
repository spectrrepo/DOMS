$(function() {
    var close = function() {
        $('.popup-wrapped').fadeOut(100);
        $('#overlay').fadeOut(100);
        $('.popup').fadeOut(100);
        $('body').css(
          'overflow-y','scroll'
        );
    };

    $('a.show_popup').click(function() {
        $('div.' + $(this).attr("rel")).fadeIn(500);
        $("body").append("<div class='over' id='overlay'></div>");
        $('#overlay').click(close);
        $('#overlay').show().css({
            'filter': 'alpha(opacity=80)'
        });
        return false;
    });

    $('.popup-wrapped').click(function (e) {
    	        e = e || event;
    	        target = e.target || e.srcElement;
              if((target.className != 'start') && (target.className != 'pic')
              && (target.className != 'main') && (target.className != 'popup1')
              && (target.className != 'b-form') && (target.className != 'b-btn-subm')
              && (target.className != 'b-text-inp') && (target.className != 'text-popup')
              && ($(this).css('display') === 'block')){
                close();
              }else{

              }
    });

    $('a.close , #overlay').click(
        close
    );

    $('button.show-popup-news').click(function() {
        $('div.' + $(this).attr("rel")).fadeIn(500);
        $('body').css(
          'overflow','hidden'
        );
        return false;

    });
});
