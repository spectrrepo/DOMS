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
    var csrftoken = $('input[name=_token]').val(),
        postId = $('.active-slide').data('id'),
        textPretense = $('input[name=text_pretense]').val(),
        filePretense = new FormData($(this).get(0));
        // filePretense.append('img', $('input[name=file_pretense]').prop('files')[0]);
        // filePretense.append('img' , $('input[name=file_pretense]').prop('files')[0]);
    $.ajax({
        type:'POST',
        data: filePretense,
        url: '/add_copyright',
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
          $('#modalLaw').fadeOut();
          $('.b-pretense').text('OK');
        }
    });
    return false;
  });
});
