$(document).ready(function(){
  $('#feedback').on('submit', function (e) {
    if (($('.input-feedback').val() === '')
       || $('.textarea-feddback').val() === '') {
         e.preventDefault();
         $(this).children().addClass('error');
         return false;
    }else {
      return true;
    }
  });
  $('#feedback').children().on('click', function() {
    $(this).removeClass('error');
  });
});
