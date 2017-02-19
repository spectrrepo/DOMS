$( document ).ready(function() {
  $('#description-pole h3').on('click', function(){
    $('<h3 class="title-description-popup"></h3>')
                  .appendTo('.description-scroll-place')
                  .text($(this).text());
    $('<p></p>').appendTo('.description-scroll-place')
                .text($('#description-pole p').text());
    $('#modalDescriptionFull').fadeIn();
  });
  $('#close-modal-description').on('click', function(){
    $('#modalDescriptionFull').fadeOut();
    $('.description-scroll-place').empty();
  });
});
