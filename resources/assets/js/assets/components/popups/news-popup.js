$(function() {
  $('.item-news-title').on('click', function(){
    $('.'+$(this).attr('rel')).fadeIn();
  });
  $('.popup-close-news').on('click', function(){
    $('.modal-news').fadeOut();
  });

  var height = parseInt($('pre').css('height'));
  if (height > 119){
    $('.b-about-person').append(
    '<span class="to-bottom ico uk-icon-justify uk-icon-chevron-down"></span>'
    );
  }
  $('.to-bottom').on('click', function () {
    if ($(this).hasClass('uk-icon-chevron-down')) {
      $('.b-about-person').css({'height':'auto'});
      $(this).removeClass('uk-icon-chevron-down')
             .addClass('uk-icon-chevron-up');
    } else {
      $('.b-about-person').css({'height':'105px'});
      $(this).removeClass('uk-icon-chevron-up')
             .addClass('uk-icon-chevron-down');
    }
  });
});
