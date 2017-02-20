$('#foot-about').on('click', function() {
  $('#popup-about').fadeIn();
});

$('#foot-feedback').on('click', function() {
  $('#popup-feedback').fadeIn();
});
$('.login').on('click', function() {
  $('#login-popup').fadeIn();
});
$('#registration').on('click', function() {
  $('#popup-registr').fadeIn();
});
$('#recover-pswd').on('click', function () {
  $('.overlay').fadeOut();
  $('#passwd-popup').fadeIn();
});
$('.popup-close').on('click', function() {
  $('.overlay').fadeOut();
});

$('#close-modal-likes').on('click', function(){
  $('#allPhotoLikes').fadeOut();
});
