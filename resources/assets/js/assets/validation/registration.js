$(document).ready(function(){
  $('#registr').on('submit', function (e) {
    if ($('.input-reg').val() === "") {
          e.preventDefault();
          $('<p id="p-info" style="color:red">Заполните все поля формы</p>')
          .prependTo('#registr');
          return false;
    } else {
      return true;
    }
  });
});
