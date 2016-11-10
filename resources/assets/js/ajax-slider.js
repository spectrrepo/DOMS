$( document ).ready(function() {
  $('.btn-prew').on('click', function (){

      var prewPoint = $('.active-slide').data('id') - 1;
      $('.active-slide').removeClass('active-slide').addClass('right-slide');
      $('.left-slide[data-id='+prewPoint+']').addClass('active-slide').removeClass('left-slide');

  });
  $('.right-next').on('click', function (){

      var nextPoint = $('.active-slide').data('id') + 1;
      $('.active-slide').removeClass('active-slide').addClass('left-slide');
      $('.right-slide[data-id='+nextPoint+']').addClass('active-slide').removeClass('right-slide');
  });
});
