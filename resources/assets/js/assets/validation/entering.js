$(document).ready(function() {
  $('#enter').on('submit', function(e) {
    $('#p-info').remove();
    if (($('.modal-login-inp').val() === '')) {
          e.preventDefault();
           $('<p id="p-info" style="color:red">Не верно введен логин или пароль</p>')
               .prependTo(this);
           return false;
    }else {
      return true;
    }
  });
});
