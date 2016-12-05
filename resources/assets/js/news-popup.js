$(function() {
  $('.item-news-title').on('click', function(){
    $('.'+$(this).attr('rel')).fadeIn();
  });
  $('.popup-close-news').on('click', function(){
    $('.modal-news').fadeOut();
  });
});
