$(document).ready(function(){
  $('#recovery-pass').on('submit', function (e) {
    e.preventDefault();
    if ($(this).children('.recover-text-inp').val() === ""){
      $('<p id="p-info" style="color:red">Введите свой логин</p>')
      .prependTo(this);
      return false;
    } else {
      return true;
    }
  });
});
