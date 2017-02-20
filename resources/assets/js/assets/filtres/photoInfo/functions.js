// tags finder
$('.ajax-search').on('submit', function(){
  var sortSort = $('input[name=sortSorting]').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val();
      $('input[name=colorSorting]').val($('input[name=tagSearch]').val());
  var tag = $('input[name=colorSorting]').val();

  $('input[name=tagSorting]').val(tag);
  $.ajax({
    type:'POST',
    data: {
              '_token'  : csrftoken,
              'sortSort': sortSort,
              'styleSort': styleSort,
              'roomSort': roomSort,
              'colorSort': colorSort,
              'tag': tag
    },
    url:'/load_sort_photo',

    success: function (data) {
      $('#pole').empty();
      if (!(data === 'error_download')) {
        $('.info-text-message').fadeOut();
        $('.b-next-page').fadeIn();
        history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=["'+tag+'"]');
        for(var i=0; i<data.length; i++) {

        }
      }
      else {
        $('.info-text-message').fadeIn();
        $('.b-next-page').fadeOut();
      }
    }
  });
  return false;
});
