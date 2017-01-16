$( document ).ready(function() {

  $('#closeLink').on('click', function () {
    $('#dialogLinkAdd').fadeOut();
  });

  $('.open-modal-link').on('click', function () {
    if ($(this).data('action') === 'addLinks') {
      $('h3.title-form').empty()
                        .text('Добавить ссылку');
      $('.mini-modal-submit').removeClass('uk-icon-save')
                             .addClass('uk-icon-plus');
      $('.links-control').removeAttr('id')
                         .attr('id', 'add-link-form');

      $('#add-link-form').submit(function (e) {
         e.preventDefault();
         var csrftoken = $('meta[name=_token]').attr('content'),
             link = $('input[name=link]').val(),
             user_id = $('input[name=user_id]').val();

         $.ajax({
           type:'POST',
           data: {
                '_token'  : csrftoken,
                'link' : post_id,
                'user_id' : user_id
           },
           url:'http://localhost:8000/add_links',
           success: function () {
           // close
           // add
           // fadeIn
           }
         });
         return false;
     });
    }else {
      $('.links-control').append(
        '<input type="hidden" name="old_link" value=""/>'
      );
      $('.links-control').append(
        '<input type="hidden" name="link" value=""/>'
      );
      $('h3.title-form').empty()
                        .append('Изменить ссылку для ССЫЛКА или'+
              '<span id="delete-btn" class="remove-this-links">удалить</span>');

      $('.mini-modal-submit').removeClass('uk-icon-plus')
                             .addClass('uk-icon-save')
      $('.links-control').removeAttr('id')
                         .attr('id', 'save-link-form');
         $('#save-link-form').submit(function () {
             e.preventDefault();
             var csrftoken = $('meta[name=_token]').attr('content'),
                 link = $('input[name=link]').val(),
                 user_id = $('input[name=user_id]').val();

             $.ajax({
                 type:'POST',
                 data: {
                      '_token'  : csrftoken,
                      'link' : post_id,
                      'user_id' : user_id
                 },
                 url:'http://localhost:8000/edit_links',
                 success: function () {
                                 // close
                                 // add
                                 // fadeIn
                 }
             });
             return false;
         });
         $('#delete-btn').on('click', function () {
           var csrftoken = $('meta[name=_token]').attr('content'),
               link = $('input[name=link]').val(),
               user_id = $('input[name=user_id]').val();

           $.ajax({
               type:'POST',
               data: {
                         '_token'  : csrftoken,
                         'link' : post_id,
                         'user_id' : user_id
               },
               url:'http://localhost:8000/delete_links',

               success: function () {
                 // close
                 // add
                 // fadeIn
               }
           });
         });
    }
    $('#dialogLinkAdd').fadeIn();
  });

});
