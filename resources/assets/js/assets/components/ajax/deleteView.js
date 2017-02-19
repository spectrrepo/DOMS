$( document ).ready(function() {
  $('.delete-view-edit').on('click', function() {
    var csrftoken = $('meta[name=_token]').attr('content'),
    id = $('input[name=id]').val();
    $.ajax({
      type:'POST',
      data: {
        '_token'  : csrftoken,
        'id'      : id
      },
      url: '/delete_view',

    });
    $(this).empty().remove();
  });
});
