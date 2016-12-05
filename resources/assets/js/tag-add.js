$( document ).ready(function() {
  $('.btn-add-tag').on('click', function() {
    $('input[name=data-tags]').val($('input[name=data-tags]').val()+$('.input-tag-name').val()+';');
    $('<span class="item-tag-show">'+
      $('.input-tag-name').val()
    +'</span>').appendTo('.wrap-add-tag');
    $('.input-tag-name').val("");
    $('.item-tag-show').click(function () {
      var replaceString = $('input[name=data-tags]').val();
      $('input[name=data-tags]').val(replaceString.replace($(this).text()+';', ''));
      $(this).remove();
    });
  });
  return false;
});
