$(document).ready(function(){
  $('#feedback').on('submit', function (e) {
    e.preventDefault();
    if (($('.input-feedback').val() === '')
       || $('.textarea-feddback').val() === '') {
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
