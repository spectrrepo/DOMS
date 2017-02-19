$( document ).ready(function () {
  $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});

  $(window).resize(function() {
    $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
  });
});
