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
    return false;
  });

  $('.input-tag-name').keyup(function(e) {
    if(e.keyCode==13)
     {
          e.preventDefault();
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
          return false;
     }
   });

});
$(document).mouseup(function (e) {
    var container = $(".overlay");
    if (container.has(e.target).length === 0){
        container.fadeOut();
    }
});
