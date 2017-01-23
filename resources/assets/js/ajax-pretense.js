$( document ).ready(function() {
  $('#close-modal-law').on('click', function() {
    $('#modalLaw').fadeOut();
  });

  $('.b-pretense').on('click', function() {
    $('#modalLaw').fadeIn();
  });

  $('#pretense-file').on('change', function (){
    $('.wrap-file-modal-law').addClass('uk-icon-thumbs-o-up');
    $('.wrap-file-modal-law').removeClass('uk-icon-plus');
  });

  $('#formPretense').on('submit', function (e){
    e.preventDefault();
    $('#modalLaw').fadeOut();
    $('.b-pretense').text('OK');
    return false;
  });
});
